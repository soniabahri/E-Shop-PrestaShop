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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2018 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

// start tab general
$this->fields_form[]['form'] = array(
    'tinymce' => true,
    'legend' => array(
        'title' => 'General Setting',
    ),
    'input' => array(
        array(
            'type' => 'text',
            'label' => 'Meta Title',
            'desc' => 'Inser Blog Meta Title',
            'name' => 'meta_title',
        'lang' => true,
            'default_val' => 'Blog Title',
        ),
        array(
            'type' => 'tags',
            'label' => 'Meta Keyword',
            'desc' => 'Insert Blog Meta Keyword',
            'name' => 'meta_keyword',
            'default_val' => 'Blog,wbblog',
        ),
        array(
            'type' => 'textarea',
            'label' => 'Meta Description',
            'name' => 'meta_description',
            'desc' => 'Please Input Meta Description',
            'default_val' => 'Meta Description',
        ),
        array(
            'type' => 'select',
            'label' => 'Select Blog Template',
            'name' => 'theme_name',
            'default_val' => 'default',
            'options' => array(
                'query' => wbBlog::getAllThemes(),
                'id' => 'id',
                'name' => 'name'
            ),
        ),
        array(
            'type' => 'text',
            'label' => 'Blog Posts Per Page',
            'desc' => 'Please Enter How many Blog Post Display Per Page',
            'name' => 'post_per_page',
            'class' => 'fixed-width-sm',
            'default_val' => '20',
        ),
        array(
            'type' => 'select',
            'label' => 'Select Left/Right Column',
            'name' => 'column_use',
            'default_val' => 'default_ps',
            'desc' => 'Which Column Do you want to use. displayleftcolumn,
            displayrightcolumn or displaywbblogleft,displaywbblogright column hook.',
            'options' => array(
                'query' => array(
                        array(
                            'id' => 'default_ps',
                            'name' => 'Default Prestashop Column',
                        ),
                        array(
                            'id' => 'own_ps',
                            'name' => 'Wbblog Own Column',
                        ),
                    ),
                'id' => 'id',
                'name' => 'name'
            ),
        ),
        array(
            'type' => 'switch',
            'label' => 'Auto Comment Approved',
            'name' => 'comment_approved',
            'default_val' => '1',
            'values' => array(
                array(
                    'id' => 'active',
                    'value' => 1,
                    'label' => 'Enabled'
                ),
                array(
                    'id' => 'active',
                    'value' => 0,
                    'label' => 'Disabled'
                )
            ),
        ),
        array(
            'type' => 'switch',
            'label' => 'Enable Blog Comments',
            'name' => 'disable_blog_com',
            'default_val' => '1',
            'values' => array(
                array(
                    'id' => 'active',
                    'value' => 1,
                    'label' => 'Enabled'
                ),
                array(
                    'id' => 'active',
                    'value' => 0,
                    'label' => 'Disabled'
                )
            ),
        ),
    ),
    'submit' => array(
        'title' => 'Save',
        'class' => 'btn btn-default pull-right'
    )
);

$this->fields_form[]['form'] = array(
    'tinymce' => true,
    'legend' => array(
        'title' => 'URL Setting',
    ),
    'input' => array(
        array(
            'type' => 'text',
            'label' => 'Main Blog Url',
            'desc' => 'Inser Main Blog Url',
            'name' => 'main_blog_url',
            'prefix' => 'http://domain.com/',
            'suffix' => '.html',
            'default_val' => 'Blog',
            'class' => 'fixed-width-sm',
        ),
        array(
            'type' => 'text',
            'label' => 'Category Blog Url',
            'desc' => 'Inser Category Blog Url',
            'name' => 'category_blog_url',
            'prefix' => 'http://domain.com/blog/',
            'suffix' => '/1_rewrite.html',
            'default_val' => 'category',
            'class' => 'fixed-width-sm',
        ),
        array(
            'type' => 'text',
            'label' => 'Single Blog Url',
            'desc' => 'Inser Single Blog Url',
            'name' => 'single_blog_url',
            'prefix' => 'http://domain.com/blog/',
            'suffix' => '/1_rewrite.html',
            'default_val' => 'post',
            'class' => 'fixed-width-sm',
        ),
        array(
            'type' => 'text',
            'label' => 'Tag Blog Url',
            'desc' => 'Inser Tag Blog Url',
            'name' => 'tag_blog_url',
            'prefix' => 'http://domain.com/blog/',
            'suffix' => '/1_rewrite.html',
            'default_val' => 'tag',
            'class' => 'fixed-width-sm',
        ),
        array(
            'type' => 'radio',
            'label' => 'Url Format',
            'name' => 'url_format',
            'default_val' => 'preid_seo_url',
            'values' => array(
                array(
                    'id' => 'default_seo_url',
                    'value' => 'default_seo_url',
                    'label' => 'Default SEO Friendly: http://domain.com/module/wbblog/single/?id_post=1',
                ),
                array(
                    'id' => 'preid_seo_url',
                    'value' => 'preid_seo_url',
                    'label' => 'URL Format: http://domain.com/blog/post/1_rewrite/',
                ),
                array(
                    'id' => 'postid_seo_url',
                    'value' => 'postid_seo_url',
                    'label' => 'URL Format: http://domain.com/blog/post/rewrite_1/',
                ),
                array(
                    'id' => 'wthotid_seo_url',
                    'value' => 'wthotid_seo_url',
                    'label' => 'URL Format: http://domain.com/blog/post/rewrite/',
                ),
            ),
        ),
        array(
            'type' => 'radio',
            'label' => 'Enable Use .html',
            'name' => 'postfix_url_format',
            'default_val' => 'enable_html',
            'values' => array(
                array(
                    'id' => 'enable_html',
                    'value' => 'disable_html',
                    'label' => 'Enable .html URL format.',
                ),
                array(
                    'id' => 'disable_html',
                    'value' => 'enable_html',
                    'label' => 'Disable .html URL format.',
                ),
            ),
        ),
    ),
    'submit' => array(
        'title' => 'Save',
        'class' => 'btn btn-default pull-right',
    )
);


