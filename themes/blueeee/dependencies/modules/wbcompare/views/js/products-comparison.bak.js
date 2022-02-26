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
/* global comparedProductsIds, comparator_max_item, baseUri */

$(document).ready(function () {
    $(document).on('click', '.add_to_compare, .compare_remove', function (e) {
        e.preventDefault();
        if (typeof addToCompare != 'undefined'){
			addToCompare(parseInt($(this).data('id-product')));
                    }
    });

    reloadProductComparison();
    compareButtonsStatusRefresh();
    totalCompareButtons();
});

function HideShowButton(status) {
    if (status == 1) {
        jQuery(".actions-footer-sidebar").removeClass("compare-hide");
        jQuery(".list-compare-left ul li.empty").addClass("compare-hide");
    } else {
        jQuery(".actions-footer-sidebar").addClass("compare-hide");
        jQuery(".list-compare-left ul li.empty").removeClass("compare-hide");
    }
}

function ShowModalCompare(product, status) {
    var pro_cover = $(product).attr('data-product-cover');
    var pro_name = $(product).attr('data-product-name');
    jQuery(".infoCompare").remove();
    var wbhtml = "";
    wbhtml += '<div class="infoCompare">';
    wbhtml += '<div class="infoCompareInner">';
    if (status == 1) {
        wbhtml += '<h3><svg width="20px" height="20px"> <use xlink:href="#successi"></use> </svg>Compare list updated!<span class="close-popcompare"><i class="fa fa-close"></i></span></h3>';
        wbhtml += '<div class="noty_text_body">';
        wbhtml += '<a class="thumbnail" href="">';
        wbhtml += '<img src="' + pro_cover + '">';
        wbhtml += '</a>';
        wbhtml += '<p>';
        wbhtml += 'Success: You have added product ';
        wbhtml += '<a href="#"><strong>' + pro_name + '</strong></a>';
        wbhtml += ' to your ';
        wbhtml += '<a href="'+ productcompare_url +'">product comparison</a>!';
        wbhtml += '</p>';
        wbhtml += '</div>';
    } else if (status == 0) {
        wbhtml += '<h3><i class="material-icons">&#xE160;</i>Warning!<span class="close-popcompare"><i class="material-icons">&#xE5C9;</i></span></h3>';
        wbhtml += '<div class="noty_text_body">';
        wbhtml += productcompare_max_item;
        wbhtml += '</div>';
    } else {
        wbhtml += '<h3><svg width="20px" height="20px"> <use xlink:href="#successi"></use> </svg>Compare list updated!<span class="close-popcompare"><i class="fa fa-close"></i></span></h3>';
        wbhtml += '<div class="noty_text_body red-color">';
        wbhtml += 'The product&nbsp;<strong>' + pro_name + '</strong>&nbsp;has been removed from compare';
        wbhtml += '</div>';

    }
    wbhtml += '</div>';
    wbhtml += '</div>';
    jQuery(wbhtml).appendTo("body");
    jQuery(".close-popcompare").click(function () {
        jQuery(".infoCompare").remove();
    });
    setTimeout(function () {
        jQuery(".infoCompare").remove();
    }, 10000);
}

function addToCompare(productId,product)
{
    var totalValueNow = parseInt($('.bt_compare').next('.compare_product_count').val());
    var action, totalVal;
    if ($.inArray(parseInt(productId), comparedProductsIds) === -1)
        action = 'add';
    else
        action = 'remove';

    $.ajax({
        url: baseUri + 'modules/wbcompare/controllers/front/WbCompareProduct.php',
        async: true,
        cache: false,
        data: {
            "ajax": 1,
            "action": action,
            "id_product": productId
        },
        success: function (data) {
            var pro_name = $(product).attr('data-product-name');

            if (action === 'add' && comparedProductsIds.length < comparator_max_item) {
                comparedProductsIds.push(parseInt(productId)),
                        compareButtonsStatusRefresh(),
                        totalVal = totalValueNow + 1,
                        $('.bt_compare').next('.compare_product_count').val(totalVal),
                        totalValue(totalVal);
                setTimeout(function () {
                    ShowModalCompare(product,1);
                }, 300);
                HideShowButton(1);
                var itemLeft = '<li><a href="#">' + pro_name + '</a><span class="compare_remove" href="#" title="Remove" data-productid="' + productId + '"><i class="material-icons">&#xE872;</i></span></li>';
                jQuery(".list-compare-left ul").append(itemLeft);
            } else if (action === 'remove') {
                comparedProductsIds.splice($.inArray(parseInt(productId), comparedProductsIds), 1),
                        compareButtonsStatusRefresh(),
                        totalVal = totalValueNow - 1,
                        $('.bt_compare').next('.compare_product_count').val(totalVal),
                        totalValue(totalVal);
                setTimeout(function () {
                    ShowModalCompare(product,-1);
                }, 300);
                jQuery(".list-compare-left .compare_remove[data-productid='" + productId + "']").closest("li").remove();
                var checkLeftItem = jQuery(".list-compare-left ul li").length;
                if (typeof checkLeftItem != "undefined" && checkLeftItem <= 1) {
                    HideShowButton(0);
                }
            } else
            {
                ShowModalCompare(product,0);
            }
            totalCompareButtons();
        },
        error: function () {}
    });
}

function reloadProductComparison()
{
    $(document).on('click', 'a.cmp_remove', function (e) {
        e.preventDefault();
        var idProduct = parseInt($(this).data('id-product'));
        $.ajax({
            url: baseUri + '?controller=products-comparison&ajax=1&action=remove&id_product=' + idProduct,
            async: false,
            cache: false
        });
        $('td.product-' + idProduct).fadeOut(600);

        var compare_product_list = get('compare_product_list');
        var bak = compare_product_list;
        var new_compare_product_list = [];
        compare_product_list = decodeURIComponent(compare_product_list).split('|');
        for (var i in compare_product_list)
            if (parseInt(compare_product_list[i]) != idProduct)
                new_compare_product_list.push(compare_product_list[i]);
        if (new_compare_product_list.length)
            window.location.search = window.location.search.replace(bak, new_compare_product_list.join(encodeURIComponent('|')));
    });
}
;

function compareButtonsStatusRefresh()
{
    $('.add_to_compare').each(function () {
        if ($.inArray(parseInt($(this).data('id-product')), comparedProductsIds) !== -1) {
            $(this).addClass('checked');
            $(this).attr('data-tooltip', compare_remove_text);
        } else
            $(this).removeClass('checked');
    });
}

function totalCompareButtons()
{
    var totalProductsToCompare = parseInt($('.bt_compare .total-compare-val').html());
    if (typeof totalProductsToCompare !== "number" || totalProductsToCompare === 0)
        $('.bt_compare').attr("disabled", true);
    else
        $('.bt_compare').attr("disabled", false);
}

function totalValue(value)
{
    $('.bt_compare').find('.total-compare-val').html(value);
}

function get(name)
{
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.search);

    if (results == null)
        return "";
    else
        return results[1];
}
