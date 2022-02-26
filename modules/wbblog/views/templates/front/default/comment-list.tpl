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
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div class="comments_area" id="comments">
    <h2 class="comments_title">
        {l s='All comments' mod='wbblog'}
    </h2>
    <div class="commlist">
    <ul class="comment_list">
		{foreach from=$wbblog_commets item=wbblog_commet}
        <li class="comment" id="comment_{$wbblog_commet.id_wb_comments}">
            <article class="comment_body">
				{* <div class="comment_author vcard">
				    <img alt="" class="wbblog_img avatar avatar-70 photo" height="70" src="http://2.gravatar.com/avatar/597a1e6b0dfdf57f53ef8fb80fa190d7?s=70&d=mm&r=g" width="70">
				</div> *}
				<div class="comment_content">
					<div class="comment_meta">
					    <div class="comment_meta_author">
					    	<i class="fa fa-user"></i><span class="fn">{$wbblog_commet.name}</span>
					    </div>
					    <div class="comment_meta_date">
					    	<i class="fa fa-calendar"></i>
					    	<span><time datetime="2016-03-07T04:33:23+00:00">
					    	    {$wbblog_commet.created|date_format:"%e %B, %Y"}
					    	</time></span>
					    </div>
					    <div class="reply">
					        <a aria-label="Reply to raihan@sntbd.com" class="comment-reply-link" href="#" onclick='return addComment.moveForm( "div-comment-3", "3", "respond", "38" )' rel="nofollow">
					            Reply
					        </a>
					    </div>
					</div>
					<div class="comment_content_bottom">
						<i class="fa fa-comments float-xs-left"></i>
						<div class="wco">{$wbblog_commet.content}</div>
					</div>
				</div>
            </article>
        </li>
		{/foreach}
    </ul>
</div>
</div>