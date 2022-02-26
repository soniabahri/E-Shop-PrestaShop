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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wbmegamenu` (
    `id_wbmegamenu` int(11) NOT NULL AUTO_INCREMENT,
    `type_link` int(10) unsigned NOT NULL,
    `dropdown` int(10) unsigned NOT NULL,
    `type_icon` int(10) unsigned NOT NULL,
    `icon` varchar(255) NOT NULL,
    `align_sub` varchar(255) NOT NULL,
    `width_sub` varchar(255) NOT NULL,
    `class` varchar(255) NOT NULL,
    `position` int(10) unsigned NOT NULL DEFAULT \'0\',
    `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
    PRIMARY KEY  (`id_wbmegamenu`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wbmegamenu_shop` (
    `id_wbmegamenu` int(11) NOT NULL AUTO_INCREMENT,
    `id_shop` int(10) unsigned NOT NULL,
    `type_link` int(10) unsigned NOT NULL,
    `dropdown` int(10) unsigned NOT NULL,
    `type_icon` int(10) unsigned NOT NULL,
    `icon` varchar(255) NOT NULL,
    `align_sub` varchar(255) NOT NULL,
    `width_sub` varchar(255) NOT NULL,
    `class` varchar(255) NOT NULL,
    `position` int(10) unsigned NOT NULL DEFAULT \'0\',
    `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
    PRIMARY KEY  (`id_wbmegamenu`, `id_shop`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wbmegamenu_lang` (
      `id_wbmegamenu` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `id_shop` int(10) unsigned NOT NULL,
      `id_lang` int(10) unsigned NOT NULL,
      `title` varchar(255) NOT NULL,
      `link` varchar(255) NOT NULL,
      `subtitle` varchar(255) NOT NULL,
      PRIMARY KEY (`id_wbmegamenu`, `id_shop`, `id_lang`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wbmegamenu_row` (
      `id_row` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `id_wbmegamenu` int(10) unsigned NOT NULL,
      `class` varchar(255),
      `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
      PRIMARY KEY (`id_row`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';
    
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wbmegamenu_row_shop` (
      `id_row` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `id_wbmegamenu` int(10) unsigned NOT NULL,
      `id_shop` int(10) unsigned NOT NULL,
      `class` varchar(255),
      `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
      PRIMARY KEY (`id_row`,`id_shop`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';
    
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wbmegamenu_column` (
      `id_column` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `id_row` int(10) unsigned NOT NULL,
      `width` varchar(255) NOT NULL,
      `class` varchar(255),
      `position` int(10) unsigned NOT NULL DEFAULT \'0\',
      `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
      PRIMARY KEY (`id_column`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';
    
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wbmegamenu_column_shop` (
      `id_column` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `id_row` int(10) unsigned NOT NULL,
      `id_shop` int(10) unsigned NOT NULL,
      `width` varchar(255) NOT NULL,
      `class` varchar(255),
      `position` int(10) unsigned NOT NULL DEFAULT \'0\',
      `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
      PRIMARY KEY (`id_column`,`id_shop`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wbmegamenu_item` (
    `id_item` int(11) NOT NULL AUTO_INCREMENT,
    `id_column` int(11) unsigned NOT NULL,
    `type_link` int(10) unsigned NOT NULL,
    `type_item` varchar(255) NOT NULL,
    `id_product` int(10) unsigned NOT NULL,
    `position` int(10) unsigned NOT NULL DEFAULT \'0\',
    `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
    PRIMARY KEY  (`id_item`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wbmegamenu_item_shop` (
    `id_item` int(11) NOT NULL AUTO_INCREMENT,
    `id_column` int(11) unsigned NOT NULL,
    `id_shop` int(10) unsigned NOT NULL,
    `type_link` int(10) unsigned NOT NULL,
    `type_item` varchar(255) NOT NULL,
    `id_product` int(10) unsigned NOT NULL,
    `position` int(10) unsigned NOT NULL DEFAULT \'0\',
    `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
    PRIMARY KEY  (`id_item`,`id_shop`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wbmegamenu_item_lang` (
    `id_item` int(11) NOT NULL AUTO_INCREMENT,
    `id_shop` int(10) unsigned NOT NULL,
    `id_lang` int(10) unsigned NOT NULL,
    `title` varchar(255) NOT NULL,
    `link` varchar(255) NOT NULL,
    `text` text,
    PRIMARY KEY  (`id_item`,`id_shop`,`id_lang`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
