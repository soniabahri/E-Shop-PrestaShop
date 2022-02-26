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

class WbPostMetaClass extends ObjectModel
{
    public $id;
    public $id_wbpostmeta;
    public $id_wbposts;
    public $meta_key;
    public $meta_value;
    public static $definition = array(
        'table' => 'wbpostmeta',
        'primary' => 'id_wbpostmeta',
        'multilang' => false,
        'fields' => array(
                'id_wbposts' =>        array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
                'meta_key' =>           array('type' => self::TYPE_STRING, 'validate' => 'isString'),
                'meta_value' =>         array('type' => self::TYPE_HTML, 'validate' => 'isCleanHtml'),
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
        if (!parent::add($autodate, $null_values) || !Validate::isLoadedObject($this)) {
            return false;
        }
        return true;
    }
}
