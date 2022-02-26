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

class WbImageTypeClass extends ObjectModel
{
    public $id;
    public $id_wb_image_type;
    public $name;
    public $width;
    public $height;
    public $id_shop;
    public $active;
    public static $definition = array(
      'table' => 'wb_image_type',
      'primary' => 'id_wb_image_type',
      'multilang' => false,
      'fields' => array(
        'name' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
        'width' =>  array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
        'height' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
        'id_shop' =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
        'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
      ),
    );

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        parent::__construct($id, $id_lang, $id_shop);
    }
    public function update($null_values = false)
    {
        if (!parent::update($null_values)) {
            return false;
        }
        return true;
    }
    public function add($autodate = true, $null_values = false)
    {
        $this->id_shop = (int)Context::getContext()->shop->id;
        if (!parent::add($autodate, $null_values) || !Validate::isLoadedObject($this)) {
            return false;
        }
        return true;
    }
    public static function getAllImageTypes()
    {
        $id_shop = (int)Context::getContext()->shop->id;
        $sql = 'SELECT * FROM `'._DB_PREFIX_.'wb_image_type` ';
        $sql .= ' WHERE active = 1 AND id_shop = '.(int)$id_shop;
        $queryexec = Db::getInstance()->executeS($sql);
        if (isset($queryexec) && !empty($queryexec)) {
            return $queryexec;
        } else {
            $sql2 = 'SELECT * FROM `'._DB_PREFIX_.'wb_image_type` ';
            $sql2 .= ' WHERE active = 1';
            $queryexec2 = Db::getInstance()->executeS($sql2);
            return $queryexec2;
        }
    }
}
