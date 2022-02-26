{*
* 2007-2019 PrestaShop
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
*  @copyright  2007-2019 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*
*  MODIFIED BY MYPRESTA.EU FOR PRESTASHOP 1.7 PURPOSES !
*
*}

{if Module::getInstanceByName('reviewsreply') != false}
    {if isset(Module::getInstanceByName('reviewsreply')->active)}
        {if Module::getInstanceByName('reviewsreply')->active == true}
            {if Tools::getValue('action') == 'addreply'}
                <div class="alert alert-success">
                    {if reviewsreply::updateoradd() == 1}
                        {l s='Reply for review added properly' mod='productcomments'}
                    {/if}
                </div>
            {/if}
        {/if}
    {/if}
{/if}

<div style="display:block; clear:both; margin-bottom:20px;" class="panel">
    <div class="panel-heading"><i class="icon-cogs"></i> {l s='Advertisement' mod='productcomments'}</div>
    <iframe src="//apps.facepages.eu/somestuff/onlyexample.html" width="100%" height="150" border="0" style="border:none;"></iframe>
</div>
<div class="panel">
    <div class="panel-heading"><i class="icon-cogs"></i> {l s='Extend your product comments module with' mod='productcomments'} <a href="https://mypresta.eu/" target="_blank">{l s='MyPresta.eu Modules' mod='productcomments'}</a></div>
    <ul>
        <li><a href="https://mypresta.eu/modules/advertising-and-marketing/voucher-for-product-comment.html" target="_blank">{l s='Remind customers about pending reviews' mod='productcomments'}</a></li>
        <li><a href="https://mypresta.eu/modules/advertising-and-marketing/voucher-for-product-comment.html" target="_blank">{l s='Give voucher codes for reviews' mod='productcomments'}</a></li>
        <li><a href="https://mypresta.eu/modules/administration-tools/get-notification-about-product-review.html" target="_blank">{l s='Get notifications about reviews, reports' mod='productcomments'}</a></li>
        <li><a href="https://mypresta.eu/modules/front-office-features/last-product-reviews.html" target="_blank">{l s='Last reviews carousel' mod='productcomments'}</a></li>
        <li><a href="https://mypresta.eu/modules/administration-tools/add-reply-to-product-review.html" target="_blank">{l s='Add reply to comment' mod='productcomments'}</a></li>
        <li><a href="https://mypresta.eu/modules/seo/product-comments-reviews-rich-snippet.html" target="_blank">{l s='Reviews Rich Snippets' mod='productcomments'}</a></li>
    </ul>
</div>