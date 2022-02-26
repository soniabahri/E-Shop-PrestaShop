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

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class Staticblock extends ObjectModel
{
    /** @var string Name */
    public $description;
    public $title;
    public $hook_position;
    public $name_module;
    public $hook_module;
    public $position;
    public $active;
    public $insert_module;
    public $showhook;
    public $wborder;
    public $identify;
   
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'wbstaticblock',
        'multishop' => true,
        'multilang' => true,
        'primary' => 'id_wbstaticblock',
        'fields' => array(
            'wborder' => array('type' => self::TYPE_INT,'lang' => false),
            'active' => array('type' => self::TYPE_INT,'lang' => false),
            'insert_module' => array('type' => self::TYPE_INT,'lang' => false),
            'showhook' => array(
                'type' => self::TYPE_INT,
                'lang' => false
            ),
            'identify' => array(
                'type' => self::TYPE_STRING,
                'lang' => false,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 128
            ),
            'hook_position' => array('type' => self::TYPE_STRING,
                'lang' => false,
                'validate' => 'isGenericName',
                'required' => false,
                'size' => 128
            ),
            'name_module' => array(
                'type' => self::TYPE_STRING,
                'lang' => false,
                'validate' => 'isGenericName',
                'required' => false,
                'size' => 128
            ),
            'hook_module' => array(
                'type' => self::TYPE_STRING,
                'lang' => false,
                'validate' => 'isGenericName',
                'required' => false,
                'size' => 128
            ),
            // Lang fields
            'title' => array(
                'type' => self::TYPE_STRING,
                'lang' => true,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 128
            ),
            'description' => array(
                'type' => self::TYPE_HTML,
                'lang' => true,
                'validate' => 'isString',
                'size' => 3999999999999
            ),
        ),
    );
    
    public function getStaticblockLists($id_shop = null, $hook_position = 'displayTop')
    {
        $id_lang = (int)Context::getContext()->language->id;
        $object =  Db::getInstance()->executeS(
            'SELECT * FROM '._DB_PREFIX_.'wbstaticblock AS psb 
            LEFT JOIN '._DB_PREFIX_.'wbstaticblock_lang AS psl ON psb.id_wbstaticblock = psl.id_wbstaticblock
            LEFT JOIN '._DB_PREFIX_.'wbstaticblock_shop AS pss ON psb.id_wbstaticblock = pss.id_wbstaticblock
            WHERE id_shop ='.$id_shop.' 
            AND id_lang ='.$id_lang.'
            AND `hook_position` = "'.$hook_position.'" 
            AND `showhook` = 1 ORDER BY `wborder` ASC'
        );
            
        $newObject = array();
        if (count($object) >0) {
            $blockModule= null;
            foreach ($object as $key => $ob) {
                $nameModule = $ob['name_module'];
                $hookModule = $ob['hook_module'];
                $insert_module = $ob['insert_module'];
                if ($insert_module!=0) {
                    $blockModule = $this->getModuleAssign($nameModule, $hookModule);
                }
                //echo "<Pre>"; print_r($blockModule); echo "</pre>";
                $ob['block_module'] = $blockModule;
                $description = $ob['description'];
                $description = str_replace('/wb_oregon/', __PS_BASE_URI__, $description);
                $ob['description'] = $description;
                // array_push($ob, $blockModule);
                $newObject[$key] = $ob;
            }
            return $newObject;
        }
        return null;
    }
    
    public function getModuleAssign($module_name = '', $name_hook = '')
    {
        if (!$module_name || !$name_hook || $module_name =='Chose Module') {
            return ;
        }
        $module = Module::getInstanceByName($module_name);
        $module_id = $module->id;
        $id_hook = Hook::getIdByName($name_hook);
        $hook_name = $name_hook;
        if (!$module) {
            return ;
        }
        $module_name = $module->name;
        if (Validate::isLoadedObject($module) && $module->id) {
            $array = array();
            $array['id_hook']   = $id_hook;
            $array['module']    = $module_name;
            $array['id_module'] = $module->id;
            return self::renderModuleByHook($hook_name, array(), $module->id, $array);
        }
        unset($module_id);
        return '';
    }
   
    public static function renderModuleByHook($hook_name, $hookArgs = array(), $id_module = null, $array = array())
    {
        $cart = null;
        $cookie = null;
               
        if (!$hook_name || !$id_module) {
            return ;
        }
        if ((!empty($id_module) and !Validate::isUnsignedId($id_module)) or !Validate::isHookName($hook_name)) {
            die(Tools::displayError());
        }
        if (!isset($hookArgs['cookie']) or !$hookArgs['cookie']) {
            $hookArgs['cookie'] = $cookie;
        }
        if (!isset($hookArgs['cart']) or !$hookArgs['cart']) {
            $hookArgs['cart'] = $cart;
        }
        
        if ($id_module and $id_module != $array['id_module']) {
            return ;
        }
        if (!($moduleInstance = Module::getInstanceByName($array['module']))) {
            return ;
        }
        $retro_hook_name = Hook::getRetroHookName($hook_name);
        $hook_callable = is_callable(array($moduleInstance, 'hook'.$hook_name));
        $hook_retro_callable = is_callable(array($moduleInstance, 'hook'.$retro_hook_name));
        $output = '';
        if (($hook_callable || $hook_retro_callable)) {
            if ($hook_callable) {
                $output = $moduleInstance->{'hook'.$hook_name}($hookArgs);
            } elseif ($hook_retro_callable) {
                $output = $moduleInstance->{'hook'.$retro_hook_name}($hookArgs);
            }
        } else {
            //echo "<pre>"; print_r($moduleInstance->name); die;
            if ($moduleInstance instanceof WidgetInterface) {
                $output = $moduleInstance->renderWidget($hook_name, $hookArgs);
            }
        }
        return $output;
    }
}
