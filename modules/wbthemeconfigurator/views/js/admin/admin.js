/*
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
 *  @copyright  2017-2018 PrestaShop SA
 *  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

jQuery(document).ready(function() {
	$('.button.new-item').click(function() {
		var item_container = $(this).parent().parent('.new-item');
		item_container.toggleClass('active').children('.item-container').slideToggle();
	});
	$('.button-edit').click(function() {
		var item_container = $(this).parents('.item');
		item_container.toggleClass('active').children('.item-container').slideToggle();
	});
	$('.button-close').click(function() {
		var item_container = $(this).parents('.item');
		item_container.toggleClass('active').children('.item-container').slideToggle();
	});
	$('h4.hook-title').click(function() {
		var item_container = $(this).parent('.hook-item');
		item_container.toggleClass('cs_active').children('.items').slideToggle();
	});
	
	$('.lang-flag').click(function() {
		var lang_id = (this.id).substr(5);
		$('.lang-flag').each(function () {
			$(this).removeClass('active');
		});
		$(this).addClass('active');
		$('.lang-content').each(function () {
			$(this).hide();
		});
		$('#items-'+lang_id).show();
	});	
	$('.new-lang-flag').click(function() {
		var lang_id = (this.id).substr(5);
		$('.new-lang-flag').each(function () {
			$(this).removeClass('active');
		});
		$(this).addClass('active');
		$("#lang-id").val(lang_id)
	});
});