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
*  @author    Codespot SA <support@presthemes.com>
*  @copyright 2017-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<form class="form-horizontal" action="{$postAction|escape:'html':'UTF-8'}" method="POST" enctype="multipart/form-data">
<div class="panel">
	<h3>
		<i class="icon-cogs"></i> {l s='Settings style' mod='wbthemeconfigurator'}
	</h3>
	<div class="form-group">
		<label for="box_mode" class="control-label col-lg-3 ">
			{l s='Box mode' mod='wbthemeconfigurator'}
		</label>
		<div class="col-lg-9">
			<div class="row">
				<div class="input-group col-lg-2">
					<span class="switch prestashop-switch">
						<input type="radio" name="box_mode" id="box_mode_on" value="1" {if isset($options.box_mode) && $options.box_mode == 1} checked="checked" {/if}>
						<label for="box_mode_on">Yes</label>
						<input type="radio" name="box_mode" id="box_mode_off" value="0" {if isset($options.box_mode) && $options.box_mode == 0} checked="checked" {/if}>
						<label for="box_mode_off">No</label>
						<a class="slide-button btn"></a>
					</span>
				</div>
			</div>
		</div>
	</div>	
	<div class="form-group">
		<label for="cpanel" class="control-label col-lg-3 ">
			{l s='Show Demo Frontend' mod='wbthemeconfigurator'}
		</label>
		<div class="col-lg-9">
			<div class="row">
				<div class="input-group col-lg-2">
					<span class="switch prestashop-switch">
						<input type="radio" name="cpanel" id="cpanel_on" value="1" {if isset($options.cpanel) && $options.cpanel == 1} checked="checked" {/if}>
						<label for="cpanel_on">Yes</label>
						<input type="radio" name="cpanel" id="cpanel_off" value="0" {if isset($options.cpanel) && $options.cpanel == 0} checked="checked" {/if}>
						<label for="cpanel_off">No</label>
						<a class="slide-button btn"></a>
					</span>
				</div>
			</div>
		</div>
	</div>
		
	{if $bg_colors != ''}<h3>{l s='Color' mod='wbthemeconfigurator'}</h3>{/if}
	{foreach from=$bg_colors item=list key=name}
	{assign var=bg_color  value=color_|cat:$name}		
	<div class="form-group">
	<label class="control-label col-lg-3">{$list.text|escape:'html':'UTF-8'}</label>
	<div class="col-lg-9">
		<div class="col-lg-5">
			<div class="input-group {$bg_color|escape:'html':'UTF-8'}">
				<input id="result_{$name|escape:'html':'UTF-8'}_color" type="text" name="color_{$name|escape:'html':'UTF-8'}" value="{if isset($options.$bg_color) &&  $options.$bg_color != ''}{$options.$bg_color|escape:'html':'UTF-8'}{else}{$list.default_val|escape:'html':'UTF-8'}{/if}" style="{if isset($options.$bg_color) &&  $options.$bg_color != ''}background-color:{$options.$bg_color|escape:'html':'UTF-8'}{else}background-color:{$list.default_val|escape:'html':'UTF-8'}{/if}"/>
				<span id="colobg_{$name|escape:'html':'UTF-8'}_color" class="input-group-btn" >
					<img src="{$smarty.const._PS_ADMIN_IMG_|escape:'html':'UTF-8'}color.png" style="cursor:pointer; margin-left:5px" />
				</span>
			</div>
			{if isset($list.note)}<p class="help-block" style="font-size:11px">{$list.note|escape:'html':'UTF-8'}</p>{/if}
			<script type="text/javascript">
				$(document).ready(function(){
					colorEvent("{$name|escape:'html':'UTF-8'}_color");
				});				
			</script>
		</div>
	</div>
	</div>
	{/foreach}
		{if $fonts != ''}<h3>{l s='Font' mod='wbthemeconfigurator'}</h3>{/if}
		{foreach from=$fonts item=list key=name}
		{assign var=font_family  value=font_family_|cat:$name}		
		<div class="form-group">
		<label class="control-label col-lg-3">{$list.text|escape:'html':'UTF-8'}</label>
		<div class="col-lg-9">
		<div class="col-lg-5">
			<select name="font_family_{$name|escape:'html':'UTF-8'}" id="font_family_{$name|escape:'html':'UTF-8'}" onchange="showResultChooseFont('font_family_{$name|escape:'html':'UTF-8'}','font_result_{$name|escape:'html':'UTF-8'}')">
				{foreach from=$font_list item = font key = k}				
					{$font|escape:'quotes':'UTF-8'}
				{/foreach}
			</select>
			{if isset($list.note)}<p class="help-block" style="font-size:11px">{$list.note|escape:'html':'UTF-8'}</p>{/if}
			<script type="text/javascript">	
				$(document).ready(function() {
					{if isset($options.$font_family) &&  $options.$font_family != ''}
						var f_m = '{$options.$font_family|escape:"html":"UTF-8"}';
						$("#font_family_{$name|escape:'html':'UTF-8'}").val(f_m);
					{else}
						$("#font_family_{$name|escape:'html':'UTF-8'}").val('');
					{/if}
				});
			</script>
		</div>
		<div class="col-lg-5"><span id="font_result_{$name|escape:'html':'UTF-8'}" {if isset($options.$font_family) &&  $options.$font_family != ''}style="font-family:{$options.$font_family|escape:'html':'UTF-8'}"{/if}>{if isset($options.$font_family) &&  $options.$font_family != ''}{$options.$font_family|escape:'html':'UTF-8'}{/if}</span></div>		
		</div>				
		</div>
		{if isset($options.$font_family) &&  $options.$font_family != ''}
		<script type="text/javascript">	
			$(document).ready(function() {
				$('head').append('<link id="link_' + '{$options.$font_family|escape:"html":"UTF-8"}' + '" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + '{$options.$font_family|escape:"html":"UTF-8"}' + '">');	
			});
		</script>
		{/if}
	{/foreach}	
	<div class="panel-footer">
		<button type="submit" value="1" id="resetSetting" name="resetSetting" class="btn btn-default pull-left" onclick="this.form.submit();">
			<i class="process-icon-reset"></i> {l s='Reset' mod='wbthemeconfigurator'}
		</button>
		<button type="submit" value="1" id="submit_color" name="{$submit_action|escape:'html':'UTF-8'}" class="btn btn-default pull-right" onclick="this.form.submit();">
			<i class="process-icon-save"></i> {l s='Save' mod='wbthemeconfigurator'}
		</button>
	</div>
</div>
</form>
<script type="text/javascript">	
	function showBackground(classActive, name)
	{
		$(".fimage").hide();
		$("#image_" + classActive + "_" + name).show("slow");
	}
	function showResultChooseFont(id,id_result)
	{
		$('link#link_' + id).remove();
		if($("#" + id).val() != "")
			$('head').append('<link id="link_' + id + '" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + $("#" + id).val() + '">');
		$("#" + id_result).html("" + $("#" + id).val() + "");
		$("#" + id_result).css("font-family","" + $("#" + id).val() + "");
	}
	function noteCustomer(thisForm)
	{
		 if (confirm("Do you really want to change the layout?") == true) {
		     thisForm.form.submit();
			return true;
		} else {
			return false;
		}
	}
</script>
