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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!-- Module Megamenu-->
<div id="_desktop_top_menu" class="container_wb_megamenu hidden-md-down text-xs-left col-xl-10 col-lg-9 col-md-9">
<div class="wb-menu-vertical clearfix">
{$id_lang = Context::getContext()->language->id}
	<div class="menu-vertical">
	<a href="javascript:void(0);" class="close-menu-content"><span><i class="fa fa-times" aria-hidden="true"></i></span></a>
	<ul class="menu-content">
		{foreach from=$menus item=menu name=menus}
			{if isset($menu.type) && $menu.type == 'CAT' && $menu.dropdown == 1}
				{$menu.sub_menu|escape:'quotes':'UTF-8' nofilter}
			{else}
				<li class="level-1 {$menu.class|escape:'html':'UTF-8'}{if count($menu.sub_menu) > 0} parent{/if}">
					
					<a href="{$menu.link|escape:'html':'UTF-8'}" class="{if $menu.icon}wbIcon{/if}"
					>
					{if $menu.type_icon == 0 && $menu.icon != ''}
						<img class="img-icon" src="{$icon_path|escape:'html':'UTF-8'}{$menu.icon|escape:'html':'UTF-8'}" alt=""/>
					{elseif  $menu.type_icon == 1 && $menu.icon != ''}
						<i class="{$menu.icon|escape:'html':'UTF-8'}"></i>
					{/if}
					<span>
						{$menu.title|escape:'html':'UTF-8'}
						{if $menu.subtitle != ''}<strong>{$menu.subtitle|escape:'html':'UTF-8'}</strong>{/if}
					</span>
					{* {if $menu.sub_menu|count}
	                  
	                  {assign var=_expand_id value=10|mt_rand:100000}
	                  <span class="right-angle float-xs-right hidden-md-down">
	                    <span data-target="#top_sub_menu_{$_expand_id}" data-toggle="collapse" class="navbar-toggler collapse-icons">
	                      <i class="fa fa-angle-down add"></i>
	                      <i class="fa fa-angle-up remove"></i>
	                    </span>
	                  </span>
	                {/if} *}
					</a>
					<span class="icon-drop-mobile"></span>
					{if isset($menu.sub_menu) && count($menu.sub_menu) > 0}
						<div class="wb-sub-menu menu-dropdown col-xs-12 {$menu.width_sub|escape:'html':'UTF-8'} {$menu.align_sub|escape:'html':'UTF-8'}">
							{foreach from=$menu.sub_menu item= menu_row name=menu_row}
								<div class="wb-menu-row row {$menu_row.class|escape:'html':'UTF-8'}">
									{if isset($menu_row.list_col) && count($menu_row.list_col) > 0}
										{foreach from=$menu_row.list_col item= menu_col name=menu_col}
											<div class="wb-menu-col col-xs-12 {$menu_col.width|escape:'html':'UTF-8'} {$menu_col.class|escape:'html':'UTF-8'} {$menu.type|escape:'quotes':'UTF-8'}">
												{if count($menu_col.list_menu_item) > 0}
													<ul class="ul-column ">
													{foreach from=$menu_col.list_menu_item item= sub_menu_item name=sub_menu_item}
														<li class="menu-item {if $sub_menu_item.type_item == 1} item-header{else} item-line{/if} {if $sub_menu_item.type_link == 4}product-block{/if}">
															{if $sub_menu_item.type_link == 4}
																{$id_lang = Context::getContext()->language->id}
																{$id_lang = Context::getContext()->language->id}
																{foreach from = $sub_menu_item.product item=product name=product}
																<div class="product-container clearfix">
																	
																	<div class="product-image-container float-xs-left">
																		<a class="product_img_link" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url">
																			{* <img class="replace-2x img-responsive" src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}"  itemprop="image" /> *}
																			<img class="img-responsive" src="{$product.pro_image}" alt="{$product.name|escape:'html':'UTF-8'}">
																		</a>
																	</div>
																	<div class="name-price">
																		<h3 class="product-name">
																			<a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url" >
																				{$product.name}
																			</a>
																		</h3>

																        <div class="content_price product-price-and-shipping">
																			{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
																				<span itemprop="price" class="price {if isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0} special-price{/if}">												
																						{Product::convertAndFormatPrice($product.price)}

																						</span>
																				{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
																						<span class="old-price regular-price">
																						{Product::convertAndFormatPrice($product.price_without_reduction)}
																						</span>
																				{/if}
																					{hook h="displayProductPriceBlock" product=$product type="price"}
																					{hook h="displayProductPriceBlock" product=$product type="unit_price"}
																			{/if}
																		</div>
																		<div class="megamenu-review">
																		 {block name='product_reviews'}
																            {hook h='displayProductListReviews' product=$product}
																          {/block}
																         </div>
																	</div>
																		{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
																			{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
																					<p class="sale-bkg animated" href="{$product.link|escape:'html':'UTF-8'}">
																								<span class="sale">
																								{if $product.specific_prices && $product.specific_prices.reduction_type == 'percentage'}
																								-{$product.specific_prices.reduction|escape:'quotes':'UTF-8' * 100}%
																								{else}
																								-{$product.price_without_reduction-$product.price|floatval}
																								{/if}
																								</span>
																							</p>
																			{/if}
																			{/if}
																	   
																	
																</div>
																{/foreach}
															{else if $sub_menu_item.type_link == 3}
																<a href="{$sub_menu_item.link|escape:'html':'UTF-8'}">{$sub_menu_item.title|escape:'html':'UTF-8'}</a>
																<div class="html-block">
																	{$sub_menu_item.text|escape:'quotes':'UTF-8' nofilter}
																</div>
															{else}
																<a href="{$sub_menu_item.link|escape:'html':'UTF-8'}">{$sub_menu_item.title|escape:'html':'UTF-8' nofilter}</a>
															{/if}
														</li>
													{/foreach}
													</ul>
												{/if}
											</div>
										{/foreach}
									{/if}
								</div>
							{/foreach}
						</div>
					{/if}
				</li>
			{/if}
		{/foreach}
	</ul>
	</div>
	<!-- <script type="text/javascript">
		text_more = "{l s='More' d='Modules.WBMegamenu'}";
		vnumLiItem = $("#wb-menu-vertical .menu-content li.level-1").length;
		nIpadHorizontal = 6;
		nIpadVertical = 5;
		function getHtmlHide(nIpad,vnumLiItem) 
			 {
				var htmlLiHide="";
				if($("#more_megamenu").length==0)
					for(var i=(nIpad+1);i<=vnumLiItem;i++)
						htmlLiHide+='<li>'+$('#wb-menu-vertical ul.menu-content li.level-1:nth-child('+i+')').html()+'</li>';
				return htmlLiHide;
			}

		htmlLiH = getHtmlHide(nIpadHorizontal,vnumLiItem);
		htmlLiV = getHtmlHide(nIpadVertical,vnumLiItem);
		htmlMenu=$("#wb-menu-vertical").html();
		
		$(window).load(function(){
		addMoreResponsive(nIpadHorizontal,nIpadVertical,htmlLiH,htmlLiV,htmlMenu);
		});
		$(window).resize(function(){
		addMoreResponsive(nIpadHorizontal,nIpadVertical,htmlLiH,htmlLiV,htmlMenu);
		});
	</script> -->
</div>
</div>
<!-- /Module Megamenu -->