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
*  @copyright 2017-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{extends file="helpers/form/form.tpl"}
{block name="input"}
    {if $input.type == 'background_main'}
		ddd
	{elseif $input.type == 'main_color'}
		<div class="col-lg-6">
			<input id="" name="" type="text"/>
		</div>
		<div class="col-lg-2">
			<span id="animation_colobg" style="cursor:pointer">
				<img src="/ps_alpha/presta_1603/img/admin/color.png">
			</span>
		</div>
	{else}
		{$smarty.block.parent}
    {/if}
{/block}
