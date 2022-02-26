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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2019 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class WbMegamenuRowClass extends ObjectModel
{
    public $id_wbmegamenu;
    public $class;
    public $active;
    public static $definition = array(
        'table' => 'wbmegamenu_row',
        'primary' => 'id_row',
        'multilang_shop' => true,
        'fields' => array(
            'id_wbmegamenu' =>  array(
                'type' => self::TYPE_INT,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true
            ),
            'class' =>  array(
                'type' => self::TYPE_STRING,
                'shop' => true,
                'validate' => 'isCleanHtml',
                'size' => 255
            ),
            'active' => array(
                'type' => self::TYPE_INT,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true
            ),
        )
    );

    public function __construct($id_row = null, $id_lang = null, $id_shop = null, Context $context = null)
    {
        parent::__construct($id_row, $id_lang, $id_shop);
        Shop::addTableAssociation('wbmegamenu_row', array('type' => 'shop'));
        unset($context);
    }

    public function add($autodate = true, $null_values = false)
    {
        $res = parent::add($autodate, $null_values);
        return $res;
    }

    public function delete()
    {
        $res = true;
        $column_items = $this->getColumByRow($this->id);
        if (count($column_items) > 0) {
            foreach ($column_items as $column_item) {
                $res &= $this->deleteMenuItem($column_item['id_column']);
                $res &= $this->deleteColumnItem($column_item['id_column']);
            }
        }
        $res &= parent::delete();
        return $res;
    }
    
    public function getColumByRow($id_row)
    {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            'SELECT mc.*
            FROM '._DB_PREFIX_.'wbmegamenu_column mc
            WHERE mc.`id_row` = '.$id_row
        );
    }
    
    public function deleteMenuItem($id_col)
    {
        $res = true;
        $menu_items = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            'SELECT mi.*
            FROM '._DB_PREFIX_.'wbmegamenu_item mi
            WHERE mi.`id_column` = '.$id_col.' ORDER BY mi.id_item'
        );
        
        if (isset($menu_items) && count($menu_items) > 0) {
            foreach ($menu_items as $menu_item) {
                $res &= Db::getInstance()->execute(
                    'DELETE FROM `'._DB_PREFIX_.'wbmegamenu_item_lang`
                    WHERE `id_item` = '.$menu_item['id_item']
                );
                
                $res &= Db::getInstance()->execute(
                    'DELETE FROM `'._DB_PREFIX_.'wbmegamenu_item_shop`
                    WHERE `id_item` = '.$menu_item['id_item']
                );
                
                $res &= Db::getInstance()->execute(
                    'DELETE FROM `'._DB_PREFIX_.'wbmegamenu_item`
                    WHERE `id_item` = '.$menu_item['id_item']
                );
            }
        }
        return $res;
    }
    public function deleteColumnItem($id_col)
    {
        $res = true;
        $res &= Db::getInstance()->execute(
            'DELETE FROM `'._DB_PREFIX_.'wbmegamenu_column_shop`
            WHERE `id_column` = '.$id_col
        );
        $res &= Db::getInstance()->execute(
            'DELETE FROM `'._DB_PREFIX_.'wbmegamenu_column`
            WHERE `id_column` = '.$id_col
        );
        return $res;
    }
}
