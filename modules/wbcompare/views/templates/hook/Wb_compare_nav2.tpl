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
{if $comparator_max_item}
<li class="hcom">
	<form method="post" action="{$link->getModuleLink('wbcompare', 'WbCompareProduct')|escape:'html':'UTF-8'}" class="compare-form">
		<button type="submit" class="bt_compare" disabled="disabled">
			<span class="wcom"><svg width="15px" height="14px"> <use xlink:href="#hcom"></use></svg>{l s='Compare' mod='wbcompare'}</span>
			<!-- <span class="wcom">{l s='Compare' mod='wbcompare'} {* (<strong class="total-compare-val">{$count_product}</strong>)<i class="icon-chevron-right right"></i> *}</span> -->
		</button>
		<input type="hidden" name="compare_product_count" class="compare_product_count" value="{$count_product}" />
		<input type="hidden" name="compare_product_list" class="compare_product_list" value="" />
	</form>
</li>
{/if}