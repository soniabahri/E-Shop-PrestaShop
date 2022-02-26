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

class WbMegamenuColumnClass extends ObjectModel
{
    public $id_row;
    public $width;
    public $class;
    public $position;
    public $active;
    public static $definition = array(
        'table' => 'wbmegamenu_column',
        'primary' => 'id_column',
        'multilang_shop' => true,
        'fields' => array(
            'id_row' => array(
                'type' => self::TYPE_INT,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true
            ),
            'width' =>  array(
                'type' => self::TYPE_STRING,
                'shop' => true,
                'validate' => 'isCleanHtml',
                'size' => 255
            ),
            'class' =>  array(
                'type' => self::TYPE_STRING,
                'shop' => true,
                'validate' => 'isCleanHtml',
                'size' => 255
            ),
            'position' => array(
                'type' => self::TYPE_INT,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true
            ),
            'active' => array(
                'type' => self::TYPE_INT,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true
            ),
        )
    );

    public function __construct($id_column = null, $id_lang = null, $id_shop = null, Context $context = null)
    {
        parent::__construct($id_column, $id_lang, $id_shop);
        Shop::addTableAssociation('wbmegamenu_column', array('type' => 'shop'));
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
        $menu_items = $this->getMenuItemByIdColum($this->id);
        if (count($menu_items) > 0) {
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
        $res &= parent::delete();
        return $res;
    }
    
    public function getMenuItemByIdColum($id_column)
    {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            'SELECT mi.*
            FROM '._DB_PREFIX_.'wbmegamenu_item mi
            WHERE mi.`id_column` = '.$id_column.' ORDER BY mi.id_item'
        );
    }
    
    public function getPositionByColumn($id_col)
    {
        $id_shop = (int)Context::getContext()->shop->id;
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow(
            'SELECT ms.`position`
            FROM '._DB_PREFIX_.'wbmegamenu_column_shop ms
            WHERE ms.`id_column` = '.$id_col.' AND ms.`id_shop` = '.$id_shop
        );
    }
}
