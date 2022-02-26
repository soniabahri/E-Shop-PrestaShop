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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*
* Don't forget to prefix your containers with your own identifier
* to avoid any conflicts with others containers.
*/

		
		
		


/* function addMoreResponsive(nIpadHorizontal,nIpadVertical,htmlLiH,htmlLiV,htmlMenu) 
{
	if(nIpadHorizontal>0 && nIpadVertical>0)
	{
		if($("#more_megamenu").length>0)
			$(".wb-menu-vertical .container").html(htmlMenu);

		if($(window).width() > 750 && $(window).width() <= 992)
		{	
			if($("#more_megamenu").length==0)
			{
				$('<li id="more_megamenu" class="level-1 more-menu"><a href="#"><span class="icon-plus"></span>' + text_more + '</a><ul class="menu-dropdown cat-drop-menu wb-sub-auto">' + htmlLiV + '</ul></li>').insertAfter('.wb-menu-vertical ul.menu-content li.level-1:nth-child('+nIpadVertical+')');
			}
			if($("#more_megamenu").length>0)
				for(var j=(nIpadVertical+2);j<=(vnumLiItem+1);j++)
				{
					$(".wb-menu-vertical ul.menu-content li:nth-child("+j+").level-1").remove();
					var delItem=nIpadVertical+2;
					$(".wb-menu-vertical ul.menu-content li:nth-child("+delItem+").level-1").remove();
				}
		}
		else if($(window).width() > 992 && $(window).width() <= 1199)
		{
			
			if($("#more_megamenu").length==0)
				$('<li id="more_megamenu" class="level-1 more-menu"><a href="#"><span class="icon-plus"></span>' + text_more + '</a><ul class="menu-dropdown cat-drop-menu wb-sub-auto">' + htmlLiH + '</ul></li>').insertAfter('.wb-menu-vertical ul.menu-content li.level-1:nth-child('+nIpadHorizontal+')');
			if($("#more_megamenu").length>0)
				for(var j=(nIpadHorizontal+2);j<=(vnumLiItem+1);j++)
				{
					$(".wb-menu-vertical ul.menu-content li:nth-child("+j+").level-1").remove();
					var delItem=nIpadHorizontal+2;
					$(".wb-menu-vertical ul.menu-content li:nth-child("+delItem+").level-1").remove();
				}
		}
	}
} */

$(document).ready(function()
{
	
	$(document).on('click', '.wb-menu-vertical .icon-drop-mobile', function() {
		$(this).next().toggle('slow');
		$(this).toggleClass('opened');
	});
	megamenuHorClick();
});

function addSticky(){
	//if($('#layer_cart').is(":visible"))
	//	$('.wb-menu-vertical').removeClass('wb-menu-sticky animated fadeInDown');		
	//else
	//{
		/* var hBeginSticky = $('#header').height();
		if($(this).scrollTop() > hBeginSticky){
			$('.container_wb_megamenu').addClass('wb-menu-fixtop');			
			$('.wb-menu-vertical .menu-vertical').addClass('wb-menu-top');	
		}			
					
		else{
			$('.container_wb_megamenu').removeClass('wb-menu-fixtop');
			$('.wb-menu-vertical .menu-vertical').removeClass('wb-menu-top');
		} */
			
	//}
} 

$(window).scroll(function() {
	if($(window).width() > 1006)
			addSticky();
	
});
$(window).resize(function(){
	
	/* addMoreResponsive(nIpadHorizontal,nIpadVertical,htmlLiH,htmlLiV,htmlMenu); */
	
	if($(window).width() < 1007)
	{
		$('.wb-menu-vertical').removeClass('wb-menu-sticky animated');
	}
});
function megamenuHorClick()
{
	$(document).on('click', '.wb-menu-vertical .title-menu', function() {
		$(".wb-menu-vertical .menu-vertical").toggleClass('wb-active');
		
	});
	$(document).on('click', '.wb-menu-vertical .close-menu-content span', function() {
		$(".wb-menu-vertical .menu-vertical").toggleClass('wb-active');
		
	});
	
}