<?php
/**
* 2007-2019 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2019 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Core\Product\ProductExtraContentFinder;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Addon\Module\ModuleManagerBuilder;

class WbFeaturesProducts extends ProductControllerCore
{
    public $php_self = '';
    protected $quantity_discounts;
    
    protected function assignPriceAndTax()
    {
        $id_customer = (isset($this->context->customer) ? (int) $this->context->customer->id : 0);
        $id_group = (int) Group::getCurrent()->id;
        $id_country = $id_customer ? (int) Customer::getCurrentCountry($id_customer) : (int) Tools::getCountry();

        // Tax
        $tax = (float) $this->product->getTaxesRate(
            new Address((int) $this->context->cart->{Configuration::get('PS_TAX_ADDRESS_TYPE')})
        );
        $this->context->smarty->assign('tax_rate', $tax);

        $product_price_with_tax = Product::getPriceStatic($this->product->id, true, null, 6);
        if (Product::$_taxCalculationMethod == PS_TAX_INC) {
            $product_price_with_tax = Tools::ps_round($product_price_with_tax, 2);
        }

        $id_currency = (int) $this->context->cookie->id_currency;
        $id_product = (int) $this->product->id;
        $id_product_attribute = Tools::getValue('id_product_attribute', null);
        $id_shop = $this->context->shop->id;

        $quantity_discounts = SpecificPrice::getQuantityDiscounts(
            $id_product,
            $id_shop,
            $id_currency,
            $id_country,
            $id_group,
            $id_product_attribute,
            false,
            (int) $this->context->customer->id
        );
        foreach ($quantity_discounts as &$quantity_discount) {
            if ($quantity_discount['id_product_attribute']) {
                $combination = new Combination((int) $quantity_discount['id_product_attribute']);
                $attributes = $combination->getAttributesName((int) $this->context->language->id);
                foreach ($attributes as $attribute) {
                    $quantity_discount['attributes'] = $attribute['name'].' - ';
                }
                $quantity_discount['attributes'] = rtrim($quantity_discount['attributes'], ' - ');
            }
            if ((int) $quantity_discount['id_currency'] == 0 && $quantity_discount['reduction_type'] == 'amount') {
                $quantity_discount['reduction'] = Tools::convertPriceFull(
                    $quantity_discount['reduction'],
                    null,
                    Context::getContext()->currency
                );
            }
        }

        $product_price = $this->product->getPrice(Product::$_taxCalculationMethod == PS_TAX_INC, false);
        $this->quantity_discounts = $this->formatQuantityDiscounts(
            $quantity_discounts,
            $product_price,
            (float) $tax,
            $this->product->ecotax
        );

        $this->context->smarty->assign(array(
            'no_tax' => Tax::excludeTaxeOption() || !$tax,
            'tax_enabled' => Configuration::get('PS_TAX') && !Configuration::get('AEUC_LABEL_TAX_INC_EXC'),
            'customer_group_without_tax' => Group::getPriceDisplayMethod($this->context->customer->id_default_group),
        ));
    }
    
    public function getTemplateVarProduct1($id_product)
    {
        if ($id_product) {
            $this->product = new Product($id_product, true, $this->context->language->id, $this->context->shop->id);
        }

        if (!Validate::isLoadedObject($this->product)) {
            return false;
        }
        $productSettings = $this->getProductPresentationSettings();
        // Hook displayProductExtraContent
        $extraContentFinder = new ProductExtraContentFinder();

        $product = $this->objectPresenter->present($this->product);
        $product['id_product'] = (int) $this->product->id;
        $product['out_of_stock'] = (int) $this->product->out_of_stock;
        $product['new'] = (int) $this->product->new;
        $product['id_product_attribute'] = Product::getDefaultAttribute((int)$id_product);
        $product['minimal_quantity'] = $this->getProductMinimalQuantity($product);
        $product['quantity_wanted'] = $this->getRequiredQuantity($product);
        $product['extraContent'] = $extraContentFinder->addParams(array('product' => $this->product))->present();

        $product_full = Product::getProductProperties($this->context->language->id, $product, $this->context);

        $product_full = $this->addProductCustomizationData($product_full);

        $product_full['show_quantities'] = (bool) (
            Configuration::get('PS_DISPLAY_QTIES')
            && Configuration::get('PS_STOCK_MANAGEMENT')
            && $this->product->quantity > 0
            && $this->product->available_for_order
            && !Configuration::isCatalogMode()
        );
        $product_full['quantity_label'] = ($this->product->quantity > 1) ? $this->trans(
            'Items',
            array(),
            'Shop.Theme.Catalog'
        ) : $this->trans(
            'Item',
            array(),
            'Shop.Theme.Catalog'
        );
        $product_full['quantity_discounts'] = $this->quantity_discounts;

        if ($product_full['unit_price_ratio'] > 0) {
            $unitPrice = ($productSettings->include_taxes) ? $product_full['price'] : $product_full['price_tax_exc'];
            $product_full['unit_price'] = $unitPrice / $product_full['unit_price_ratio'];
        }

        $group_reduction = GroupReduction::getValueForProduct($this->product->id, (int) Group::getCurrent()->id);
        if ($group_reduction === false) {
            $group_reduction = Group::getReduction((int) $this->context->cookie->id_customer) / 100;
        }
        $product_full['customer_group_discount'] = $group_reduction;
        // echo '<pre>';
        // print_r($product_full);
        // die();
        $presenter = $this->getProductPresenter();

        return $presenter->present(
            $productSettings,
            $product_full,
            $this->context->language
        );
    }
}
