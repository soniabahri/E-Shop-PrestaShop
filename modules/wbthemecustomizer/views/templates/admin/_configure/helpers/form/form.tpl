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
{extends file="helpers/form/form.tpl"}

{block name="defaultForm"}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div id="wbthemecustomizer-tabs" class="col-lg-2">
                    {foreach $wbtabs as $tabTitle => $tabClass}
                        <span class="tab list-group-item" data-tab="{$tabClass}">
                            {$tabTitle}
                        </span>
                    {/foreach}
                </div>
                <div class="col-lg-10">
                    {$smarty.block.parent}
                </div>
            </div>
        </div>
    </div>
{/block}

{block name="label"}

    {if $input['name'] == "WB_bodyBackgroundColor" || $input['name'] == "WB_breadcrumbBackgroundImage"}

        <br /><br /><br />
        {$smarty.block.parent}

    {else}
        {$smarty.block.parent}
    {/if}


{/block}

{block name="input"}

    {if $input.name == "WB_bodyBackgroundImage" || $input.name == "WB_backgroundImage" || $input.name == "WB_breadcrumbBackgroundImage"}

        {if isset($fields_value[$input.name]) && $fields_value[$input.name] != ''}
            <img src="{$imagePath}{$fields_value[$input.name]}" style="width:100%;max-width:100px;"/><br />
            <a href="{$current}&{$identifier}={$form_id}&token={$token}&deleteConfig={$input.name}">
                <img src="../img/admin/delete.gif" alt="{l s='Delete' mod='wbthemecustomizer'}" /> {l s='Delete' mod='wbthemecustomizer'}
            </a>
            <small>{l s='Do not forget to save the options after deleted the image!' mod='wbthemecustomizer'}</small>
            <br /><br />
        {/if}

        {$smarty.block.parent}

    {else}

        {$smarty.block.parent}

    {/if}

{/block}