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
<div class="product-tab-item container">
        <div class="pro-tab tabs text-xs-left">
          <h1 class="heading text-xs-left"><span><span>{l s='latest products' d='Shop.Theme.Catalog'}</span></span></h1>
            <ul class="list-inline nav nav-tabs text-xs-right">
                <li class="nav-item"><a class="nav-link active" href="#tab-fea-0"  data-toggle="tab">{l s='featured' d='Shop.Theme.Catalog'}</a>
                </li><li class="nav-item center"><a class="nav-link" href="#tab-new-0"  data-toggle="tab">{l s='latest' d='Shop.Theme.Catalog'}</a>
                </li><li class="nav-item"><a class="nav-link" href="#tab-best-0"  data-toggle="tab">{l s='bestseller' d='Shop.Theme.Catalog'}</a>
                </li>
            </ul>
        </div>
<div class="tab-content tab-pro" id="tab-content">
<section id="tab-fea-0" class="tab-pane active clearfix fadeIn animated">
  <div class="products  rless">
  <div id="owl-fea" class="owl-carousel owl-theme"> 
      {foreach from=$products item="product"}
        {include file="catalog/_partials/miniatures/product.tpl" product=$product}
      {/foreach}
  </div>
</div>
</section>