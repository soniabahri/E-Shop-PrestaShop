{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{* {block name='header_banner'}
  <div class="header-banner">
    {hook h='displayBanner'}
  </div>
{/block} *}

{* {block name='header_nav'}
  <nav class="header-nav hidden-sm-down">
    <div class="container">
      <div class="row">
          <div class="col-md-6 col-sm-6 text-xs-left nleft">{hook h='displayNav1'}</div>
          <!-- <div class="col-md-6 col-sm-6 text-xs-right topright">{hook h='displayNav2'}</div> -->
      </div>
    </div>
  </nav>
{/block} *}
{block name='header_top'}
  <div class="header-top">
    <div class="container-fluid">
       <div class="row headcolor">
        <div class="col-md-2 col-sm-3 hidden-md-down" id="_desktop_logo">
          {if $page.page_name == 'index'}
              <a href="{$urls.base_url}">
                <img class="logo img-responsive" src="{$shop.logo}" alt="{$shop.name}">
              </a>
          {else}
              <a href="{$urls.base_url}">
                <img class="logo img-responsive" src="{$shop.logo}" alt="{$shop.name}">
              </a>
          {/if}
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12 text-xs-right tright">
      <div class="mobile">
   {* menu *}
    <div class="float-xs-left hidden-lg-up">
    <div id="menu-icon">
    <div class="navbar-header">
        <button type="button" class="btn-navbar navbar-toggle" data-toggle="collapse" onclick="openNav()">
        <i class="fa fa-bars"></i></button>
    </div>
    </div>
    <div id="mySidenav" class="sidenav text-xs-left">
    <div class="close-nav">
        <span class="categories">{l s='Category' d='Shop.Theme.Global'}</span>
        <a href="javascript:void(0)" class="closebtn float-xs-right" onclick="closeNav()"><i class="fa fa-close"></i></a>
    </div>
    <div id="mobile_top_menu_wrapper" class="row hidden-lg-up">
        <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
    </div>
    </div>
    </div>
    {* menu *}
    <div class="top-logo float-xs-left hidden-lg-up" id="_mobile_logo"></div>
    <div class="float-xs-right hidden-lg-up" id="_mobile_cart"></div>
    <div id="_mobile_user_info" class="float-xs-right hidden-lg-up"></div>
    {hook h='displayTop'}
    <div id="_mobile_currency_selector" class="hidden-lg-up"></div>
    <div id="_mobile_language_selector" class="hidden-lg-up"></div>
</div> 
      </div>
      </div>
    </div>
  </div>
{/block}
{* <div class="nfull">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-xs-12 text-xs-left mwidth">
        <div class="row">
        {hook h='displayNavfullWidth'}
      </div>
      </div>
        <div class="col-md-2 text-xs-right lwidth hidden-md-down">
        {hook h='displayTopColumn'}
      </div>
  </div>
</div>
[php]
<lt;link href="{$base_dir}themes/default/css/label.css" rel="stylesheet" type="text/css" media="all">
[/php]
</div> *}