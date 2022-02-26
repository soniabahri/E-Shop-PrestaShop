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

<div id="_desktop_cart" class="d-inline-block hidden-sm-down">
  <div class="dropdown js-dropdown">
  <div class="blockcart cart-preview {if $cart.products_count > 0}active{else}inactive{/if}" data-refresh-url="{$refresh_url}">
    <div class="header">
      <div class="" data-toggle="dropdown">
        <div class="hcart d-inline-block"><svg width="25px" height="25px"><use xlink:href="#hcart"></use></svg><span class="cart-products-count cart-c d-inline-block">{$cart.products_count}</span></div>
          
      </div>
            <ul class="dropdown-menu dropdown-menu-right head-cart-drop">
            {block name='cart_detailed_product'}
                <li class="cart-det" data-refresh-url="{url entity='cart' params=['ajax' => true, 'action' => 'refresh']}">
                {if $cart.products}
                <ul class="cart-drop-table">
                    {foreach from=$cart.products item=product}
                    <div class="cart-down">
                    <!--  image-->
                        <li class="cart-img d-inline-block">
                            <img class="" src="{$product.cover.bySize.cart_default.url}" alt="{$product.name|escape:'quotes'}">
                        </li>
                        <div class="qtyp d-inline-block">
                    <!--  name -->
                        <li  class="cart-name">
                            <a class="label name-cart2" href="{$product.url}" data-id_customization="{$product.id_customization|intval}">{$product.name}</a>
                        </li>
                        <!--  qty -->
                        <li>
                            <span>{$product.quantity}</span>
                    <!-- price -->
                         {if isset($product.is_gift) && $product.is_gift}
                            <span>{l s='Gift' d='Shop.Theme.Checkout'}</span>
                        {else}
                            <span>{$product.total}</span>
                        {/if}
                        </li>
                        </div>
                    <!-- delete -->
                        <li class="float-xs-right cartclose">
                        <a  class                   = "remove-from-cart"
                        rel                         = "nofollow"
                        href                        = "{$product.remove_from_cart_url}"
                        data-link-action            = "delete-from-cart"
                        data-id-product             = "{$product.id_product|escape:'javascript'}"
                        data-id-product-attribute   = "{$product.id_product_attribute|escape:'javascript'}"
                        data-id-customization       = "{$product.id_customization|escape:'javascript'}" >
                            {if !isset($product.is_gift) || !$product.is_gift}
                                <i class="fa fa-close"></i>
                            {/if}
                        </a>
                        </li>
                    <!-- total -->
                </div>
                   {if $product.customizations|count >1}<hr>{/if}
                    {/foreach}
                </ul>
                <hr>
                <table class="cdroptable">
                    <tbody>
                        <tr>
                            <td class="text-xs-left">{l s='Total products:' d='Shop.Theme.Checkout'}</td>
                            <td class="text-xs-right">{$cart.subtotals.products.value}</td>
                        </tr>
                        <tr>
                            <td class="text-xs-left">{l s='Total shipping:' d='Shop.Theme.Checkout'}</td>
                            <td class="text-xs-right">{$cart.subtotals.shipping.value} {hook h='displayCheckoutSubtotalDetails' subtotal=$cart.subtotals.shipping}</td>
                        </tr>
                        <tr>
                            <td class="text-xs-left">{l s='Total:' d='Shop.Theme.Checkout'}</td>
                            <td class="text-xs-right">{$cart.totals.total.value} {$cart.labels.tax_short}</td>
                        </tr>
                    </tbody>
                </table>
              <!-- checkout -->    
               <!--    <button type="button">{l s='Continue shopping' d='Shop.Theme.Actions'}</button> -->
                  <a href="{$cart_url}" class="btn btn-primary btn-block float-xs-right">{l s='checkout' d='Shop.Theme.Actions'}</a>
                {else}
                  <p class="no-items">{l s='Your cart is empty!' d='Shop.Theme.Checkout'}</p>
                {/if}<div class="clearfix"></div>
              </li>
            {/block}
            </ul>
    </div>
  </div>
</div>
</div>
<div class="setting dropdown js-dropdown d-inline-block hidden-sm-down">
<div data-toggle="dropdown" class="set">
  <svg width="21px" height="20px"> <use xlink:href="#setting"></use></svg>
</div>
<ul class="dropdown-menu dropdown-menu-right se-do text-xs-left" style="display: none;">
  {hook h='displayNav2'}
</ul>
</div>