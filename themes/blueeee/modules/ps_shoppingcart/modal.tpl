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
<div id="blockcart-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     
        <h4 class="modal-title h6 text-xs-left" id="myModalLabel">{l s='Product successfully added to your shopping cart' d='Shop.Theme.Checkout'}</h4>
     
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 divide-right">
            <div class="">
              <div class="col-sm-4 col-xs-12">
                <img class="product-image img-responsive center-block" src="{$product.cover.large.url}" alt="{$product.cover.legend}" title="{$product.cover.legend}" itemprop="image">
              </div>
              <div class="col-sm-8 col-xs-12 lc">
                <h6 class="h6 product-name">{$product.name}</h6>
                <div class="modprice">
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
                </div>
                {hook h='displayProductPriceBlock' product=$product type="unit_price"}
                {foreach from=$product.attributes item="property_value" key="property"}
                  <span><strong>{$property}</strong>: {$property_value}</span><br>
                {/foreach}
                <span><strong>{l s='Qty:' d='Shop.Theme.Checkout'}</strong>&nbsp;{$product.cart_quantity}</span>
              </div>
            </div>
          </div>
        </div>
        <hr class="mhr">
        <div class="col-xs-12 cart-content">
            <div>
              {if $cart.products_count > 1}
                <span class="cart-products-count"><i class="fa fa-shopping-bag"></i> {l s='There are %products_count% items in your cart.' sprintf=['%products_count%' => $cart.products_count] d='Shop.Theme.Checkout'}</span>
              {else}
                <span class="cart-products-count">{l s='There is %product_count% item in your cart.' sprintf=['%product_count%' =>$cart.products_count] d='Shop.Theme.Checkout'}</span>
              {/if}
              <p><strong>{l s='Total products:' d='Shop.Theme.Checkout'}</strong><span class="float-xs-right">{$cart.subtotals.products.value}</span></p>
              <p><strong>{l s='Total shipping:' d='Shop.Theme.Checkout'}</strong><span class="float-xs-right">{$cart.subtotals.shipping.value}{hook h='displayCheckoutSubtotalDetails' subtotal=$cart.subtotals.shipping}</span></p>
              {if $cart.subtotals.tax}
                <p><strong>{$cart.subtotals.tax.label}</strong><span class="float-xs-right">{$cart.subtotals.tax.value}</span></p>
              {/if}
              <p><strong>{l s='Total:' d='Shop.Theme.Checkout'}</strong><span class="float-xs-right">{$cart.totals.total.value} {$cart.labels.tax_short}</span></p>
              <div class="cart-content-btn">
                <button type="button" class="btn btn-primary" data-dismiss="modal">{l s='Continue' d='Shop.Theme.Actions'}</button>&nbsp;&nbsp;
                <a href="{$cart_url}" class="btn btn-primary">{l s='checkout' d='Shop.Theme.Actions'}</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>