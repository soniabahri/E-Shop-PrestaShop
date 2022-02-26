<?php
/**
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2017-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

    $themes_colors = array(
        'default'
    );

    $items_settings = array(
        'body_color' => array(
            'text' => 'Background color of body',
            'note' => 'Support Box Layout Only',
            'attr_css' => 'color',
            'selector' => array(
                'background-color' => 'body',
        ),
            'default_val' => '#fff',
            'frontend' => true,
        ),
        'content_bkg' => array(
            'text' => 'Background content',
            'attr_css' => 'color',
            'selector' => array(
                'background-color' =>'body #page',
            ),
            'default_val' => '#fff',
            'frontend' => true,
        ),
        'footer_header' => array(
            'text' => 'Background Header',
            'attr_css' => 'color',
            'selector' => array(
                'background-color' =>'header .nav',
            ),
            'default_val' => '#ffffff',
            'frontend' => true,
        ),
        'footer_bkg' => array(
            'text' => 'Background footer',
            'attr_css' => 'color',
            'selector' => array(
                'background-color' =>'.footer-container',
            ),
            'default_val' => '#2a2a2a',
            'frontend' => true,
        ),
        'main_color' => array(
            'text' => 'Main color',
            'note' => 'Button, label Sale,...',
            'attr_css' => 'color',
            'selector' => array(
                'background-color' =>'.wt-container-menu,#search_block_top .btn.button-search,
                    #wt-special-products  .alreadly-sold .bar-sold .percent,
                    .wt_home_filter_product_tab ul.title-tab li a:before,
                    .wt-home-center-banner .home-center-banner .text a,
                    .quick-view:hover,.btn-default:hover,
                    .sub-cat .sub-cat-ul li a:before,
                    .home-center-banner-1 .wt-home-center .right .text span,.ui-slider-horizontal .ui-slider-range,
                    .button.button-small,
                    .top-pagination-content ul.pagination li.active > span span,
                    .bottom-pagination-content ul.pagination li.active > span span,
                    #category .product_list.list .right-block .wt-button-container .cart 
                    .button.ajax_add_to_cart_button span, #module-wtblocksearch-catesearch .product_list.list 
                    .right-block .wt-button-container .cart .button.ajax_add_to_cart_button span,
                    #category .product_list.list .right-block .wt-button-container .quickview .quick-view,
                    #module-wtblocksearch-catesearch .product_list.list .right-block 
                    .wt-button-container .quickview .quick-view,.box-info-product .exclusive span,
                    .button.button-medium, 
                    ul.product-list li.ajax_block_product:hover .button.ajax_add_to_cart_button,
                    .wt-new-products .item_new_product:hover .button.ajax_add_to_cart_button,
                    div.product-list div.ajax_block_product:hover .button.ajax_add_to_cart_button,
                    .wt-menu-sticky,
                    #category .product_list.list .right-block .wt-button-container .cart 
                    .button.ajax_add_to_cart_button, #module-wtblocksearch-catesearch 
                    .product_list.list .right-block .wt-button-container .cart 
                    .button.ajax_add_to_cart_button,
                    .pagination > li > a:hover, .pagination > li > a:focus, .pagination > li > span:hover,
                    .pagination > li > span:focus,
                    .out-content-prod .right-block .wt-prod-special .wt-button-container 
                    .cart .button.ajax_add_to_cart_button,
                    .comments_advices a:hover:before,
                    ul.product-list li.ajax_block_product:hover .quick-view,
                    .wt-new-products .item_new_product:hover .quick-view,
                    div.product-list div.ajax_block_product:hover .quick-view,
                    ul.product-list li.ajax_block_product:hover .button.ajax_add_to_cart_button, 
                    .wt-new-products .item_new_product:hover .button.ajax_add_to_cart_button,
                    div.product-list div.ajax_block_product:hover .button.ajax_add_to_cart_button,
                    #wt-special-products  .wt-button-container .cart .button.ajax_add_to_cart_button,
                    #wt-special-products  .wt-button-container .quickview .quick-view,
                    .wt_prev_product .button,.wt_next_product .button',

                'color' =>'.product-name a:hover,
                    #new_comment_tab_btn:hover,#wishlist_button, 
                    #wishlist_button_nopop:hover:before,ul.step li.step_current span:before,
                    .sub-cat .sub-cat-ul li a:before,.sub-cat .sub-cat-ul li a:hover:after, 
                    .sub-cat .sub-cat-ul li.active a:after,#wt_scroll_top',


                'border-color' =>'#wt-special-products .title_block a,
                    .block .title_block span, .block h4 span,
                    #search_block_top #searchbox,#search_block_top .selector span,
                    .wt_home_filter_product_tab ul.title-tab li a:before,.sub-cat .sub-cat-ul li a:before,
                    .footer-container #footer h4,.block .title_block,
                    .block h4,#wt-menu-ver-left .menu-dropdown li:first-child > a,
                    #wt-special-products  .wt-button-container .quickview .quick-view span,
                    #new_comment_tab_btn:hover,#wishlist_button,
                    #wishlist_button_nopop:hover:before,ul.step li.step_current:before,
                    .wt-menu-horizontal ul li.item-header a,
                    .out-content-prod .right-block .wt-prod-special .wt-button-container .cart 
                    .button.ajax_add_to_cart_button span,
                    .box-info-product .exclusive:before,
                    #wt-special-products  .wt-button-container .cart .button.ajax_add_to_cart_button span,
                    #wt_scroll_top,
                    .wt_prev_product .button,.wt_next_product .button',
                'background-color_10'=>'.wt_home_filter_product_tab ul.title-tab li a:before',
                'border-color_-20' =>'h3.page-product-heading,.wt_home_filter_product_tab ul.title-tab li a:before',
                'background-color_-20' => '.wt_home_filter_product_tab ul.title-tab li a:before,
                .sub-cat .sub-cat-ul li.active a:before, .sub-cat .sub-cat-ul li a:hover::before'
                ),
            'default_val' => '#0166c3',
            'frontend' => true,
        ),
        'primary1_color' => array(
            'text' => 'Primary color 1',
            'note' => '',
            'attr_css' => 'color',
            'selector' => array(
                'background-color' =>'',
                'color' =>'.header_user_info span,
                    .button.ajax_add_to_cart_button span,.quick-view span,.wishlist_button,
                    .cat-name,#subcategories ul li .subcategory-name,
                    .block .products-block .product-description,
                    ul.step li.step_todo span,.block .products-block .product-description,
                    .header_user_info span,.cat-name,
                    #subcategories ul li .subcategory-name,.compare_button',
                'border-color' =>'',
                'background-color_10'=>'',
                'border-color_10' =>'',
                'background-color_-20' => ''
                ),
            'default_val' => '#999',
            'frontend' => true,
        ),

        'primary2_color' => array(
            'text' => 'Primary color 2',
            'note' => '',
            'attr_css' => 'color',
            'selector' => array(
                'background-color' =>'',

                'color' =>'.block .title_block, .block h4,
                    #wt_cat_featured .content .title a,
                    ul.product_list.list > li .product-desc,
                    #product_comments_block_tab div.comment .comment_details,
                    #wt_category_feature .wt-block-title h3,
                    label,.page-heading span.heading-counter,
                    ul.product_list.list > li .product-desc,
                    .page-product-box h4,table.table-product-discounts tr td,
                    table.table-product-discounts tr th',

                'border-color' =>'',

                'background-color_10'=>'',
                'border-color_10' =>'',
                'background-color_-20' => ''
                ),
            'default_val' => '#333',
            'frontend' => true,
        ),
        'primary3_color' => array(
            'text' => 'Primary color 3',
            'note' => '',
            'attr_css' => 'color',
            'selector' => array(
                'background-color' =>'#wt-menu-ver-left .category-left .category-title, .sale-bkg',

                'color' =>'#wt-menu-ver-left  ul li.item-header a,
                    .nav-shipping-map span,#currencies-block-top div.current,
                    #languages-block-top div.current,.header_user_info a,
                    #wt-menu-ver-left .category-left  li.level-1 > a,
                    #wt-menu-ver-left .category-left .menu-dropdown li a:hover,.product-name a,
                    .wt_home_filter_product_tab ul.title-tab li.ui-tabs-selected a:hover,
                    .page-heading .cat-name,#subcategories p.subcategory-heading,
                    .pb-center-column h1,.cart_block .cart-prices,
                    ul.step li.step_current span,
                    #social_block_nav ul li a:before,.block .title_block a,
                    .block h4 a,.product-name,.wt_home_filter_product_tab ul.title-tab li.ui-tabs-selected a,
                    .content_scene_cat .content_scene_cat_bg .cat_desc',

                'border-color' =>'',

                'background-color_10'=>'',
                'border-color_10' =>'',
                'background-color_-20' => ''
                ),
            'default_val' => '#000',
            'frontend' => true,
        ),
        'primary4_color' => array(
            'text' => 'Primary color 4',
            'note' => '',
            'attr_css' => 'color',
            'selector' => array(
                'background-color' =>'',

                'color' =>'',

                'border-color' =>'',

                'background-color_10'=>'',
                'border-color_10' =>'',
                'background-color_-20' => ''
                ),
            'default_val' => '#666',
            'frontend' => true,
        ),



        'body_font' => array(
            'text' => 'Font of body',
            'note' => 'text desction, link footer,...',
            'attr_css' => 'font-family',
            'selector' => 'body,h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6,
                .product-name,.pb-center-column h1,
                .wt-menu-horizontal ul li.level-1 > a,.price.product-price,
                .price,.footer-container #footer a,.block .title_block, .block h4,
                #subcategories ul li .subcategory-name,
                .cart_block .cart-buttons a#button_order_cart span,.labels_cart,
                .table tfoot > tr > td,#cart_summary tfoot td.total_price_container span,
                #cart_summary tfoot td#total_price_container,
                .product-name a,.sub-cat .sub-cat-ul li a',
            'frontend' => true,
        )
    );