// Blog style
$this->fields_form[]['form'] = array(
    'tinymce' => true,
    'legend' => array(
    'title' => 'Blog style',
    ),
    'input' => array(
        array(
            'type' => 'select',
            'label' => 'Blog style',
            'name' => 'blog_style',
            'default_val' => 'default',
            'data_by_demo' => array(
                'demo_1' => 'default',
                'demo_2' => 'default',
                'demo_3' => 'column',
            ),
            'desc' => 'Choose blog style Default/Grid',
            'options' => array(
                'id' => 'id',
                'name' => 'name',
                'query' => array(
                    array(
                        'id' => 'default',
                        'name' => 'Default'
                        ),
                    array(
                        'id' => 'column',
                        'name' => 'Column'
                        ),
                    )
                )
        ),
        array(
            'type' => 'select',
            'label' => 'Blog no of column',
            'name' => 'blog_no_of_col',
            'default_val' => '2',
            'data_by_demo' => array(
                'demo_1' => '4',
                'demo_2' => '4',
                'demo_3' => '6',
            ),
            'desc' => 'Choose blog gird style no of column',
            'options' => array(
                'id' => 'id',
                'name' => 'name',
                'query' => array(
                    array(
                        'id' => '2',
                        'name' => 'Two column'
                        ),
                    array(
                        'id' => '3',
                        'name' => 'Three column'
                        ),
                    array(
                        'id' => '4',
                        'name' => 'Four column'
                        ),
                    )
                )
        ),
    ),
    'submit' => array(
        'title' => 'Save',
        'class' => 'btn btn-default pull-right'
    )
);

// Blog style
$this->fields_form[]['form'] = array(
    'tinymce' => true,
    'legend' => array(
    'title' => 'Display Home Style',
    ),
    'input' => array(
        array(
            'type' => 'text',
            'label' => 'Title',
            'name' => 'wbbdp_title',
            'default_val' => 'News',
            'lang' => true,
        ),
        array(
            'type' => 'text',
            'label' => 'Sub Title',
            'name' => 'wbbdp_subtext',
            'default_val' => 'All Recent Posts From wbBlog',
            'lang' => true,
        ),
        array(
            'type' => 'text',
            'label' => 'How Many Post You Want To Display',
            'name' => 'wbbdp_postcount',
            'default_val' => 4,
        ),
        array(
            'type' => 'select',
            'label' => 'Select number of column to display',
            'name' => 'wbbdp_numcolumn',
            'default_val' => 3,
            'options' => array(
                'query' => array(
                        array(
                            'id' => '1',
                            'name' => '1 column',
                        ),
                        array(
                            'id' => '2',
                            'name' => '2 column',
                        ),
                        array(
                            'id' => '3',
                            'name' => '3 column',
                        ),
                        array(
                            'id' => '4',
                            'name' => '4 column',
                        ),
                    ),
                'id' => 'id',
                'name' => 'name'
            )
        ),
        array(
            'type' => 'select',
            'label' => 'Select Design Layout',
            'name' => 'wbbdp_designlayout',
            'default_val' => 'general',
            'options' => array(
                'query' => array(
                        array(
                            'id' => 'general',
                            'name' => 'General',
                        ),
                        array(
                            'id' => 'classic',
                            'name' => 'Classic',
                        ),
                        array(
                            'id' => 'creative',
                            'name' => 'Creative',
                        ),
                    ),
                'id' => 'id',
                'name' => 'name'
            )
        ),
    ),
    'submit' => array(
        'title' => 'Save',
        'class' => 'btn btn-default pull-right'
    )
);
