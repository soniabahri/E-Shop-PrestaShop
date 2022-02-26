<?php
/**
* 2007-2018 PrestaShop
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
*  @copyright  2007-2018 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined("DS")) {
      define("DS", DIRECTORY_SEPARATOR);
}

// Security
if (!defined('_PS_VERSION_')) {
    exit;
}

// Checking compatibility with older PrestaShop and fixing it
if (!defined('_MYSQL_ENGINE_')) {
    define('_MYSQL_ENGINE_', 'MyISAM');
}

// Loading Models
require_once(_PS_MODULE_DIR_ . 'wbstaticblocks/models/Staticblock.php');

class WbStaticBlocks extends Module
{
    public $hookAssign = array();
    public $staticModel = "";
    public function __construct()
    {
        $this->name = 'wbstaticblocks';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Webibazaar';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->module_key = 'bfa8064b724465caa33c75824aadaa16';
        $this->hookAssign = array(
            'rightcolumn',
            'displayLeftColumn',
            'displayLeftColumnProduct',
            'displayHome',
            'displayTop',
            'displayTopColumn',
            'displayFooter',
            'displayFooterDown',
            'displayFooterLeft',
            'displayFooterAfter',
            'displayFooterBefore',
            'displayNav1',
            'displayNavFullWidth',
            'displayHomeBlock'
        );
        $this->staticModel = new Staticblock();
        parent::__construct();

        $this->displayName = $this->l('Wb Staticblock');
        $this->description = $this->l('Manager Static blocks');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
        $this->admin_tpl_path = _PS_MODULE_DIR_ . $this->name . '/views/templates/admin/';
    }

    public function install()
    {
        // Install SQL
        $sql = array();
        include(dirname(__FILE__) . '/sql/install.php');
        foreach ($sql as $s) {
            if (!Db::getInstance()->execute($s)) {
                return false;
            }
        }
          // Install Tabs
        if (!(int)Tab::getIdFromClassName('AdminWbMenu')) {
            $parent_tab = new Tab();
            // Need a foreach for the language
            $parent_tab->name[$this->context->language->id] = $this->l('Wb Extentions');
            $parent_tab->class_name = 'AdminWbMenu';
            $parent_tab->id_parent = 0; // Home tab
            $parent_tab->module = $this->name;
            $parent_tab->add();
        }

        $tab = new Tab();
        // Need a foreach for the language
        foreach (Language::getLanguages() as $language) {
            $tab->name[$language['id_lang']] = $this->l('Manage Staticblocks');
        }
        $tab->class_name = 'AdminWbblocks';
        $tab->id_parent = (int)Tab::getIdFromClassName('AdminWbMenu');
        $tab->module = $this->name;
        $tab->add();
        // Set some defaults
        return parent::install() &&
                $this->registerHook('displayTop') &&
                $this->registerHook('displayTopColumn') &&
                $this->registerHook('displayLeftColumnProduct') &&
                $this->registerHook('displayLeftColumn') &&
                $this->registerHook('rightColumn') &&
                $this->registerHook('displayHome') &&
                $this->registerHook('displayNav1') &&
                $this->registerHook('displayFooter') &&
                $this->registerHook('displayHeader') &&
                $this->registerHook('displayFooterDown') &&
                $this->registerHook('displayFooterLeft') &&
                $this->registerHook('displayFooterAfter') &&
                $this->registerHook('displayFooterBefore') &&
                $this->registerHook('displayBackOfficeHeader') &&
                $this->registerHook('displayNavFullWidth') &&
                $this->registerHook('displayHomeBlock');
    }

    public function uninstall()
    {
        Configuration::deleteByName('WBSTATICBLOCKS');

        // Uninstall Tabs
        //$tab = new Tab((int) Tab::getIdFromClassName('AdminPosstaticblocksMain'));
        //$tab->delete();
        $sql = array();
        include(dirname(__file__) . '/sql/uninstall_sql.php');
        foreach ($sql as $s) {
            if (!Db::getInstance()->Execute($s)) {
                return false;
            }
        }
        $tab = new Tab((int) Tab::getIdFromClassName('AdminWbblocks'));
        $tab->delete();

        // Uninstall Module
        if (!parent::uninstall()) {
            return false;
        }
        return true;
    }
    
    public function hookDisplayNav1()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayNav1');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }
    
    public function hookDisplayTop()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayTop');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }
    
    public function hookDisplayTopColumn()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayTopColumn');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }
    
    public function hookDisplayLeftColumn()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayLeftColumn');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }
    
    public function hookRightColumn()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'rightColumn');
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }
    
    public function hookDisplayFooter()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayFooter');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }

    public function hookDisplayFooterLeft()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayFooterLeft');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }
    
    public function hookDisplayHome()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayHome');
        if (is_array($staticBlocks)<1) {
            return null;
        }

        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }

    public function hookDisplayHomeBlock()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayHomeBlock');
        if (is_array($staticBlocks)<1) {
            return null;
        }

        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }
    
    public function hookDisplayLeftColumnProduct()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayLeftColumnProduct');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }
    
    public function hookDisplayFooterDown()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayFooterDown');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }

    public function hookDisplayFooterAfter()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayFooterAfter');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }

    public function hookDisplayFooterBefore()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayFooterBefore');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }


    public function hookDisplayNavFullWidth()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $staticBlocks = $this->staticModel->getStaticblockLists($id_shop, 'displayNavFullWidth');
        if (is_array($staticBlocks)<1) {
            return null;
        }
        
        $this->smarty->assign(array(
            'staticblocks' => $staticBlocks,
        ));
        return $this->display(__FILE__, '/views/templates/hook/block.tpl');
    }

    public function hookDisplayBackOfficeHeader()
    {
        if (method_exists($this->context->controller, 'addJquery')) {
            $this->context->controller->addJquery();
            $this->context->controller->addJS(($this->_path).'/views/js/staticblock.js');
        }
    }
    
    public function getModulById($id_module)
    {
        return Db::getInstance()->getRow(
            'SELECT m.* FROM `' . _DB_PREFIX_ . 'module` m
            JOIN `' . _DB_PREFIX_ . 'module_shop` ms ON
            (m.`id_module` = ms.`id_module` AND ms.`id_shop` = ' . (int) ($this->context->shop->id) . ')
            WHERE m.`id_module` = ' . $id_module
        );
    }

    public function getHooksByModuleId($id_module)
    {
        $sql = 'SELECT * FROM '._DB_PREFIX_.'hook_module AS `ps` LEFT JOIN '._DB_PREFIX_.'hook AS `ph` ON
        `ps`.`id_hook` = `ph`.`id_hook`  WHERE `ps`.`id_module`='.$id_module.' GROUP BY `name`';
        $hooks = array();
        if ($object = Db::getInstance()->ExecuteS($sql)) {
            if (is_array($object)>0) {
                foreach ($object as $module_hook) {
                    if ($module_hook['name']) {
                        $hooks[] = $module_hook['name'];
                        //if (isset($module_hook['name'])) {
                    }
                }
            }
        }
        return $hooks;
    }

    public static function getHookByArrName($arrName)
    {
        $result = Db::getInstance()->ExecuteS(
            'SELECT `id_hook`, `name`
            FROM `' . _DB_PREFIX_ . 'hook` 
            WHERE `name` IN (\'' . implode("','", $arrName) . '\')'
        );
        return $result;
    }
  
    public function getListModuleInstalled()
    {
        $mod = new wbstaticblocks();
        $modules = $mod->getModulesInstalled(0);
        $arrayModule = array();
        foreach ($modules as $key => $module) {
            if ($module['active']==1) {
                $arrayModule[0] = array('id_module'=>0, 'name'=>'Chose Module');
                $arrayModule[$key] = $module;
            }
        }
        if ($arrayModule) {
            return $arrayModule;
        }
        return array();
    }
    
    private function installHookCustomer()
    {
        //_installHookCustomer
        $hookspos = array(
            'displayLeftColumn',
            'displayLeftColumnProduct',
            'displayNav1',
            'displayFooterDown',
            'displayFooterLeft',
            'displayFooterAfter',
            'displayFooterBefore',
            'displayNavFullWidth',
            'dispalyHomeBlock'
        );
        foreach ($hookspos as $hook) {
            if (Hook::getIdByName($hook)) {
            } else {
                $new_hook = new Hook();
                $new_hook->name = pSQL($hook);
                $new_hook->title = pSQL($hook);
                $new_hook->add();
                $id_hook = $new_hook->id;
            }
        }
        unset($id_hook);
        return true;
    }
}
