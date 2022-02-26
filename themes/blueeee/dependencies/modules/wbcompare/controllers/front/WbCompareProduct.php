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

require_once(_PS_MODULE_DIR_ . 'wbcompare/classes/CompareProduct.php');
require_once(_PS_MODULE_DIR_ . 'wbcompare/classes/WbFeaturesProducts.php');

class WbCompareWbCompareProductModuleFrontController extends ModuleFrontController
{
    public $php_self;

    public function displayAjax()
    {
        // Add or remove product with Ajax
        if (Tools::getValue('ajax') && Tools::getValue('id_product') && Tools::getValue('action')) {
            if (Tools::getValue('action') == 'add') {
                $id_compare = isset($this->context->cookie->id_compare) ? $this->context->cookie->id_compare: false;
                if (CompareProduct::getNumberProducts($id_compare) < Configuration::get('WB_COMPARE_MAX_ITEM')) {
                    CompareProduct::addCompareProduct($id_compare, (int)Tools::getValue('id_product'));
                } else {
                    $this->ajaxDie('0');
                }
            } elseif (Tools::getValue('action') == 'remove') {
                if (isset($this->context->cookie->id_compare)) {
                    CompareProduct::removeCompareProduct(
                        (int)$this->context->cookie->id_compare,
                        (int)Tools::getValue('id_product')
                    );
                } else {
                    $this->ajaxDie('0');
                }
            } else {
                $this->ajaxDie('0');
            }
            $this->ajaxDie('1');
        }
        $this->ajaxDie('0');
    }

    public function initContent()
    {
        $this->php_self = 'WbCompareProduct';

        if (Tools::getValue('ajax')) {
            return;
        }
        parent::initContent();
        CompareProduct::cleanCompareProducts('week');
        $hasProduct = false;

        if (!Configuration::get('WB_COMPARE_MAX_ITEM')) {
            return Tools::redirect('index.php?controller=404');
        }

        $ids = null;
        
        if (isset($this->context->cookie->id_compare)) {
            $ids = CompareProduct::getCompareProducts($this->context->cookie->id_compare);
        }
        if ($ids) {
            if (count($ids) > 0) {
                if (count($ids) > Configuration::get('WB_COMPARE_MAX_ITEM')) {
                    $ids = array_slice($ids, 0, Configuration::get('WB_COMPARE_MAX_ITEM'));
                }

                $listProducts = array();
                $listFeatures = array();

                foreach ($ids as $k => &$id) {
                    $curProduct = new Product((int) $id, true, $this->context->language->id);
                    if (!Validate::isLoadedObject($curProduct) ||
                        !$curProduct->active ||
                        !$curProduct->isAssociatedToShop()
                    ) {
                        if (isset($this->context->cookie->id_compare)) {
                            CompareProduct::removeCompareProduct($this->context->cookie->id_compare, $id);
                        }
                        unset($ids[$k]);
                        continue;
                    }

                    foreach ($curProduct->getFrontFeatures($this->context->language->id) as $feature) {
                        $listFeatures[$curProduct->id][$feature['id_feature']] = $feature['value'];
                    }

                    $product_object = new WbFeaturesProducts();
                    $curProduct = $product_object->getTemplateVarProduct1($id);
                    $listProducts[] = $curProduct;
                }

                if (count($listProducts) > 0) {
                    $width = 80 / count($listProducts);

                    $hasProduct = true;
                    $ordered_features = $this->getFeaturesForComparison($ids, $this->context->language->id);
                    $this->context->smarty->assign(array(
                        'ordered_features' => $ordered_features,
                        'product_features' => $listFeatures,
                        'products' => $listProducts,
                        'width' => $width,
                        'homeSize' => Image::getSize(ImageType::getFormattedName('home')),
                        'list_product' => $ids,
                    ));
                } elseif (isset($this->context->cookie->id_compare)) {
                    $object = new CompareProduct((int) $this->context->cookie->id_compare);
                    if (Validate::isLoadedObject($object)) {
                        $object->delete();
                    }
                }
            }
        }
        $this->context->smarty->assign('hasProduct', $hasProduct);

        $this->setTemplate('module:wbcompare/views/templates/front/products-comparison.tpl');
    }

    public function getFeaturesForComparison($list_ids_product, $id_lang)
    {
        if (!Feature::isFeatureActive()) {
            return false;
        }

        $ids = '';
        foreach ($list_ids_product as $id) {
            $ids .= (int) $id . ',';
        }

        $ids = rtrim($ids, ',');

        if (empty($ids)) {
            return false;
        }

        return Db::getInstance()->executeS('
            SELECT f.*, fl.*
            FROM `' . _DB_PREFIX_ . 'feature` f
            LEFT JOIN `' . _DB_PREFIX_ . 'feature_product` fp
                ON f.`id_feature` = fp.`id_feature`
            LEFT JOIN `' . _DB_PREFIX_ . 'feature_lang` fl
                ON f.`id_feature` = fl.`id_feature`
            WHERE fp.`id_product` IN (' . $ids . ')
            AND `id_lang` = ' . (int) $id_lang . '
            GROUP BY f.`id_feature`
            ORDER BY f.`position` ASC
        ');
    }
}
