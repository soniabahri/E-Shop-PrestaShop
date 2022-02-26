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
/* global comparedProductsIds, comparator_max_item, productId */

$(document).ready(function () {
    $(document).on('click', '.add_to_compare', function (e) {
        $('.quickview.in').css('opacity', '0');
        $('.modal-backdrop').css('background-color', 'transparent');
        e.preventDefault();
        if (typeof addToCompare != 'undefined') {
            var productId = parseInt($(this).data('id-product'));
            var product =[];
            addToCompare(productId, product);
        }
    });

    reloadProductComparison();
    compareButtonsStatusRefresh();
    totalCompareButtons();
});

function ShowModalCompare(product, status) {
    $(".PopupCompare").remove();
    var wbhtml = "";
    wbhtml += '<div class="PopupCompare">';
    wbhtml += '<div class="PopupCompareInner">';
    if (status == 1) {
        wbhtml += '<h3><svg width="20px" height="20px"> <use xlink:href="#successi"></use> </svg>Compare list updated!<span class="close-popcompare"><i class="fa fa-close"></i></span></h3>';
        wbhtml += '<div class="noty_text_body">';
        wbhtml += '<p>';
        wbhtml += 'Product successfully added to the product comparison!';
        wbhtml += '</br>';
        wbhtml += '<a href="' + productcompare_url + '"><strong>Go to Compare</strong></a>';
        wbhtml += '</p>';
        wbhtml += '</div>';
    } else if (status == 0) {
        wbhtml += '<h3><svg width="20px" height="20px"> <use xlink:href="#successi"></use> </svg>Warning!<span class="close-popcompare"><i class="fa fa-close"></i></span></h3>';
        wbhtml += '<div class="noty_text_body" style="color: #ffff00;">';
        wbhtml += productcompare_max_item;
        wbhtml += '<a href="' + productcompare_url + '"><strong>Go to Compare</strong></a>';
        wbhtml += '</div>';
    } else {
        wbhtml += '<h3><svg width="20px" height="20px"> <use xlink:href="#successi"></use> </svg>Compare list updated!<span class="close-popcompare"><i class="fa fa-close"></i></span></h3>';
        wbhtml += '<div class="noty_text_body">';
        wbhtml += '<p>';
        wbhtml += 'Product successfully removed from the product comparison!';
        wbhtml += '</br>';
        wbhtml += '<a href="' + productcompare_url + '"><strong>Go to Compare</strong></a>';
        wbhtml += '</p>';
        wbhtml += '</div>';

    }
    wbhtml += '</div>';
    wbhtml += '</div>';
    $(wbhtml).appendTo("body");
    $(".close-popcompare").click(function () {
        $(".PopupCompare").remove();
        $('.quickview.in').css('opacity', '1');
        $('.modal-backdrop').css('background-color', '#000');
    });
    setTimeout(function () {
        $(".PopupCompare").remove();
        $('.quickview.in').css('opacity', '1');
        $('.modal-backdrop').css('background-color', '#000');
    }, 10000);
}

function addToCompare(productId, product)
{

    var totalValueNow = parseInt($('.bt_compare').next('.compare_product_count').val());
    var action, totalVal;
    if ($.inArray(parseInt(productId), comparedProductsIds) === -1)
        action = 'add';
    else
        action = 'remove';

    $.ajax({
        headers: {"cache-control": "no-cache"},
        url: productcompare_url,
        async: true,
        cache: false,
        data: {
            "ajax": 1,
            "action": action,
            "id_product": productId,
            "token": static_token
        },
        success: function (data) {
            if (action === 'add' && (comparedProductsIds == null || comparedProductsIds.length < comparator_max_item)) {
                if (comparedProductsIds == null)
                    comparedProductsIds = [];
                comparedProductsIds.push(parseInt(productId)),
                        compareButtonsStatusRefresh(),
                        totalVal = totalValueNow + 1,
                        $('.bt_compare').next('.compare_product_count').val(totalVal),
                        totalValue(totalVal);
                setTimeout(function () {
                    ShowModalCompare(product, 1);
                }, 300);
            } else if (action === 'remove') {
                comparedProductsIds.splice($.inArray(parseInt(productId), comparedProductsIds), 1),
                        compareButtonsStatusRefresh(),
                        totalVal = totalValueNow - 1,
                        $('.bt_compare').next('.compare_product_count').val(totalVal),
                        totalValue(totalVal);
                setTimeout(function () {
                    ShowModalCompare(product, -1);
                }, 300);
            } else
            {
                ShowModalCompare(product, 0);
            }
            totalCompareButtons();
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
        }
    });
}

function reloadProductComparison()
{
    $(document).on('click', 'a.cmp_remove', function (e) {
        e.preventDefault();
        var idProduct = parseInt($(this).data('id-product'));
        $.ajax({
            headers: {"cache-control": "no-cache"},
            url: productcompare_url,
            async: false,
            cache: false,
            data: {
            "ajax": 1,
            "action": 'remove',
            "id_product": idProduct,
            "token": static_token
        },
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
        if ($.inArray(parseInt($(this).data('id-product')), comparedProductsIds) !== -1)
            $(this).addClass('checked');
        else
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
