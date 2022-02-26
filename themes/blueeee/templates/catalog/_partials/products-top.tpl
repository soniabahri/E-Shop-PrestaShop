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
<div id="js-product-list-top" class="products-selection row">
    <div class="col-md-3 col-lg-2 col-xs-12 col-xl-2 col-sm-3 lgrid text-xs-left">
  <div class="wb-grid-list display">
    <span id="wbgrid" class="active selected"><svg width="18px" height="18px"><use xlink:href="#cgrid"></use> </svg></span>
    <span id="wblist"><svg width="20px" height="20px"><use xlink:href="#clist"></use> </svg></span>
  </div>

  </div>
     <div class="col-md-4 col-lg-3 col-xl-4 hidden-lg-down total-products text-xs-right">
    {if $listing.pagination.total_items > 1}
      <p>{l s='There are %product_count% products.' d='Shop.Theme.Catalog' sprintf=['%product_count%' => $listing.pagination.total_items]}</p>
    {else if $listing.pagination.total_items > 0}
      <p>{l s='There is 1 product.' d='Shop.Theme.Catalog'}</p>
    {/if}
  </div>
  <div class="col-md-9 col-lg-7 col-xl-6 col-xs-12 col-sm-9 sro">
    <div class="row sort-by-row">
      {if !empty($listing.rendered_facets)}
        <div class="col-sm-3 col-xs-4 hidden-md-up filter-button">
          <button id="search_filter_toggler" class="btn btn-primary">
            {l s='Filter' d='Shop.Theme.Actions'}
          </button>
        </div>
      {/if}

      {block name='sort_by'}
        {include file='catalog/_partials/sort-orders.tpl' sort_orders=$listing.sort_orders}
      {/block}

    </div>
  </div>

  <div class="col-sm-12 hidden-md-up text-xs-center showing hidden-sm-down">
    {l s='Showing %from%-%to% of %total% item(s)' d='Shop.Theme.Catalog' sprintf=[
    '%from%' => $listing.pagination.items_shown_from ,
    '%to%' => $listing.pagination.items_shown_to,
    '%total%' => $listing.pagination.total_items
    ]}
  </div>
</div>