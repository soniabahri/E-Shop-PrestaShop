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
<div class="comment_respond clearfix m_bottom_50" id="respond">
    <h3 class="comment_reply_title" id="reply-title">
        Leave a Reply
        <small>
            <a href="/wp_showcase/wp-supershot/?p=38#respond" id="cancel-comment-reply-link" rel="nofollow" style="display:none;">
                Cancel reply
            </a>
        </small>
    </h3>
    <form class="comment_form" action="" method="post" id="wbblogs_commentfrom" role="form" data-toggle="validator">
    	<div class="form-group wbblogs_message"></div>
    	<div class="form-group wbblog_name_parent">
    	  <label for="wbblog_name">Your Name:</label>
    	  <input type="text"  id="wbblog_name" name="wbblog_name" class="form-control wbblog_name" required>
    	</div>
    	<div class="form-group wbblog_email_parent">
    	  <label for="wbblog_email">Your Email:</label>
    	  <input type="email"  id="wbblog_email" name="wbblog_email" class="form-control wbblog_email" required>
    	</div>
    	<div class="form-group wbblog_website_parent">
    	  <label for="wbblog_website">Website Url:</label>
    	  <input type="url"  id="wbblog_website" name="wbblog_website" class="form-control wbblog_website">
    	</div>
    	<div class="form-group wbblog_subject_parent">
    	  <label for="wbblog_subject">Subject:</label>
    	  <input type="text"  id="wbblog_subject" name="wbblog_subject" class="form-control wbblog_subject" required>
    	</div>
    	<div class="form-group wbblog_content_parent">
    	  <label for="wbblog_content">Comment:</label>
    	  <textarea rows="15" cols="" id="wbblog_content" name="wbblog_content" class="form-control wbblog_content" required></textarea>
    	</div>
    	<input type="hidden" class="wbblog_id_parent" id="wbblog_id_parent" name="wbblog_id_parent" value="0">
    	<input type="hidden" class="wbblog_id_post" id="wbblog_id_post" name="wbblog_id_post" value="{$wbblogpost.id_wbposts}">
    	<input type="submit" class="btn btn-primary pull-xs-right wbblog_submit_btn" value="Submit Button">
    </form>
</div>
{wbblog_js name="single_comment_form"}
{/wbblog_js}