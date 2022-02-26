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
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if $wbslider.slides}
<div class="imgslider">

  <div id="owl-slider" class="owl-carousel owl-theme" data-interval="{$wbslider.speed}" data-wrap="{$wbslider.wrap}" data-pause="{$wbslider.pause}">
      {foreach from=$wbslider.slides item=slide}

      	<div class="slide">
          <a href="{$slide.url}">
            <img src="{$slide.image_url}" alt="{$slide.legend}" class="img-responsive center-block owl-item-bg"/>	
          </a>
         
          <div class="col-md-2"></div><div class="slidecap col-md-4">{$slide.description nofilter}</div>
           <!-- <div class="title-1">soul bikini top</div> -->
      </div>

      {/foreach}
  </div>
</div>

{/if}
