{*
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
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($hook_mobile)}
	<div class="input_search" data-role="fieldcontain">
		<form method="get" action="{$link->getPageLink('search', true)|escape:'html':'UTF-8'}" id="searchbox">
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query" type="search" id="search_query_top" name="search_query" placeholder="{l s='Search entire store...' mod='wbblocksearch'}" value="{$search_query|escape:'html':'UTF-8'|stripslashes}" />
		</form>
	</div>
{else}
<!-- Block search module TOP -->
<div class="desktop-search d-inline-block">
<div class="d-search">
	<button id="search_toggle" class="search-toggle" data-toggle="collapse" onclick="openSearch()">
           <svg width="21px" height="20px"><use xlink:href="#hsearch" /></svg>
	</button>
</div>
<div class="wbSearch" id="search_toggle_desc">
	<div id="search_block_top">
		<select id="search_category" name="search_category" class="form-control float-xs-left text-capitalize">
				<option value="all">{l s='All Categories' mod='wbblocksearch'}</option>
				{$search_category|escape:'quotes':'UTF-8' nofilter}
			</select>
		<form id="searchbox" class="input-group" method="get" action="{$search_controller_url|escape:'html':'UTF-8'}">
		   
			<input type="hidden" name="controller" value="search">
			
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			
			<input class="search_query form-control float-xs-left text-capitalize" type="text" id="search_query_top" name="s" placeholder="{l s='Search entire store...' mod='wbblocksearch'}" value="{$search_query|escape:'htmlall':'UTF-8'|stripslashes}" />
			
			<div id="wb_url_ajax_search" style="display:none">
			<input type="hidden" value="{$base_ssl|escape:'html':'UTF-8'}/controller_ajax_search.php" class="url_ajax" />
			</div>
			<div class="input-group-btn">
			<!-- <button type="submit" name="submit_search" class="btn btn-default button-search">
				<span class="f1 text-capitalize">{l s='Search' mod='wbblocksearch'}</span>
			</button> -->
			<a href="javascript:void(0)" class="closebtn close-nav" onclick="closeSearch()"><i class="fa fa-close"></i></a>
			</div>
		</form>
		
	</div>
</div>
{/if}
</div><script type="text/javascript">
var limit_character = "<p class='limit'>{l s='Number of characters at least are 3' mod='wbblocksearch'}</p>";
var close_text = "{l s='close' mod='wbblocksearch'}";
</script>
<!-- /Block search module TOP -->