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

$(document).ready(function() {

    function add_backgroundcolor(bgcolor) {
	$('<style type="text/css"> .block_newsletter form input.btn-primary,.blog_post .blog_post_content_bottom .read_more,.pro-tab ul li a:hover, .pro-tab ul li a.active,#wb_cat_carousel .catf h2 span::before,.catright h1 span,.owl-theme .owl-nav [class*="owl-"]:hover,.cart-c,.thumbnail-container .product-flags .new,#search_block_top .btn.button-search,.slideshow-panel .owl-theme .owl-nav .owl-prev,.slideshow-panel .owl-theme .owl-nav .owl-next,.blog_mask .icon,#scroll,.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span,.wb-wishlist-product .cartb, .wb-productscompare-item .cartb,.custom-radio input[type="radio"]:checked + span,.custom-checkbox input[type="checkbox"] + span .checkbox-checked,button.usefulness_btn:hover,.product-tab .nav-tabs .nav-item a.active::before,.scroll-box-arrows i:hover,.pagination .page-list li a,.quickview .arrows .arrow-up:hover, .quickview .arrows .arrow-down:hover,.block-social li a:hover,.view-wb-dropdown-additional.show, .view-wb-dropdown-additional:hover,.btn-primary{ background:#' + bgcolor + '}</style>').appendTo('head');
	$('<style type="text/css"> .thumbnail-container .button-group .wb-compare-button:hover, .thumbnail-container .button-group .quick:hover, .thumbnail-container .button-group .wish:hover,.hcom .bt_compare:hover,.thumbnail-container .button-group .cartb:hover,.slidecap h5 a,.deliveryinfo ul:hover li h4,.pro-tab ul li a:hover, .pro-tab ul li a.active,.blogcount span,.bannercap h2 strong,.wb-menu-vertical li.level-1 > a:hover::after, .wb-menu-vertical li.level-1 > a:focus::after,#owl-image-slider .slick-dots li.slick-active a,.catright a,.hcart,.product-title a:hover,.currency-selector li.current a,.vedio-bg h1,#products .wbpc-main .seconds .count,.pro-tab ul li a.active,.parallex .item h2,.pro-tab li a.active,.wb-menu-vertical li.level-1 > a:hover, .view_more a:hover,.wb-menu-vertical ul li.level-1:hover > a,.page-my-account #content .links a:hover i,.wb-compare-wishlist-button .wish:hover span, .wb-compare-wishlist-button .wish:focus span, .wb-compare-wishlist-button .wb-compare-button:hover span, .wb-compare-wishlist-button .wb-compare-button:focus span,.product-tab .nav-tabs .nav-link.active,.js-terms a,.facet-title,a:hover, a:focus, button:focus,.footer-container li a:hover, .fthr .block:hover, .fthr .data a:hover, .foot-payment li i:hover,.product-title:hover{ color:#' + bgcolor + '}</style>').appendTo('head');
	$('<style type="text/css"> #index .blog_post:hover .blog_post_content_bottom,#owl-slider.owl-theme .owl-dots .owl-dot.active span, #owl-slider.owl-theme .owl-dots .owl-dot:hover span,.bannercap::before,.owl-theme .owl-nav [class*="owl-"]:hover,.wb-menu-vertical li.level-1 span:hover::after,.language-selector li.current .lang-flag,.timg,.quickview .arrows .arrow-up:hover, .quickview .arrows .arrow-down:hover,.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span,.scroll-box-arrows i:hover,.form-control:focus{ border-color:#' + bgcolor + '}</style>').appendTo('head');
	$('<style type="text/css">.heading span hr,#blog .read_more:hover hr{ border-top-color:#' + bgcolor + '}</style>').appendTo('head');
	$('<style type="text/css"> #owl-slider.owl-theme .owl-dots .owl-dot.active span::after,.catright a,.wb-menu-vertical .menu-dropdown,.view_menu .more-menu{ border-bottom-color:#' + bgcolor + '}</style>').appendTo('head');
	$('<style type="text/css">{ border-right-color:#' + bgcolor + '}</style>').appendTo('head');
	$('<style type="text/css"> .wishl:hover svg, .hcom .bt_compare:hover svg,.thumbnail-container .button-group1 .cartb:hover svg,.thumbnail-container .button-group1 .wb-compare-button:hover svg, .thumbnail-container .button-group1 .quick:hover svg, .thumbnail-container .button-group1 .wish:hover svg,.thumbnail-container .button-group .wb-compare-button:hover svg, .thumbnail-container .button-group .quick:hover svg, .thumbnail-container .button-group .wish:hover svg,.thumbnail-container .button-group .cartb:hover svg,.block_newsletter svg,.parallex .item svg,.deliveryinfo ul:hover svg,#footer_contact .icon svg,.wb-compare-wishlist-button .wish:hover svg, .wb-compare-wishlist-button .wish:focus svg, .wb-compare-wishlist-button .wb-compare-button:hover svg, .wb-compare-wishlist-button .wb-compare-button:focus svg,.user-info:hover svg, .blockcart:hover svg, .d-search:hover svg, .setting .set:hover svg{ fill:#' + bgcolor + '}</style>').appendTo('head');

	$('<style type="text/css"> .testiblock::before{background: #' + bgcolor + ';}</style>').appendTo('head');
	if ($(window).width() <= 991){
        $('<style type="text/css">{ background:#' + bgcolor + '}</style>').appendTo('head');
        $('<style type="text/css">{ border-color:#' + bgcolor + '}</style>').appendTo('head');
    }
    if ($(window).width() >= 768){
        $('<style type="text/css">{ background:#' + bgcolor + '}</style>').appendTo('head');
        $('<style type="text/css">{ border-color:#' + bgcolor + '}</style>').appendTo('head');
    } 
    if ($(window).width() >= 992){
        $('<style type="text/css">{ color:#' + bgcolor + '}</style>').appendTo('head');
    } 
    }
    function add_hovercolor(hcolor) {
	$('<style type="text/css">{ background-color:#' + hcolor + '}</style>').appendTo('head');
	$('<style type="text/css">{ background:#' + hcolor + '}</style>').appendTo('head');
	$('<style type="text/css">{ color:#' + hcolor + '}</style>').appendTo('head');
	$('<style type="text/css">{ fill:#' + hcolor + '}</style>').appendTo('head');
    }
    
    $('.control').click(function() {

	if ($(this).hasClass('inactive')) {
	    $(this).removeClass('inactive');
	    $(this).addClass('active');
	    if (LANG_RTL == '1') {
		$('.wb-demo-wrap').animate({left: '0'}, 500);
	    } else {
		$('.wb-demo-wrap').animate({right: '0'}, 500);
	    }
	    $('.wb-demo-wrap').css({'box-shadow': '0 0 10px #adadad', 'background': '#fff'});
	    $('.wb-demo-option').animate({'opacity': '1'}, 500);
	    $('.wb-demo-title').animate({'opacity': '1'}, 500);
	} else {
	    $(this).removeClass('active');
	    $(this).addClass('inactive');
	    if (LANG_RTL == '1') {
		$('.wb-demo-wrap').animate({left: '-200px'}, 500);
	    } else {
		$('.wb-demo-wrap').animate({right: '-200px'}, 500);
	    }
	    $('.wb-demo-wrap').css({'box-shadow': 'none', 'background': 'transparent'});
	    $('.wb-demo-option').animate({'opacity': '0'}, 500);
	    $('.wb-demo-title').animate({'opacity': '0'}, 500);
	}
    });
    $('#backgroundColor, #hoverColor').each(function() {
	var $el = $(this);
	/* set time */var date = new Date();
	date.setTime(date.getTime() + (1440 * 60 * 1000));
	$el.ColorPicker({color: '#555555', onChange: function(hsb, hex, rgb) {
		$el.find('div').css('backgroundColor', '#' + hex);
		switch ($el.attr("id")) {
		    case 'backgroundColor' :
			add_backgroundcolor(hex);
			$.cookie('background_color_cookie', hex, {expires: date});
			break;
		    case 'hoverColor' :
			add_hovercolor(hex);
			$.cookie('hover_color_cookie', hex, {expires: date});
			break;
		    }
	    }});
    });
    /* set time */var date = new Date();
    date.setTime(date.getTime() + (1440 * 60 * 1000));
    if ($.cookie('background_color_cookie') && $.cookie('hover_color_cookie')) {
	add_backgroundcolor($.cookie('background_color_cookie'));
	add_hovercolor($.cookie('hover_color_cookie'));
	var backgr = "#" + $.cookie('background_color_cookie');
	var activegr = "#" + $.cookie('hover_color_cookie');
	$('#backgroundColor div').css({'background-color': backgr});
	$('#hoverColor div').css({'background-color': activegr});
    }
    /*Theme mode layout*/
    if (!$.cookie('mode_css') && WB_mainLayout == "boxed"){
	$('input[name=mode_css][value=box]').attr("checked", true);
    } else if (!$.cookie('mode_css') && WB_mainLayout == "fullwidth") {
	$('input[name=mode_css][value=wide]').attr("checked", true);
    } else if ($.cookie('mode_css') == "boxed") {
	$('body').removeClass('fullwidth');
	$('body').removeClass('boxed');
	$('body').addClass('boxed');
	$.cookie('mode_css', 'boxed');
	$.cookie('mode_css_input', 'box');
	$('input[name=mode_css][value=box]').attr("checked", true);
    } else if ($.cookie('mode_css') == "fullwidth") {
	$('body').removeClass('fullwidth');
	$('body').removeClass('boxed');
	$('body').addClass('fullwidth');
	$.cookie('mode_css', 'fullwidth');
	$.cookie('mode_css_input', 'wide');
	$('input[name=mode_css][value=wide]').attr("checked", true);
    }
    $('input[name=mode_css][value=box]').click(function() {
	$('body').removeClass('fullwidth');
	$('body').removeClass('boxed');
	$('body').addClass('boxed');
	$.cookie('mode_css', 'boxed');
        fullwidth_click();
    });
    $('input[name=mode_css][value=wide]').click(function() {
	$('body').removeClass('fullwidth');
	$('body').removeClass('boxed');
	$('body').addClass('fullwidth');
	$.cookie('mode_css', 'fullwidth');
        fullwidth_click();
    });
    $('.cl-td-layout a').click(function() {
	var id_color = this.id;
	$.cookie('background_color_cookie', id_color.substring(0, 6));
	$.cookie('hover_color_cookie', id_color.substring(7, 13));
	add_backgroundcolor($.cookie('background_color_cookie'));
	add_hovercolor($.cookie('hover_color_cookie'));
	var backgr = "#" + $.cookie('background_color_cookie');
	var activegr = "#" + $.cookie('hover_color_cookie');
	$('#backgroundColor div').css({'background-color': backgr});
	$('#hoverColor div').css({'background-color': activegr});
    });
    /*reset button*/$('.cl-reset').click(function() {
	/* Color */$.cookie('background_color_cookie', '');
	$.cookie('hover_color_cookie', '');
	/* Mode layout */$.cookie('mode_css', '');
	location.reload();
    });
    function fullwidth_click(){
        $('.wbFullWidth').each(function() {
                var t = $(this);
                var fullwidth = $('main').width(),
                    margin_full = fullwidth/2;
        if (LANG_RTL != 1) {
                t.css({'left': '50%', 'position': 'relative', 'width': fullwidth, 'margin-left': -margin_full});
        } else{
                t.css({'right': '50%', 'position': 'relative', 'width': fullwidth, 'margin-right': -margin_full});
        }
    });
    }
});