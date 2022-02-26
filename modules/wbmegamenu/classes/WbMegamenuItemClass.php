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

class WbMegamenuItemClass extends ObjectModel
{
    public $id_column;
    public $type_link;
    public $type_item;
    public $id_product;
    public $title;
    public $link;
    public $text;
    public $position;
    public $active;
    public $temp_url = '{wb_menu_h_url}';
    public static $definition = array(
        'table' => 'wbmegamenu_item',
        'primary' => 'id_item',
        'multilang' => true,
        'multilang_shop' => true,
        'fields' => array(
            'id_column' =>  array(
                'type' => self::TYPE_BOOL,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true
            ),
            'type_link' =>  array(
                'type' => self::TYPE_BOOL,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true,
                'size' => 255
            ),
            'type_item' =>  array(
                'type' => self::TYPE_BOOL,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'required' => true,
                'size' => 255
            ),
            'id_product' => array(
                'type' => self::TYPE_BOOL,
                'shop' => true,
                'validate' => 'isunsignedInt',
                'size' => 255
            ),
            'title' =>  array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),
            'link' =>   array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),
            'text' =>   array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
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

    public function __construct($id_item = null, $id_lang = null, $id_shop = null, Context $context = null)
    {
        parent::__construct($id_item, $id_lang, $id_shop);
        Shop::addTableAssociation('wbmegamenu_item', array('type' => 'shop'));
        Shop::addTableAssociation('wbmegamenu_item_lang', array('type' => 'fk_shop'));
        if ($this->id) {
            $this->active = $this->getFieldShop('active');
            $languages = Language::getLanguages(false);
            foreach ($languages as $language) {
                if (isset($this->text[(int)($language['id_lang'])]) &&
                    !empty($this->text[(int)($language['id_lang'])])) {
                    $temp = str_replace(
                        $this->temp_url,
                        _PS_BASE_URL_.__PS_BASE_URI__,
                        $this->text[(int)($language['id_lang'])]
                    );
                    $this->text[(int)($language['id_lang'])] = $temp;
                }
            }
        }
        unset($context);
    }
    
    public function getFieldShop($field)
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $sql = 'SELECT wms.'.$field.' FROM '._DB_PREFIX_.'wbmegamenu_item wm
        LEFT JOIN '._DB_PREFIX_.'wbmegamenu_item_shop wms ON (wm.id_item = wms.id_item)
        WHERE wm.id_item = '.$this->id.' AND wms.id_shop = '.$id_shop.'';
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
        $res &= parent::delete();
        return $res;
    }
    
    public function uploadImage($feild, $folder)
    {
        $file_up = '';
        /* Uploads image and sets cat_item */
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
    
    public function getPositionByMenuItem($id_menu_item)
    {
        $id_shop = (int)Context::getContext()->shop->id;
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow(
            'SELECT ms.`position`
            FROM '._DB_PREFIX_.'wbmegamenu_item_shop ms
            WHERE ms.`id_item` = '.$id_menu_item.' AND ms.`id_shop` = '.$id_shop
        );
    }
}
