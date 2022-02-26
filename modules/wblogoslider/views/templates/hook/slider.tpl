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

<div class="logos col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="">
    {if $logoslider.slides}
      <div id="owl-logo" class="owl-carousel logo-slider" data-interval="{$logoslider.speed}" data-wrap="{$logoslider.wrap}" data-pause="{$logoslider.pause}">
          {$num_row=2} <!-- Number of Row Ex 2,3,4,5....etc-->
          {$i=0}
          {if count($logoslider.slides) <= 2}
            {foreach from=$logoslider.slides item=slide}
                <a href="{$slide.url}">
                  <img src="{$slide.image_url}" alt="{$slide.legend}"  class="img-responsive center-block"/>
                </a>
            {/foreach}
             {else}
              {foreach from=$logoslider.slides item=slide}
              {if $i == 0}
                <ul>
                  <li>
              {/if}
                <a href="{$slide.url}">
                  <img src="{$slide.image_url}" alt="{$slide.legend}"  class="img-responsive center-block"/>
                </a>
                {$i=$i+1}
              {if $i == $num_row}
                  </li>
                </ul>
                {$i=0}
              {/if}
            {/foreach}
            {/if}
        </div>
    {/if}
    </div>
</div>
</div>
</div>