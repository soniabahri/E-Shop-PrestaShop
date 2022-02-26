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
	<section id="content" class="">
	{if isset($wbblogpost) && !empty($wbblogpost)}
	<div class="kr_blog_post_area undblg row">
		<div class="kr_blog_post_inner blog_style_{$wbblogsettings.blog_style} column_{$wbblogsettings.blog_no_of_col}">
			{foreach from=$wbblogpost item=xpblgpst}
				<article id="blog_post" class="archb blog_post_{$xpblgpst.post_format} clearfix col-lg-6 col-xl-4 col-md-6 col-sm-6 col-xs-12">
						<div class="">
							<div class="post_thumbnail">
							{block name="wbblog_post_thumbnail"}
								{if $xpblgpst.post_format == 'video'}
									{assign var="postvideos" value=','|explode:$xpblgpst.video}
									{if $postvideos|@count > 1 }
										{assign var="class" value='carousel'}
									{else}
										{assign var="class" value=''}
									{/if}
									{include file="module:wbblog/views/templates/front/default/post-video.tpl" postvideos=$postvideos width='870' height="482" class=$class}
								{elseif $xpblgpst.post_format == 'audio'}
									{assign var="postaudio" value=','|explode:$xpblgpst.audio}
									{if $postaudio|@count > 1 }
										{assign var="class" value='carousel'}
									{else}
										{assign var="class" value=''}
									{/if}
									{include file="module:wbblog/views/templates/front/default/post-audio.tpl" postaudio=$postaudio class=$class}
								{elseif $xpblgpst.post_format == 'gallery'}
									{if $xpblgpst.gallery_lists|@count > 1 }
										{assign var="class" value='carousel'}
									{else}
										{assign var="class" value=''}
									{/if}
									{include file="module:wbblog/views/templates/front/default/post-gallery.tpl" gallery_lists=$xpblgpst.gallery_lists imagesize="large" class=$class}
								{else}
									<img class="img-responsive" src="{$xpblgpst.post_img_large}" alt="{$xpblgpst.post_title}">
									{* <div class="blogdl"><span>{l s='By' mod='wbblog'} {$xpblgpst.post_author_arr.firstname} {$xpblgpst.post_author_arr.lastname}</span> | 
									<span>{$xpblgpst.post_date|date_format:"%b %dTH, %Y"}</span></div> *}
									{* <div class="">
										<div class="blog_mask_content">
											<a class="thumbnail_lightbox" href="{$xpblgpst.post_img_large}">
												<i class="icon_plus"></i>
											</a>										
										</div>
									</div> *}
								<a  href="{$xpblgpst.link}" title="{$xpblgpst.post_title}"><i class="material-icons">filter_none</i></a>
								{/if}
							{/block}

							</div>
						</div>

						<div class="blog_post_content_bottom allbl">
									
							<h3 class="post_title"><a href="{$xpblgpst.link}">{$xpblgpst.post_title|truncate:100:'...'}</a></h3>
							<div class="blogdl"><span>{$xpblgpst.post_author_arr.firstname} {$xpblgpst.post_author_arr.lastname}</span><span class="barr">|</span>
									<span>{$xpblgpst.post_date|date_format:"%b %dth, %Y"}</span></div>
							<div class="post_content">
								{if isset($xpblgpst.post_excerpt) && !empty($xpblgpst.post_excerpt)}
									{$xpblgpst.post_excerpt|truncate:300:'...'|escape:'html':'UTF-8'}
								{else}
									{$xpblgpst.post_content|truncate:300:'...'|escape:'html':'UTF-8'}
								{/if}
							</div>
							<div class="post_d clearfix">
										<i class="fa fa-list"></i><span>{l s='In' mod='wbblog'}</span>
										<a href="{$xpblgpst.category_def_arr.link}">{$xpblgpst.category_def_arr.name}</a>
										<i class="fa fa-eye"></i>
										<span>{l s='Views' mod='wbblog'} ({$xpblgpst.comment_count})</span>
							</div>
							
						</div>
				</article>
			{/foreach}
		</div>
	</div>
	{/if}
	</section>
{* {include file="module:wbblog/views/templates/front/default/pagination.tpl"} *}
{/block}
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