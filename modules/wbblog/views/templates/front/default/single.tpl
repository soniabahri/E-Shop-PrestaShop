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
{extends file='page.tpl'}

{block name='page_header_container'}{/block}


{block name="page_content_container"}
<div class="row">
	<section id="content" class="col-xs-12 col-lg-6 col-md-6 col-sm-12">
		<div class="kr_blog_post_area single">
			<div class="kr_blog_post_inner">
				<article id="blog_post" class="blog_post blog_post_{$wbblogpost.post_format}">
					<div class="blog_post_content">
						<div class="blog_post_content_top">
							<div class="post_thumbnail">
								{if $wbblogpost.post_format == 'video'}
									{assign var="postvideos" value=','|explode:$wbblogpost.video}
									{if $postvideos|@count > 1 }
										{assign var="class" value='carousel'}
									{else}
										{assign var="class" value=''}
									{/if}
									{include file="module:wbblog/views/templates/front/default/post-video.tpl" postvideos=$postvideos width='870' height="482" class=$class}
								{elseif $wbblogpost.post_format == 'audio'}
									{assign var="postaudio" value=','|explode:$wbblogpost.audio}
									{if $postaudio|@count > 1 }
										{assign var="class" value='carousel'}
									{else}
										{assign var="class" value=''}
									{/if}
									{include file="module:wbblog/views/templates/front/default/post-audio.tpl" postaudio=$postaudio width='870' height="482" class=$class}
								{elseif $wbblogpost.post_format == 'gallery'}
									{if $wbblogpost.gallery_lists|@count > 1 }
										{assign var="class" value='carousel'}
									{else}
										{assign var="class" value=''}
									{/if}
									{include file="module:wbblog/views/templates/front/default/post-gallery.tpl" gallery_lists=$wbblogpost.gallery_lists imagesize="medium" class=$class}
								{else}
									<img class="wbblog_img img-responsive" src="{$wbblogpost.post_img_large}" alt="{$wbblogpost.post_title}">
								{/if}
							</div>
						</div>

						<div class="blog_post_content_bottom allbl">
							<div class="post_metas clearfix">
								<li class="meta_author">
									<i class="fa fa-user"></i>
									<span>{l s='By' mod='wbblog'}  {$wbblogpost.post_author_arr.firstname}  {$wbblogpost.post_author_arr.lastname}</span>
								</li>
								<li class="meta_category hidden-sm-down">
									<i class="fa fa-list"></i>
									<span>{l s='In' mod='wbblog'}</span>
									<a href="{$wbblogpost.category_def_arr.link}">{$wbblogpost.category_def_arr.name}</a>
								</li>

								<li class="meta_comment">
									<i class="fa fa-eye"></i>
									<span>{l s='Views' mod='wbblog'} ({$wbblogpost.comment_count})</span>
								</li>
							</div>
							<h3 class="post_title">{$wbblogpost.post_title}</h3>
							<div class="post_content">
								{if isset($wbblogpost.post_content) && !empty($wbblogpost.post_content)}
									{$wbblogpost.post_content nofilter}
								{else}
									{$wbblogpost.post_content nofilter}
								{/if}
							</div>
							
						</div>
					</div>
				</article>
			</div>
		</div>
	</section>


<div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
{if ($wbblogpost.comment_status == 'open') || ($wbblogpost.comment_status == 'close')}
	{include file="module:wbblog/views/templates/front/default/comment-list.tpl"}
{/if}
{if (isset($disable_blog_com) && $disable_blog_com == 1) && ($wbblogpost.comment_status == 'open')}
			{include file="module:wbblog/views/templates/front/default/comment.tpl"}
{/if}
</div>
{/block}
</div>
{block name="left_column"}
	{assign var="layout_column" value=$layout|replace:'layouts/':''|replace:'.tpl':''|strval}
	{if ($layout_column == 'layout-left-column')}
		<div id="left-column" class="sidebar col-xs-12 col-sm-4 col-md-3 col-xl-2 col-lg-3">
			<div class="lmain">
			{if ($wbblog_column_use == 'own_ps')}
				{hook h="displaywbblogleft"}
			{else}
				{hook h="displayLeftColumn"}
			{/if}
		</div>
		</div>
	{/if}
{/block}
{block name="right_column"}
	{assign var="layout_column" value=$layout|replace:'layouts/':''|replace:'.tpl':''|strval}
	{if ($layout_column == 'layout-right-column')}
		<div id="right-column" class="sidebar col-xs-12 col-sm-4 col-md-3 col-xl-2 col-lg-3">
			{if ($wbblog_column_use == 'own_ps')}
				{hook h="displaywbblogright"}
			{else}
				{hook h="displayRightColumn"}
			{/if}
		</div>
	{/if}
{/block}