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
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if isset($upsellProducts) && count($upsellProducts) > 0}
    <div id="wb_productupsell" class="block horizontal_mode">
	<h4 class="title_block title_font">{l s='Customers who bought this product also bought:' mod='wbthemecustomizer'}</h4>
        <div class="row">
            <div id="upsellProduct" class="carousel-grid owl-carousel">
                            {foreach from=$upsellProducts item='upsellProduct' name=upsellProduct}
                                <div class="item{if $smarty.foreach.wbProductCates.first} first{/if}">
                                    <div class="item-inner">
                                        <div class="left-block">
                                            <a class="product_img" href="{$upsellProduct.link}" title="{$upsellProduct.name|htmlspecialchars}">
                                                {if $link->getImageLink($upsellProduct.link_rewrite, $upsellProduct.id_image, 'home_default', $upsellProduct.product_id) != "0"}
                                                    <span class="hover-image"><img class="replace-2x" src="{$link->getImageLink($upsellProduct.link_rewrite, $upsellProduct.id_image, 'home_default', $upsellProduct.product_id)}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" {if isset($homeSize)} height="{$homeSize.height}" width="{$homeSize.width}"{/if}/></span>
                                                {/if}
                                                <span class="img_root">
                                                    <img src="{$upsellProduct.image}" {if isset($homeSize)}height="{$homeSize.height}" width="{$homeSize.width}"{/if} alt="{$upsellProduct.name|htmlspecialchars}" />
                                                </span>
                                            </a>
                                        </div>
                                        <div class="right-block{if isset($WB_categoryShowAvgRating) && $WB_categoryShowAvgRating || !isset($WB_categoryShowAvgRating)} has_ratings{/if}">
                                            <h5 class="sub_title_font"><a class="product-name" href="{$upsellProduct.link}" title="{$upsellProduct.name|htmlspecialchars}">{$upsellProduct.name|truncate:45:'...'|escape:'html':'UTF-8'}</a></h5>
                                            <div class="price-rating">
                                                <div class="content_price">
                                                    {if $upsellProduct.show_price == 1 AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
                                                            <span class="price_display">
                                                                    <span class="price">{convertPrice price=$upsellProduct.displayed_price}</span>
                                                            </span>
                                                    {/if}
                                                </div>
                                                {if (isset($WB_categoryShowAvgRating) && $WB_categoryShowAvgRating) || !isset($WB_categoryShowAvgRating)}
						    {hook h='displayProductListReviews' product=$upsellProduct}
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <a title="{l s='View' mod='wbthemecustomizer'}" href="{$upsellProduct.link}" class="button_small">{l s='View' mod='wbthemecustomizer'}</a><br /> -->
                                </div>
                            {/foreach}
            </div>
        </div>
    </div>
    <script type="text/javascript">
                $('#upsellProduct').owlCarousel({
                    itemsCustom: [ [0, 1], [320, 1], [480, 1], [768, 3], [992, 4], [1200, 5] ],
                    responsiveRefreshRate: 50,
                    slideSpeed: 200,
                    paginationSpeed: 500,
                    rewindSpeed: 600,
                    autoPlay: false,
                    stopOnHover: false,
                    rewindNav: true,
                    pagination: false,
                    navigation: true,
                    navigationText: ['<div class="carousel-previous disable-select"><span class="icon-angle-left"></span></div>', '<div class="carousel-next disable-select"><span class="icon-angle-right"></span></div>']
                });
    </script>
{/if}