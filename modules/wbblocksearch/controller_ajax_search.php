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

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
include_once(dirname(__FILE__).'/wbblocksearch.php');

if (empty($_REQUEST['queryString'])) {
    $search_string = '';
} else {
    $search_string = Tools::replaceAccentedChars($_REQUEST['queryString']);
    $id_cat = Tools::replaceAccentedChars($_REQUEST['id_Cat']);
}
  
$wblivesearch = new WbBlockSearch();
$searchResults = $wblivesearch->liveSearchProduct(
    $id_cat,
    Context::getContext()->language->id,
    $search_string
);
    
if ($searchResults['total'] > 0) {
    Context::getContext()->smarty->assign(
        array(
            'search_Total' => $searchResults['total'],
            'searchResults' => $searchResults['result'],
            'limit_item' => Configuration::get(
                'NUM_ITEM_DISPLAY'
            ),
            'query' => $search_string,
            'link' => Context::getContext()->link
        )
    );
} else {
    Context::getContext()->smarty->assign(
        array(
            'search_Total' => 0,
            'searchResults' => null,
            'limit_item' => Configuration::get(
                'NUM_ITEM_DISPLAY'
            ),
            'query' => $search_string,
            'link' => Context::getContext()->link
        )
    );
}
echo $wblivesearch->display(dirname(__FILE__).'/wbblocksearch.php', 'wb_search_result.tpl');
