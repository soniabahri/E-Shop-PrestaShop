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
<section class="featured-products clearfix mt-3">
  <h1 class="heading text-xs-left"><span><span>
    {if $products|@count == 1}
      {l s='%s other products' sprintf=[$products|@count] d='Shop.Theme.Global'}
    {else}
      {l s='%s other products' sprintf=[$products|@count] d='Shop.Theme.Global'}
    {/if}
</span></span></h1>
  <div class="products  rless">
  <div id="owl-same" class="owl-carousel owl-theme">
      {foreach from=$products item="product"}
          {include file="catalog/_partials/miniatures/product.tpl" product=$product}
      {/foreach}
  </div>
</div>
</section>
