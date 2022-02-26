{*
* 2007-2017 PrestaShop
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
*  @copyright  2007-2017 PrestaShop SA
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div class="container vidoe_hr">
  <div class="">
<div class="col-md-10 col-sm-8 img_banner">
{if $imgbanner.slides}
<div class="imgbanner">
  <div data-wrap="{$imgbanner.wrap}">
      {foreach from=$imgbanner.slides item=slide}
        <div class="">
          <div class="beffect">
          <a href="{$slide.url}">
            <img src="{$slide.image_url}" alt="{$slide.legend}" class="img-responsive center-block" />
          </a>
        </div>
        </div>
      {/foreach}
  </div>
</div>
{/if}
</div>
<div class="homevideobc col-md-3 col-sm-4">{hook h='displayTopColumn'}</div>
</div>
</div>