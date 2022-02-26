{**
 * 2007-2019 PrestaShop
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
 * @copyright 2007-2019 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{extends file='page.tpl'}
{block name='head_seo'}
    <title>{l s='My compare' mod='wbcompare'}</title>
{/block}
{block name='breadcrumb'}
    {if isset($breadcrumb)}
        <nav class="breadcrumb">
            <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="{$breadcrumb.links[0].url}">
                        <span itemprop="name">{$breadcrumb.links[0].title}</span>
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="{$link->getModuleLink('field', 'WbCompareProduct', array(), true)|escape:'html':'UTF-8'}">
                        <span itemprop="name">{l s='My compare' mod='wbcompare'}</span>
                    </a>
                </li>
            </ol>
        </nav>
    {/if}
{/block}
{block name='page_content'}
    <section id="main">
    {capture name=path}{l s='Product Comparison' mod='wbcompare'}{/capture}
    <h1 class="heading pro-name"><span class="">{l s='Product Comparison' mod='wbcompare'}</span></h1>
    {if $hasProduct}
        <div class="products_block table-responsive">
            <table id="product_comparison" class="table table-bordered table-responsive">
                <tr>
                    <td class="td_empty compare_extra_information">
                        <span>{l s='Features:' mod='wbcompare'}</span>
                    </td>
                    {foreach from=$products item=product name=for_products}
                        {assign var='replace_id' value=$product.id|cat:'|'}
                        <td class="ajax_block_product comparison_infos product-block product-{$product.id_product}" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
                            <div class="remove">
                                <a class="cmp_remove" href="#" title="{l s='Remove' mod='wbcompare'}" data-id-product="{$product.id_product}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                            <div class="product-image-block">
                                <a href="{$product.url}" class="thumbnail product-thumbnail product_image">
                                        <img
                                            class="center-block"
                                            src = "{$product.cover.bySize.home_default.url}"
                                            data-full-size-image-url = "{$product.cover.large.url}"
                                            alt=""
                                            {if isset($size_home_default.width)}width="{$size_home_default.width}"{/if}
                                            {if isset($size_home_default.height)}height="{$size_home_default.height}"{/if} 
                                            >
                                </a>
                                <div class="conditions-box">
                                    {if isset($product.show_condition) && $product.condition.type == "new" && $product.show_condition == 1  && isset($product.new) && $product.new == 1 }
                                        <span class="new_product">{l s='New' mod='wbcompare'}</span>
                                    {/if}
                                    {if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price }
                                        <span class="sale_product">{l s='Sale' mod='wbcompare'}</span>
                                    {/if}  
                                </div> 
                            </div> <!-- end product-image-block -->
                            <div class="cproduct-description">
                            <div class="product_name" itemprop="name"><a href="{$product.url}">{$product.name|truncate:30:'...'}</a></div>
                            <div class="prices-container">
                                {if $product.show_price}
                                    <div class="product-price-and-shipping">
                                        <span class="price">{$product.price}</span>
                                        {if $product.has_discount}
                                            {hook h='displayProductPriceBlock' product=$product type="old_price"}
                                            <span class="regular-price">{$product.regular_price}</span>
                                            {if $product.discount_type === 'percentage'}
                                                <span class="price-percent-reduction">{$product.discount_percentage}</span>
                                            {/if}
                                        {/if}
                                        {hook h='displayProductPriceBlock' product=$product type="before_price"}


                                        {hook h='displayProductPriceBlock' product=$product type='unit_price'}

                                        {hook h='displayProductPriceBlock' product=$product type='weight'}
                                    </div>
                                {/if}
                            </div> <!-- end prices-container -->
                            <div class="product_desc">
                                {$product.description_short|strip_tags|truncate:100:'...'}
                            </div>
                            <div class="comparison_product_infos">
                                <div class="clearfix">
                                    <div class="button-container">
                                        {if !$configuration.is_catalog}
                                            <form action="{$urls.pages.cart}" method="post">
                                                <input type="hidden" name="token" value="{$static_token}">
                                                <input type="hidden" name="id_product" value="{$product.id}">
                                                <button class="add-to-cart btn-primary" data-button-action="add-to-cart" type="submit" {if !$product.add_to_cart_url }disabled{/if}>
                                                    {if $product.quantity || ($product.quantity == 0 && $product.add_to_cart_url)}
                                                        {l s='Add to cart' mod='wbcompare'}
                                                    {else}
                                                        <i class="fa fa-ban"></i>
                                                    {/if}  
                                                </button>
                                            </form>
                                        {/if}
                                        {* <a class="button lnk_view btn btn-default" href="{$product.url}" title="{l s='View' mod='wbcompare'}">
                                            <span>{l s='View' mod='wbcompare'}</span>
                                        </a> *}
                                    </div>
                                </div>
                            </div> <!-- end comparison_product_infos -->
                        </div>
                        </td>
                    {/foreach}
                </tr>
                {if $ordered_features}
                    {foreach from=$ordered_features item=feature}
                        <tr>
                            {cycle values='comparison_feature_odd,comparison_feature_even' assign='classname'}
                            <td class="{$classname} feature-name" >
                                <strong>{$feature.name|escape:'html':'UTF-8'}</strong>
                            </td>
                            {foreach from=$products item=product name=for_products}
                                {assign var='product_id' value=$product.id}
                                {assign var='feature_id' value=$feature.id_feature}
                                {if isset($product_features[$product_id])}
                                    {assign var='tab' value=$product_features[$product_id]}
                                    <td class="{$classname} comparison_infos product-{$product.id}">{if (isset($tab[$feature_id]))}{$tab[$feature_id]|escape:'html':'UTF-8'}{/if}</td>
                                {else}
                                    <td class="{$classname} comparison_infos product-{$product.id}"></td>
                                {/if}
                            {/foreach}
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td></td>
                        <td colspan="{$products|@count}" class="text-center">{l s='No features to compare' mod='wbcompare'}</td>
                    </tr>
                {/if}
                {hook h='ExtraProductComparison' list_ids_product=$list_product}
            </table>
        </div> <!-- end products_block -->
    {else}
        <p class="alert alert-warning">{l s='There are no products selected for comparison.' mod='wbcompare'}</p>
    {/if}
    <ul class="footer_link">
        <li>
            <a class="button lnk_view btn btn-default" href="{$urls.base_url}">
                <span><i class="fa fa-chevron-left left"></i>{l s='Continue Shopping' mod='wbcompare'}</span>
            </a>
        </li>
    </ul>
</section>
{/block}
