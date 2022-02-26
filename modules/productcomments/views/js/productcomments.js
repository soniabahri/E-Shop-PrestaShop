/*
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
*/

$(document).ready(function () {
    $('input.star').rating();
    $('.auto-submit-star').rating();

    $('.open-comment-form').fancybox({
        'hideOnContentClick': false
    });

    url_options = '?';

    if (typeof(productcomments_url_rewrite) !== 'undefined'){
        if (productcomments_url_rewrite == '0') {
            url_options = '&';
        }
    }

    $('button.usefulness_btn').click(function () {
        var id_product_comment = $(this).data('id-product-comment');
        var is_usefull = $(this).data('is-usefull');
        var parent = $(this).parent();

        $.ajax({
            url: productcomments_controller_url + url_options + 'rand=' + new Date().getTime(),
            data: {
                id_product_comment: id_product_comment,
                action: 'comment_is_usefull',
                value: is_usefull
            },
            type: 'POST',
            headers: {"cache-control": "no-cache"},
            success: function (result) {
                parent.fadeOut('slow', function () {
                    parent.remove();
                });
            }
        });
    });

    $('span.report_btn').click(function () {
        if (confirm(confirm_report_message)) {
            var idProductComment = $(this).data('id-product-comment');
            var parent = $(this).parent();

            $.ajax({
                url: productcomments_controller_url + url_options + 'rand=' + new Date().getTime(),
                data: {
                    id_product_comment: idProductComment,
                    action: 'report_abuse'
                },
                type: 'POST',
                headers: {"cache-control": "no-cache"},
                success: function (result) {
                    parent.fadeOut('slow', function () {
                        parent.remove();
                    });
                }
            });
        }
    });

    rebindClickButton();
});

function rebindClickButton()
{
    $('#submitNewMessage').off('click');
    $('#submitNewMessage').click(function (e) {
        // Kill default behaviour
        e.preventDefault();

        $.ajax({
            url: productcomments_controller_url + url_options + 'action=add_comment&secure_key=' + secure_key + '&rand=' + new Date().getTime(),
            data: $('#id_new_comment_form').serialize(),
            type: 'POST',
            headers: {"cache-control": "no-cache"},
            dataType: "json",
            success: function (data) {
                if (data.result) {
                    $.fancybox.close();
                    fancyChooseBox(moderation_active ? productcomment_added_moderation : productcomment_added);
                }
                else {
                    $('#new_comment_form_error ul').html('');
                    $.each(data.errors, function (index, value) {
                        $('#new_comment_form_error ul').append('<li>' + value + '</li>');
                    });
                    $('#new_comment_form_error').slideDown('slow');
                }
            }
        });
        return false;
    });
}

function fancyChooseBox(msg) {
    $('#new_comment_form_ok').html(msg).show();
}

function productcommentRefreshPage() {
    window.location.reload();
}