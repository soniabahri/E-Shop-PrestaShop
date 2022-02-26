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

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Adapter\Category\CategoryProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

class WbCategoryFeaturedProducts extends Module implements WidgetInterface
{
    private $templateFile;

    public function __construct()
    {
        $this->name = 'wbcategoryfeaturedproducts';
        $this->tab = 'front_office_features';
        $this->author = 'Webibazaar';
        $this->version = '1.0.7';
        $this->need_instance = 0;

        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans(
            'Category Featured products',
            array(),
            'Modules.CategoryFeaturedProducts.Admin'
        );
        $this->description = $this->trans(
            'Displays category featured products in the central column of your homepage.',
            array(),
            'Modules.CategoryFeaturedProducts.Admin'
        );

        $this->templateFile = 'module:wbcategoryfeaturedproducts/views/templates/hook/wbcategoryfeaturedproducts.tpl';
        $this->module_key = 'bfa8064b724465caa33c75824aadaa16';
    }

    public function install()
    {
        $this->_clearCache($this->templateFile);

        Configuration::updateValue('CAT_FEATURED_NBR', 3);
        Configuration::updateValue('CAT_FEATURED_CAT', (int) Context::getContext()->shop->getCategory());
        Configuration::updateValue('CAT_FEATURED_RANDOMIZE', false);

        return parent::install()
            && $this->registerHook('addproduct')
            && $this->registerHook('updateproduct')
            && $this->registerHook('deleteproduct')
            && $this->registerHook('categoryUpdate')
            && $this->registerHook('displayHome')
            && $this->registerHook('displayOrderConfirmation2')
            && $this->registerHook('displayCrossSellingShoppingCart')
            && $this->registerHook('actionAdminGroupsControllerSaveAfter')
        ;
    }

    public function uninstall()
    {
        $this->_clearCache($this->templateFile);

        return parent::uninstall();
    }

    public function hookAddProduct()
    {
        $this->_clearCache($this->templateFile);
    }

    public function hookUpdateProduct()
    {
        $this->_clearCache($this->templateFile);
    }

    public function hookDeleteProduct()
    {
        $this->_clearCache($this->templateFile);
    }

    public function hookCategoryUpdate()
    {
        $this->_clearCache($this->templateFile);
    }

    public function hookActionAdminGroupsControllerSaveAfter()
    {
        $this->_clearCache($this->templateFile);
    }

    public function getContent()
    {
        $output = '';
        $errors = array();

        if (Tools::isSubmit('submitHomeFeatured')) {
            $nbr = Tools::getValue('CAT_FEATURED_NBR');
            if (!Validate::isInt($nbr) || $nbr <= 0) {
                $errors[] = $this->trans(
                    'The number of products is invalid. Please enter a positive number.',
                    array(),
                    'Modules.CategoryFeaturedProducts.Admin'
                );
            }

            $cat = Tools::getValue('CAT_FEATURED_CAT');
            if (!Validate::isInt($cat) || $cat <= 0) {
                $errors[] = $this->trans(
                    'The category ID is invalid. Please choose an existing category ID.',
                    array(),
                    'Modules.CategoryFeaturedProducts.Admin'
                );
            }

            $rand = Tools::getValue('CAT_FEATURED_RANDOMIZE');
            if (!Validate::isBool($rand)) {
                $errors[] = $this->trans(
                    'Invalid value for the "randomize" flag.',
                    array(),
                    'Modules.CategoryFeaturedProducts.Admin'
                );
            }
            if (isset($errors) && count($errors)) {
                $output = $this->displayError(implode('<br />', $errors));
            } else {
                Configuration::updateValue('CAT_FEATURED_NBR', (int) $nbr);
                Configuration::updateValue('CAT_FEATURED_CAT', (int) $cat);
                Configuration::updateValue('CAT_FEATURED_RANDOMIZE', (bool) $rand);

                $this->_clearCache($this->templateFile);

                $output = $this->displayConfirmation(
                    $this->trans(
                        'The settings have been updated.',
                        array(),
                        'Admin.Notifications.Success'
                    )
                );
            }
        }

        return $output.$this->renderForm();
    }

