{**
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
*  @author    Codespot SA <support@presthemes.com>
*  @copyright 2017-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div class="wt-right-slidebar">
	<div class="rightbar_inner">
		<div id="rightbar_cart" class="rightbar_wrap">
			<a id="rightbar-shopping_cart" href="{$link->getPageLink('order', true)|escape:'html':'UTF-8'}" class="rightbar_tri icon_wrap" title="{l s='shopping cart' mod='wbthemeconfigurator'}">
				<i class="icon-shopping-cart icon_btn icon-0x"></i>
				<span class="icon_text">{l s='Cart' mod='wbthemeconfigurator'}</span>
				<span class="ajax_cart_quantity {if $cart_qties > 0}amount_circle{/if}">{$cart_qties|intval}</span>
			</a>
		</div>
		<div id="rightbar_compare" class="rightbar_wrap">
			<a id="rightbar-product_compare" class="rightbar_tri icon_wrap" href="{$link->getPageLink('products-comparison')|escape:'html':'UTF-8'}" title="{l s='Compare Products' mod='wbthemeconfigurator'}">
				<i class="icon-ajust icon-0x icon_btn"></i>
				<span class="icon_text">{l s='Compare' mod='wbthemeconfigurator'}</span>
				<span class="compare_quantity {if count($compared_products) > 0}amount_circle{/if}">
					{count($compared_products)|intval}
				</span>
			</a>
		</div>
		<div id="rightbar_wishlist" class="rightbar_wrap">
			<a id="rightbar-product_wishlist" class="rightbar_tri icon_wrap" href="#" title="{l s='wishlist Products' mod='wbthemeconfigurator'}">
				<i class="icon-heart icon-0x icon_btn"></i>
				<span class="icon_text">{l s='Wishlist' mod='wbthemeconfigurator'}</span>
			</a>
		</div>
		<div id="wt_to_top" data-toggle="tooltip" data-placement="top">
			<a href="#top_bar" class="icon_wrap disabled" title="{l s='Back to top' mod='wbthemeconfigurator'}">
				<i class="icon-chevron-up icon-0x"></i>
				<span class="icon_text">{l s='Top' mod='wbthemeconfigurator'}</span>
			</a>
		</div>
	</div>
</div>