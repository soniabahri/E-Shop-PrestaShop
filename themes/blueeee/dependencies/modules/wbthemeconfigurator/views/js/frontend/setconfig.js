/**
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
*/

function showResultChooseFont(id,classE)
{
	if($("#" + id).val() != "")
	{
		$('head').append('<link id="link_' + id + '" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + $("#" + id).val() + '">');
		$.cookie(''+ id +'',$("#" + id).val());
		$('' + classE + '').css('font-family',$.cookie(id));
	}
}
function changeOptionColumn(column)
{
	$('div.option_columns div').hide();
	$('div.' + column + '').show();
}
function get_cookies_array() {
	var cookies_list = { };
    if (document.cookie && document.cookie != '') {
    var split = document.cookie.split(';');
        for (var i = 0; i < split.length; i++) {
            var name_value = split[i].split("=");
            name_value[0] = name_value[0].replace(/^ /, '');
            cookies_list[decodeURIComponent(name_value[0])] = decodeURIComponent(name_value[1]);
        }
    }
    return cookies_list;
}
 
jQuery(document).ready(function($) {
	/*hide on ipad, iphone*/
	if(isMobileIpad() || ($.browser.msie && parseInt($.browser.version)==8))
		{
			$('#demo_frontend').hide();
		}
	$('input[name=color_template]').click(function(){
			clearCookie();
			$.cookie('color_template',$(this).val());
			$.ajax({
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			url: baseDir + 'modules/wtthemeconfigurator/color_ajax.php' + '?rand=' + new Date().getTime(),
			data: 'reset=0&color_template='+ $(this).val(),
			success: function(msg)
			{
				location.reload(true);
			}
		});
	});			
	$('input[value=' + $.cookie('color_template') + ']').attr('checked', 'true');
	
	var styleTextbox = '<style id="setconfig">.box-mode #page{	width: 1200px;   box-shadow: 0 0 8px #666666;    margin: 0 auto;}@media only screen and (min-width: 1024px) and (max-width: 1279px) {	#page{	width: 960px;}}@media only screen and (max-width: 1023px){#page{margin:0 auto;border-radius:0;box-shadow: 0 0 0 #fff;}}@media only screen and (min-width: 768px) and (max-width: 1023px) {	#page {width: 768px;}}@media only screen and (max-width: 767px){#page{width:100%;}}</style>';
	if($.cookie('mode_css'))
	{
		if($.cookie('mode_css') == '1200px')
		{
			$('#page').css('width','');
			$('body').append(styleTextbox);
		}
		else
		{
			$('body style#setconfig').remove();
			$("#page").css('width',$.cookie('mode_css'));
		}
	}
	$('input[name=mode_css][value=box]').click(function(){
			$('#page').css('width','');
			if ( !$("link#setconfig").length ) {
				$('body').append(styleTextbox);
			}
			$('body').addClass('box-mode');
			$.cookie('mode_css', '1200px');
			$.cookie('mode_css_input', 'box');
	});	
	$('input[name=mode_css][value=wide]').click(function(){
			$('#page').css('width','100%');
			$('body style#setconfig').remove();
			$.cookie('mode_css', '100%');
			$.cookie('mode_css_input', 'wide');
			$('body').removeClass('box-mode');
	});		
	$("#wt_reset").click(function() {
		var cookies = get_cookies_array();
		for(var name in cookies){			
			if(name != 'display' && name!= 'display_class')
				$.cookie(name,null);
		}
		$('input[name=color_template]').attr("checked",false);
		$('input[name=mode_css]').attr("checked",false);
		$(".pattern_item").removeClass("active");
		
		$.ajax({
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			url: baseDir + 'modules/wtthemeconfigurator/color_ajax.php' + '?rand=' + new Date().getTime(),
			data: 'reset=1',
			success: function(msg)
			{
				location.reload(true);
			}
		});
	});
	$('#demo_container .head').click(function(e){
		e.preventDefault();

		 $(this).closest('li').find('.demo_content').slideToggle(function() {
			if ($(this).closest('li').find('.demo_content').is(':hidden'))
			{
				$(this).closest('li').find('.demo_content').hide();
			}
			else
			{
				$('#demo_container .demo_content').hide();
				$(this).closest('li').find('.demo_content').show();
			}
		});     
	});
	
	if($.cookie('cookie_bg_pattern')) {
		$('body').css('background-image', 'url("' + $.cookie('cookie_bg_pattern') + '")');
		$('body').css('background-repeat', 'repeat');
	}
});

function  clearCookie()
{
	var cookie_list = get_cookies_array();
		for(var name in cookie_list) 
		{
			if(name != 'display' && name!= 'display_class')
				$.cookie(name,null);
		}
		$(".pattern_item").removeClass("active");
	
}