    public function renderForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->trans('Settings', array(), 'Admin.Global'),
                    'icon' => 'icon-cogs',
                ),

                'description' => $this->trans(
                    'To add products to your homepage, simply add 
                    them to the corresponding product category (default: "Home").',
                    array(),
                    'Modules.CategoryFeaturedProducts.Admin'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->trans(
                            'Number of products to be displayed',
                            array(),
                            'Modules.CategoryFeaturedProducts.Admin'
                        ),
                        'name' => 'CAT_FEATURED_NBR',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->trans(
                            'Set the number of products that you would like to display on homepage (default: 4).',
                            array(),
                            'Modules.CategoryFeaturedProducts.Admin'
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->trans(
                            'Category from which to pick products to be displayed',
                            array(),
                            'Modules.CategoryFeaturedProducts.Admin'
                        ),
                        'name' => 'CAT_FEATURED_CAT',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->trans(
                            'Choose the category ID of the products that you 
                            would like to display on homepage (default: 2 for "Home").',
                            array(),
                            'Modules.CategoryFeaturedProducts.Admin'
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->trans(
                            'Randomly display featured products',
                            array(),
                            'Modules.CategoryFeaturedProducts.Admin'
                        ),
                        'name' => 'CAT_FEATURED_RANDOMIZE',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->trans(
                            'Enable if you wish the products to be displayed randomly (default: no).',
                            array(),
                            'Modules.CategoryFeaturedProducts.Admin'
                        ),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->trans('Yes', array(), 'Admin.Global'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->trans('No', array(), 'Admin.Global'),
                            ),
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->trans('Save', array(), 'Admin.Actions'),
                ),
            ),
        );

        $lang = new Language((int) Configuration::get('PS_LANG_DEFAULT'));

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ?
            Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->id = (int) Tools::getValue('id_carrier');
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitHomeFeatured';
        $helper->currentIndex = $this->context->link->getAdminLink(
            'AdminModules',
            false
        ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($fields_form));
    }

    public function getConfigFieldsValues()
    {
        return array(
            'CAT_FEATURED_NBR' => Tools::getValue('CAT_FEATURED_NBR', (int) Configuration::get('CAT_FEATURED_NBR')),
            'CAT_FEATURED_CAT' => Tools::getValue('CAT_FEATURED_CAT', (int) Configuration::get('CAT_FEATURED_CAT')),
            'CAT_FEATURED_RANDOMIZE' => Tools::getValue(
                'CAT_FEATURED_RANDOMIZE',
                (bool) Configuration::get('CAT_FEATURED_RANDOMIZE')
            ),
        );
    }

    public function renderWidget($hookName = null, array $configuration = null)
    {
        if (!$this->isCached($this->templateFile, $this->getCacheId('wbcategoryfeaturedproducts'))) {
            $variables = $this->getWidgetVariables($hookName, $configuration);

            if (empty($variables)) {
                return false;
            }

            $this->smarty->assign($variables);
        }
        unset($hookName,$configuration);
        return $this->fetch($this->templateFile, $this->getCacheId('wbcategoryfeaturedproducts'));
    }

    public function getWidgetVariables($hookName = null, array $configuration = null)
    {
        $products = $this->getProducts();

        if (!empty($products)) {
            return array(
                'products' => $products,
                'allProductsLink' => Context::getContext()->link->getCategoryLink(
                    $this->getConfigFieldsValues()['CAT_FEATURED_CAT']
                ),
            );
        }
        unset($hookName,$configuration);
        return false;
    }

    protected function getProducts()
    {
        $category = new Category((int) Configuration::get('CAT_FEATURED_CAT'));

        $searchProvider = new CategoryProductSearchProvider(
            $this->context->getTranslator(),
            $category
        );

        $context = new ProductSearchContext($this->context);

        $query = new ProductSearchQuery();

        $nProducts = Configuration::get('CAT_FEATURED_NBR');
        if ($nProducts < 0) {
            $nProducts = 12;
        }

        $query
            ->setResultsPerPage($nProducts)
            ->setPage(1)
        ;

        if (Configuration::get('CAT_FEATURED_RANDOMIZE')) {
            $query->setSortOrder(SortOrder::random());
        } else {
            $query->setSortOrder(new SortOrder('product', 'position', 'asc'));
        }

        $result = $searchProvider->runQuery(
            $context,
            $query
        );

        $assembler = new ProductAssembler($this->context);

        $presenterFactory = new ProductPresenterFactory($this->context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new ProductListingPresenter(
            new ImageRetriever(
                $this->context->link
            ),
            $this->context->link,
            new PriceFormatter(),
            new ProductColorsRetriever(),
            $this->context->getTranslator()
        );

        $products_for_template = array();

        foreach ($result->getProducts() as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $this->context->language
            );
        }

        return $products_for_template;
    }
}
