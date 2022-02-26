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

class WbMegamenuClass extends ObjectModel
{
    public $type_link;
    public $dropdown;
    public $type_icon;
    public $icon;
    public $class;
    public $align_sub;
    public $width_sub;
    public $title;
    public $link;
    public $subtitle;
    public $position;
    public $active;
    public static $definition = array(
        'table' => 'wbmegamenu',
        'primary' => 'id_wbmegamenu',
        'multilang' => true,
        'multilang_shop' => true,
        'fields' => array(
            'type_link' => array(
                'type' => self::TYPE_BOOL,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true,
                'size' => 255
            ),
            'dropdown' => array(
                'type' => self::TYPE_BOOL,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true
            ),
            'type_icon' => array(
                'type' => self::TYPE_BOOL,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true
            ),
            'icon' => array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml'),
            'align_sub' => array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml'),
            'width_sub' => array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml'),
            'class' => array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml'),
            'title' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),
            'link' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),
            'subtitle' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),
            'position' => array(
                'type' => self::TYPE_INT,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true
            ),
            'active' => array(
                'type' => self::TYPE_BOOL,
                'shop' => true,
                'validate' => 'isBool',
                'required' => true
            )
        )
    );

    public function __construct($id_wbmegamenu = null, $id_lang = null, $id_shop = null, Context $context = null)
    {
        parent::__construct($id_wbmegamenu, $id_lang, $id_shop);
        Shop::addTableAssociation('wbmegamenu', array('type' => 'shop'));
        Shop::addTableAssociation('wbmegamenu_lang', array('type' => 'fk_shop'));
        if ($this->id) {
            $this->active = $this->getFieldShop('active');
        }
        unset($context);
    }
    
    public function getFieldShop($field)
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $sql = 'SELECT wms.'.$field.' FROM '._DB_PREFIX_.'wbmegamenu wm
        LEFT JOIN '._DB_PREFIX_.'wbmegamenu_shop wms ON (wm.id_wbmegamenu = wms.id_wbmegamenu)
        WHERE wm.id_wbmegamenu = '.$this->id.' AND wms.id_shop = '.$id_shop.'';
        $result = Db::getInstance()->getValue($sql);
        return $result;
    }

    public function add($autodate = true, $null_values = false)
    {
        $res = parent::add($autodate, $null_values);
        return $res;
    }

    public function delete()
    {
        $res = true;
        $icon = $this->icon;
        if (preg_match('/sample/', $icon) === 0) {
            if ($icon && file_exists(_PS_MODULE_DIR_.'wbmegamenu/views/img/icons/'.$icon)) {
                $res &= @unlink(_PS_MODULE_DIR_.'wbmegamenu/views/img/icons/'.$icon);
            }
        }
        
        $row_items = $this->getRowByMenu($this->id);
        if (count($row_items) > 0) {
            foreach ($row_items as $row_item) {
                $column_items = $this->getColumByRow($row_item['id_row']);
                if (count($column_items) > 0) {
                    foreach ($column_items as $column_item) {
                        $res &= $this->deleteMenuItem($column_item['id_column']);
                        $res &= $this->deleteColumnItem($column_item['id_column']);
                    }
                }
                $res &= $this->deleteRowItem($row_item['id_row']);
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
    
    public function deleteRowItem($id_row)
    {
        $res = true;
        $res &= Db::getInstance()->execute(
            'DELETE FROM `'._DB_PREFIX_.'wbmegamenu_row_shop`
            WHERE `id_row` = '.$id_row
        );
        
        $res &= Db::getInstance()->execute(
            'DELETE FROM `'._DB_PREFIX_.'wbmegamenu_row`
            WHERE `id_row` = '.$id_row
        );
        return $res;
    }
    
    public function getRowByMenu($id_menu)
    {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            'SELECT mr.*
            FROM '._DB_PREFIX_.'wbmegamenu_row mr
            WHERE mr.`id_wbmegamenu` = '.$id_menu
        );
    }
    
    public function getMenus()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $id_lang = (int)Context::getContext()->language->id;
        $kq = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
            SELECT wb.*, ll.*
            FROM '._DB_PREFIX_.'wbmegamenu_shop wb
            LEFT JOIN `'._DB_PREFIX_.'wbmegamenu_lang` ll ON (ll.`id_wbmegamenu` = wb.`id_wbmegamenu` AND wb.`id_shop` = ll.`id_shop`)
            WHERE wb.active = 1 AND ll.id_shop = '.$id_shop.' AND ll.id_lang='.$id_lang.' ORDER BY wb.position ASC, wb.id_wbmegamenu ASC');
        return $kq;
    }
    
    public function uploadImage($feild, $folder)
    {
        $file_up = '';
        $type = Tools::strtolower(Tools::substr(strrchr($_FILES[$feild]['name'], '.'), 1));
        $imagesize = @getimagesize($_FILES[$feild]['tmp_name']);
        if (isset($_FILES[$feild]) &&
            isset($_FILES[$feild]['tmp_name']) &&
            !empty($_FILES[$feild]['tmp_name']) &&
            !empty($imagesize) &&
            in_array(Tools::strtolower(Tools::substr(strrchr($imagesize['mime'], '/'), 1)), array('jpg', 'gif', 'jpeg', 'png')) &&
            in_array($type, array('jpg', 'gif', 'jpeg', 'png'))) {
            $temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
            $salt = sha1(microtime());
            if (ImageManager::validateUpload($_FILES[$feild])) {
                return false;
            } elseif (!$temp_name || !move_uploaded_file($_FILES[$feild]['tmp_name'], $temp_name)) {
                return false;
            } elseif (!ImageManager::resize($temp_name, _PS_MODULE_DIR_.$folder.$salt.'_'.$_FILES[$feild]['name'], null, null, $type)) {
                return false;
            }
            if (isset($temp_name)) {
                @unlink($temp_name);
            }
            
            $file_up = $salt.'_'.$_FILES[$feild]['name'];
        }
        return $file_up;
    }
    
    public function getPositionByMenu($id_menu)
    {
        $id_shop = (int)Context::getContext()->shop->id;
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow(
            'SELECT ms.`position`
            FROM '._DB_PREFIX_.'wbmegamenu_shop ms
            WHERE ms.`id_wbmegamenu` = '.$id_menu.' AND ms.`id_shop` = '.$id_shop
        );
    }
}
