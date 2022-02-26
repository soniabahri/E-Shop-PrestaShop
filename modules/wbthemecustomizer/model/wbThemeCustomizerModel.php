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

class WbThemeCustomizerModel
{
    
    public static function findProductPos($id_category, $id_product)
    {
        $response = Db::getInstance()->getRow(
            'SELECT position
            FROM '._DB_PREFIX_.'category_product
            WHERE id_category = ' . $id_category . '
            AND id_product = ' . $id_product
        );

        if ($response['position'] == null) {
            return false;
        }

        return (int)$response['position'];
    }

    public static function findProductMaxPos($id_category)
    {
        $response = Db::getInstance()->getRow(
            'SELECT MAX(position)
            FROM '._DB_PREFIX_.'category_product
            WHERE id_category = ' . $id_category
        );

        if ($response['MAX(position)'] == null) {
            return false;
        }

        return (int)$response['MAX(position)'];
    }

    public static function getProductIdFromPos($id_category, $position)
    {
        $response = Db::getInstance()->getRow(
            'SELECT id_product
            FROM '._DB_PREFIX_.'category_product
            WHERE id_category = ' . $id_category . '
            AND position = ' . $position
        );

        if ($response['id_product'] == null) {
            return false;
        }
        return (int)$response['id_product'];
    }
}
