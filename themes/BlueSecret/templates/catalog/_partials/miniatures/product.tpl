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
{block name='product_miniature_item'}
  <article class="product-miniature js-product-miniature  cless" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
    <div class="thumbnail-container">
     <div class="wb-image-block">
   
      {block name='product_thumbnail'}
      {if $product.cover}
          <a href="{$product.url}" class="thumbnail product-thumbnail">
            <img
              class = "center-block img-responsive"
              src = "{$product.cover.bySize.home_default.url}"
              alt = "{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:30:'...'}{/if}"
              data-full-size-image-url = "{$product.cover.large.url}"
            >
           {foreach from=$product.images item=image}
           {if isset($product.images[1])}
              <img class="second-img img-responsive center-block"  
                src="{$product.images[1].bySize.home_default.url}"
                alt="{$image.legend}"
                title="{$image.legend}"
                itemprop="image"
              >
          {/if}
        {/foreach}
          </a>
        {else}
          <a href="{$product.url}" class="thumbnail product-thumbnail">
            <img
              src = "{$urls.no_picture_image.bySize.home_default.url}"
            >
          </a>
        {/if}
      {/block}

      {if $product.discount_type === 'percentage'}
        <div class="sale"><span>{$product.discount_percentage}</span></div>
      {elseif $product.discount_type === 'amount'}
        <div class="sale"><span>{$product.discount_amount_to_display}</span></div>
      {/if}

      {block name='product_flags'}
        <ul class="product-flags">
          {foreach from=$product.flags item=flag}
            <li class="product-flag {$flag.type}"><span>{$flag.label}</span></li>
          {/foreach}
        </ul>
      {/block}

      {if $product.has_discount}
        <span class="reducep">{l s='reduced price' d='Shop.Theme.Global'}</span>
      {/if}
       {block name='product_variants'}
          {if $product.main_variants}
            {include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
          {/if}
        {/block}
     
      {hook h='displayProductPriceBlock' product=$product type='weight'}

</div>
      <div class="wb-product-desc text-xs-center">
        {block name='product_name'}
          {if $page.page_name == 'index'}
            <h3 class="h3 product-title" itemprop="name"><a href="{$product.url}">{$product.name}</a></h3>
          {else}
            <h2 class="h3 product-title" itemprop="name"><a href="{$product.url}">{$product.name}</a></h2>
          {/if}
        {/block}
         {block name='product_reviews'}
          {hook h='displayProductListReviews' product=$product}
      {/block}
        {block name='product_description_short'}
          <div id="product-description-short-{$product.id}" itemprop="description" class="listds">{$product.description_short nofilter}</div>
        {/block}
        {block name='product_price_and_shipping'}
          {if $product.show_price}
            <div class="product-price-and-shipping">
              <span itemprop="price" class="price">{$product.price}</span>
              {if $product.has_discount}
                {hook h='displayProductPriceBlock' product=$product type="old_price"}
                <span class="sr-only">{l s='Regular price' d='Shop.Theme.Catalog'}</span>
                <span class="regular-price">{$product.regular_price}</span>
              {/if}
              {hook h='displayProductPriceBlock' product=$product type="before_price"}
              <span class="sr-only">{l s='Price' d='Shop.Theme.Catalog'}</span>
              {hook h='displayProductPriceBlock' product=$product type='unit_price'}
            </div>
          {/if}
        {/block}
           
            <div class="button-group highlighted-informations{if !$product.main_variants} no-variants{/if}">
                      <div class="btn-pro">
                        <div class="absbtn">
                          <div class="add-cart">
                            <form action="{Context::getContext()->link->getPageLink('cart')}" method="post">
                            <input type="hidden" name="token" value="{Tools::getToken(false)}">
                            <input type="hidden" name="id_product" value="{$product.id}">
                            <button class="cartb add-to-cart" data-button-action="add-to-cart" type="submit" {if !$product.quantity}disabled{/if}>
                              <svg width="17px" height="17px" class=""><use xlink:href="#pcart" /></svg><span>{l s='add to cart' d='Shop.Theme.Catalog'}</span><!-- <i class="material-icons">keyboard_backspace</i> -->
                            </button>
                            </form>
                          </div>
                             {hook h='displayCompareButton' product=$product} 
                             <button data-toggle="tooltip" title="Wishlist" class="wish" id="wishlist_button" onclick="WishlistCart('wishlist_block_list', 'add', '{$product.id_product|intval}', {$product.id_product_attribute}, 1); return false;">
                             <h5 class="pwish"><svg width="18px" height="17px"> <use xlink:href="#heart"></use></svg></h5>
                             <span class="pquick hidden-sm-down">{l s='wishlist' d='Shop.Theme.Catalog'}</span>
                          </button>
                          {block name='quick_view'}
                            <button type="button" data-toggle="tooltip" title="Quickview" data-link-action="quickview"  class="quick-view quick">
                              <h5 class="pquick"><svg width="18px" height="17px" class=""><use xlink:href="#bquick"/></svg></h5>
                              <span class="pquick hidden-sm-down">{l s='quick view' d='Shop.Theme.Catalog'}</span>
                            </button>
                          {/block}
                          
                      </div>
                          
                      </div>      
                    </div>
        
            <div class="button-group1 highlighted-informations{if !$product.main_variants} no-variants{/if}">
                      <div class="btn-pro">
                        <div class="absbtn">
                          <div class="add-cart">
                            <form action="{Context::getContext()->link->getPageLink('cart')}" method="post">
                            <input type="hidden" name="token" value="{Tools::getToken(false)}">
                            <input type="hidden" name="id_product" value="{$product.id}">
                            <button class="cartb add-to-cart" data-button-action="add-to-cart" type="submit" {if !$product.quantity}disabled{/if}>
                              <svg width="17px" height="17px" class=""><use xlink:href="#pcart" /></svg><!-- <span>{l s='add to cart' d='Shop.Theme.Catalog'}</span><i class="material-icons">keyboard_backspace</i> -->
                            </button>
                            </form>
                          </div>
                             {hook h='displayCompareButton' product=$product} 
                             <button data-toggle="tooltip" title="Wishlist" class="wish" id="wishlist_button" onclick="WishlistCart('wishlist_block_list', 'add', '{$product.id_product|intval}', {$product.id_product_attribute}, 1); return false;">
                             <h5 class="pwish"><svg width="18px" height="17px"> <use xlink:href="#heart"></use></svg></h5>
                             <!-- <span class="pquick hidden-sm-down">{l s='wishlist' d='Shop.Theme.Catalog'}</span> -->
                          </button>
                          {block name='quick_view'}
                            <button type="button" data-toggle="tooltip" title="Quickview" data-link-action="quickview"  class="quick-view quick">
                              <h5 class="pquick"><svg width="18px" height="17px" class=""><use xlink:href="#bquick"/></svg></h5>
                              <!-- <span class="pquick hidden-sm-down">{l s='quick view' d='Shop.Theme.Catalog'}</span> -->
                            </button>
                          {/block}
                          
                      </div>
                          
                      </div>      
                    </div>
      </div>
    </div>
  </article>
{/block}
