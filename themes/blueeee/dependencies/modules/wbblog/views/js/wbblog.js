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
*  @copyright  2007-2018 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

jQuery(document).ready(function($){
// home wb blog block mod
var selectSlider = $('.home_blog_post_area');
if (!!$.prototype.slick)
selectSlider.find('.home_blog_post_inner.carousel').slick({
	infinite: true,
	dots: false,
	autoplay: false,
	infinite: false,
	slide: '.blog_post',
	slidesToShow : 3,
	slidesToScroll : 1,
	arrows: false,
	responsive:[
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				// slidesToShow : prd_per_column,
			}
		},
		{
			breakpoint: 993,
			settings: {
				slidesToShow: 3,
				// slidesToShow : prd_per_column_tab,
			}
		},
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2,
				// slidesToShow : prd_per_column_tab,
			}
		},
		{
			breakpoint: 641,
			settings: {
				slidesToShow: 2,
				// slidesToShow : prd_per_column_tab,
			}
		},
		{
			breakpoint: 481,
			settings: {
				slidesToShow: 1,
				// slidesToShow : prd_per_column_mob,
			}
		}
	]
});
// blog post format carousel
var selectSlider = $('.post_thumbnail');
if (!!$.prototype.slick)
selectSlider.find('.post_format_items.carousel').slick({
	infinite: true,
	dots: false,
	autoplay: false,
	slide: '.item',
	slidesToShow : 1,
	slidesToScroll : 1,
	arrows: true,
	prevArrow : '<i class="fa fa-angle-left slick-arrow"></i>',
	nextArrow : '<i class="fa fa-angle-right slick-arrow"></i>',
});
}); // doc ready