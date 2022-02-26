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
<div class="row">
<div class="home_blog_post_area {$wbbdp_designlayout} {$hookName} container">
	 {if isset($wbbdp_title)}<h1 class="heading text-xs-left"><span><span>{l s='latest blogs' mod='wbblog'}</span></span></h1>{/if}
	<div class="home_blog_post  rless">
		<div class="home_blog_post_inner carousel">
		<div id="blog" class="home_blog_post_inner owl-carousel owl-theme">
		{if (isset($wbblogposts) && !empty($wbblogposts))}
		{$i=1}
			{foreach from=$wbblogposts item=wbblgpst}
				<article class="blog_post cless">
					<div class="blog_post_content">
						<div class="blog_post_content_top">
							<div class="blogpos">
							<div class="post_thumbnail">
								{if $wbblgpst.post_format == 'video'}
									{assign var="postvideos" value=','|explode:$wbblgpst.video}
									{if $postvideos|@count > 1 }
										{include file="module:wbblog/views/templates/front/post-video.tpl" videos=$postvideos width='570' height="316" class="carousel"}
									{else}
										{include file="module:wbblog/views/templates/front/post-video.tpl" videos=$postvideos width='570' height="316" class=""}
									{/if}
								{elseif $wbblgpst.post_format == 'audio'}
									{assign var="postaudio" value=','|explode:$wbblgpst.audio}
									{if $postaudio|@count > 1 }
										{include file="module:wbblog/views/templates/front/post-audio.tpl" audios=$postaudio width='570' height="316" class="carousel"}
									{else}
										{include file="module:wbblog/views/templates/front/post-audio.tpl" audios=$postaudio width='570' height="316" class=""}
									{/if}
								{elseif $wbblgpst.post_format == 'gallery'}
									{if $wbblgpst.gallery_lists|@count > 1 }
										{include file="module:wbblog/views/templates/front/post-gallery.tpl" gallery=$wbblgpst.gallery_lists imagesize="home_blog" class="carousel"}
									{else}
										{include file="module:wbblog/views/templates/front/post-gallery.tpl" gallery=$wbblgpst.gallery_lists imagesize="home_blog" class=""}
									{/if}
								{else}
									<img class="wbblog_img img-responsive" src="{$wbblgpst.post_img_home_blog}" alt="{$wbblgpst.post_title}">
										<!-- <div class="blog_mask content">
											<div class="blog_mask_content">
											<a class="thumbnail_lightbox icon" href="{$wbblgpst.post_img_large}" data-lightbox="example-set">
											<i class="material-icons">zoom_in</i>
											</a>
											<a href="{$wbblgpst.link}" class="icon"><i class="material-icons">shuffle</i></a>
											</div>
											
										</div> -->
								{/if}
								</div>
							</div>
						</div>
						<div class="blog_post_content_bottom text-xs-center">
							
							<div class="blogdt"><span>{$wbblgpst.post_date|date_format:"%d %b, %Y"}</span><span class="blogsp">|</span>
								<div class="comment"> <i class="fa fa-comments"></i>{l s='comments' mod='wbblog'}</div>
								<!-- <span class="addmb">{l s='Admin:' mod='wbblog'} {$wbblgpst.post_author_arr.firstname} {$wbblgpst.post_author_arr.lastname}</span> -->
							</div>
							<h3 class="post_title"><a href="{$wbblgpst.link}">{$wbblgpst.post_title}</a></h3>
							<!-- <div class="post_content">
								{if isset($wbblgpst.post_excerpt) && !empty($wbblgpst.post_excerpt)}
									<p>{$wbblgpst.post_excerpt|truncate:100:' ...'|escape:'html':'UTF-8'}</p>
								{else}
									<p>{$wbblgpst.post_content|truncate:100:' ...'|escape:'html':'UTF-8'}</p>
								{/if}
							</div> -->
							<a class="read_more" href="{$wbblgpst.link}">{l s='Read More' mod='wbblog'} </a>
							{* <span>{l s='admin:' mod='wbblog'}{$wbblgpst.post_author_arr.firstname} {$wbblgpst.post_author_arr.lastname}</span> *}
							{* <span class="blog-name">{$wbblgpst.post_author_arr.firstname} {$wbblgpst.post_author_arr.lastname}</span> *}
						</div>
						<!-- <div class="blogcount text-xs-center hidden-sm-down"><span>{$i}</span></div> -->
					</div>
				</article>
				{$i=$i+1}
			{/foreach}
		{else}
			<p>{l s='No Blog Post Found' mod='wbblog'}</p>
		{/if}
		</div>
		</div>
	</div>
</div>
</div>	