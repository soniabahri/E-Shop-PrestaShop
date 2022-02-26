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

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once(_PS_MODULE_DIR_ . 'wbcompare/classes/CompareProduct.php');

class WbCompare extends Module
{

    const INSTALL_SQL_FILE = 'install.sql';

    private $html = '';
    private $link;
    public $content_only = true;

    public function __construct()
    {
        $this->name = 'wbcompare';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Webibazaar';
        $this->need_instance = 0;
        $this->controllers = array('WbCompareProduct');
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Wb Compare');
        $this->description = $this->l('Adds a block containing the customer compares.');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->html = '';
        $this->link = $this->context->link;
    }

    public function install($delete_params = true)
    {
        if ($delete_params) {
            if (!file_exists(dirname(__FILE__) . '/' . self::INSTALL_SQL_FILE)) {
                return (false);
            } elseif (!$sql = Tools::file_get_contents(dirname(__FILE__) . '/' . self::INSTALL_SQL_FILE)) {
                return (false);
            }
            $sql = str_replace(array('PREFIX_', 'ENGINE_TYPE'), array(_DB_PREFIX_, _MYSQL_ENGINE_), $sql);
            $sql = preg_split("/;\s*[\r\n]+/", $sql);
            foreach ($sql as $query) {
                if ($query) {
                    if (!Db::getInstance()->execute(trim($query))) {
                        return false;
                    }
                }
            }
        }
        if (!parent::install() ||
            !Configuration::updateValue('WB_COMPARE_MAX_ITEM', 5) ||
            !$this->registerHook('DisplayHeader') ||
            !$this->registerHook('displayCompareButton') ||
            !$this->registerHook('displayComNav2')
            ) {
            return false;
        }

        return true;
    }

    public function uninstall($delete_params = true)
    {
        if (($delete_params && !$this->deleteTables()) ||
                !parent::uninstall() ||
                !Configuration::deleteByName('WB_COMPARE_MAX_ITEM')) {
            return false;
        }
        return true;
    }

    private function deleteTables()
    {
        return Db::getInstance()->execute(
            'DROP TABLE IF EXISTS
            `' . _DB_PREFIX_ . 'wb_compare`,
            `' . _DB_PREFIX_ . 'wb_compare_product`'
        );
    }

    public function reset()
    {
        if (!$this->uninstall(false)) {
            return false;
        }
        if (!$this->install(false)) {
            return false;
        }
        return true;
    }

    public function getContent()
    {
        //$this->context->link->getProductLink($val['id_product']);
        $errors = array();
        if (Tools::isSubmit('submitConpareModule')) {
            if (Tools::isSubmit('WB_COMPARE_MAX_ITEM')) {
                if (Validate::isInt(Tools::getValue('WB_COMPARE_MAX_ITEM'))) {
                    Configuration::updateValue('WB_COMPARE_MAX_ITEM', Tools::getValue('WB_COMPARE_MAX_ITEM'));
                } else {
                    $errors[] = $this->l('value must be a numeric value!');
                }
            }
        }
        return $this->renderForm();
    }

    public function hookDisplayHeader()
    {
        if (Configuration::get('WB_COMPARE_MAX_ITEM') > 0) {
            $useSSL = (
                (isset($this->ssl) &&
                    $this->ssl &&
                    Configuration::get('PS_SSL_ENABLED')
                ) ||
                Tools::usingSecureMode()
            ) ? true : false;
            $protocol_content = ($useSSL) ? 'https://' : 'http://';
            $this->context->controller->addCSS(($this->_path) . '/views/css/wbcompare.css', 'all');
            $this->context->controller->addJS(($this->_path) . '/views/js/products-comparison.js');
            $compared_products = array();
            if (Configuration::get('WB_COMPARE_MAX_ITEM') && isset($this->context->cookie->id_compare)) {
                $compared_products = CompareProduct::getCompareProducts($this->context->cookie->id_compare);
            }
            $static_token = Tools::getToken(false);
            $compare_max_item = (int) Configuration::get('WB_COMPARE_MAX_ITEM');
            $content_only = true;
            $productcompare_max_item = sprintf(
                $this->l('You cannot add more than %d product(s) to the product comparison'),
                $compare_max_item
            );
            Media::addJsDef(
                array(
                    'comparedProductsIds' => $compared_products,
                    'compare_add_text' => $this->l('The product has been added to list compare'),
                    'compare_remove_text' => $this->l('The product was successfully removed from list compare'),
                    'comparator_max_item' => $compare_max_item,
                    'compared_products' => (count($compared_products) > 0) ? $compared_products : array(),
                    'productcompare_max_item' => $productcompare_max_item,
                    'baseUri' => $protocol_content . Tools::getHttpHost() . __PS_BASE_URI__,
                    'contentOnly' => $content_only,
                    'productcompare_url' => $this->link->getModuleLink('wbcompare', 'WbCompareProduct'),
                    'static_token' => $static_token,
                )
            );
        }
    }

    public function hookdisplayCompareButton($params)
    {
        if (Configuration::get('WB_COMPARE_MAX_ITEM') > 0) {
            $id_product = $params['product']['id_product'];
            $compared_products = array();
            if (Configuration::get('WB_COMPARE_MAX_ITEM') && isset($this->context->cookie->id_compare)) {
                $compared_products = CompareProduct::getCompareProducts($this->context->cookie->id_compare);
            }
            $add_compare = false;
            if (count($compared_products) > 0 && in_array($id_product, $compared_products)) {
                $add_compare = true;
            }
            $this->smarty->assign(array(
                'add_compare' => $add_compare,
                'Wb_compare_id_product' => $id_product,
            ));
            return $this->display(__FILE__, 'Wb_compare_button.tpl');
        }
    }

    public function hookdisplayComNav2()
    {
        $compared_products = array();
        if (Configuration::get('WB_COMPARE_MAX_ITEM') && isset($this->context->cookie->id_compare)) {
            $compared_products = CompareProduct::getCompareProducts($this->context->cookie->id_compare);
        }
        $compare_max_item = (int) Configuration::get('WB_COMPARE_MAX_ITEM');
        $productcompare_max_item = sprintf($this->l(
            'You cannot add more than %d product(s) to the product comparison'
        ), $compare_max_item);
        $this->smarty->assign(array(
            'productcompare_max_item' => $productcompare_max_item,
            'compared_products' => (count($compared_products) > 0) ? $compared_products : array(),
            'comparator_max_item' => $compare_max_item,
            'count_product' => (int) Db::getInstance()->getValue('SELECT count(id_product) FROM ' . _DB_PREFIX_ . 'wb_compare c, ' . _DB_PREFIX_ . 'wb_compare_product cp where c.id_compare = cp.id_compare and c.id_customer=' . (int) $this->context->customer->id)
        ));

        return $this->display(__FILE__, 'Wb_compare_nav2.tpl');
    }

    public function renderForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'name' => 'WB_COMPARE_MAX_ITEM',
                        'label' => $this->l('Max item'),
                        'desc' => $this->l('The item number is showing on desstop screen'),
                        'suffix' => 'item',
                        'class' => 'fixed-width-xs',
                        'required' => false,
                        'lang' => false,
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int) Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitConpareModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false) . '&configure=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );
        $helper->fields_value['WB_COMPARE_MAX_ITEM'] = Configuration::get('WB_COMPARE_MAX_ITEM');

        return $helper->generateForm(array($fields_form));
    }
}
