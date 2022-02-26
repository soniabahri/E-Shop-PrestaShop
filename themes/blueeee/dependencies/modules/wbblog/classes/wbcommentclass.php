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

class WbCommentClass extends ObjectModel
{
    public $id;
    public $id_parent;
    public $id_post;
    public $id_customer;
    public $id_guest;
    public $name;
    public $email;
    public $subject;
    public $website;
    public $content;
    public $position;
    public $uniqueid;
    public $active;
    public $created;
    public $updated;
    public static $definition = array(
        'table' => 'wb_comments',
        'primary' => 'id_wb_comments',
        'multilang' => false,
        'fields' => array(
            'name' =>       array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'email' =>      array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'subject' =>    array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'website' =>    array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'content' =>    array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'id_post'=>     array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_customer'=> array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_guest'=>    array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_parent'=>   array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'position'=>    array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'active'=>      array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'uniqueid' =>   array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'created' =>    array('type' => self::TYPE_DATE, 'validate' => 'isString'),
            'updated' =>    array('type' => self::TYPE_DATE, 'validate' => 'isString'),
        ),
    );
    public function add($autodate = true, $null_values = false)
    {
        // $this->uniqueid = '"'.time().'"';
        if ($this->position <= 0) {
            $this->position = self::getTopPosition() + 1;
        }
        $comment_approved = (int)Configuration::get(wbBlog::$wbblogshortname."comment_approved");
        $this->active = (int)$comment_approved;
        if (!parent::add($autodate, $null_values) || !Validate::isLoadedObject($this)) {
            return false;
        } else {
            return true;
        }
    }
    public static function getTopPosition()
    {
        $sql = 'SELECT MAX(`position`)
                FROM `'._DB_PREFIX_.'wb_comments`';
        $position = DB::getInstance()->getValue($sql);
        return (is_numeric($position)) ? $position : -1;
    }
    public static function getComments($id_post = null)
    {
        if ($id_post == null) {
            return false;
        }
        $sql = 'SELECT * FROM `'._DB_PREFIX_.'wb_comments` xc  WHERE xc.`id_post` = '.$id_post.'
        AND xc.active = 1 ORDER BY xc.position DESC ';
        $rslts = Db::getInstance()->executeS($sql);
            return isset($rslts) ? $rslts : false;
    }
}
