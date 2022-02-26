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

use PrestaShop\PrestaShop\Core\Product\Search\Pagination;

class WbblogArchiveModuleFrontController extends WbblogMainModuleFrontController
{
    public $blogpost;
    public $blogcategory;
    public $wberrors;
    public $id_identity;
    public $rewrite;
    public function init()
    {
        parent::init();
        $this->rewrite = Tools::getValue('rewrite');
        $subpage_type = Tools::getValue('subpage_type');
        $p = Tools::getValue('page');
        $this->p = isset($p) && !empty($p) ? $p : 1;
        $id_identity = Tools::getValue('id');
        if (!isset($id_identity) || empty($id_identity)) {
            $this->id_identity = (int)wbcategoryclass::getTheId($this->rewrite, $this->page_type);
        } else {
            $this->id_identity = (int)$id_identity;
        }
        if (isset($this->id_identity) &&
            !empty($this->id_identity) &&
            !wbcategoryclass::categoryExists($this->id_identity, $this->page_type)) {
            $url = wbBlog::wbBlogLink();
            Tools::redirect($url);
            $this->wberrors[] = Tools::displayError($this->l('Blog Category Not Found.'));
        }
        if ($this->page_type == 'tag') {
            $this->blogpost = wbPostsClass::getTagPosts(
                (int)$this->id_identity,
                (int)$this->p,
                (int)$this->n,
                $subpage_type
            );
        } else {
            $this->blogpost = wbPostsClass::getCategoryPosts(
                (int)$this->id_identity,
                (int)$this->p,
                (int)$this->n,
                $subpage_type
            );
        }
        if ($this->id_identity || Validate::isUnsignedId($this->id_identity)) {
            $this->blogcategory = new wbcategoryclass($this->id_identity);
        }
        $this->nbProducts = (int)wbPostsClass::getCategoryPostsCount(
            (int)$this->id_identity,
            $subpage_type
        );
    }
    public function setMedia()
    {
        parent::setMedia();
        $themename = wbBlog::getThemeName();
        $theme_name = (isset($themename) && !empty($themename)) ? '/'.$themename : '';
        $this->addCSS(WBBLOG_CSS_URI.$theme_name.'css/wbblog_archive.css');
        $this->addJS(WBBLOG_JS_URI.$theme_name.'js/wbblog_archive.js');
    }
    public function initContent()
    {
        parent::initContent();
        // print_r($this->getLayout());
        $id_lang = (int)Context::getContext()->language->id;
        $pagination = $this->getXprtPagination();
        $path = wbcategoryclass::getcategorypath($this->id_identity, $this->page_type);
        $this->context->smarty->assign('path', $path);
        $this->context->smarty->assign('pagination', $pagination);
        if (isset($this->blogpost) && !empty($this->blogpost)) {
            $this->context->smarty->assign('wbblogpost', $this->blogpost);
        }
        if (isset($this->blogcategory->title[$id_lang]) &&
            !empty($this->blogcategory->title[$id_lang])) {
            $this->context->smarty->assign('meta_title', $this->blogcategory->title[$id_lang]);
            $this->context->smarty->tpl_vars['page']->value['meta']['title'] = $this->blogcategory->title[$id_lang];
        } else {
            $this->context->smarty->assign(
                'meta_title',
                Configuration::get(
                    wbBlog::$wbblogshortname."meta_title",
                    $id_lang
                )
            );
            $this->context->smarty->tpl_vars['page']->value['meta']['title'] = Configuration::get(
                wbBlog::$wbblogshortname."meta_title",
                $id_lang
            );
        }
        if (isset($this->blogcategory->meta_description[$id_lang]) &&
            !empty($this->blogcategory->meta_description[$id_lang])) {
            $this->context->smarty->assign(
                'meta_description',
                $this->blogcategory->meta_description[$id_lang]
            );
        } else {
            $this->context->smarty->assign(
                'meta_description',
                Configuration::get(
                    wbBlog::$wbblogshortname."meta_description"
                )
            );
        }
        if (isset($this->blogcategory->keyword[$id_lang]) &&
            !empty($this->blogcategory->keyword[$id_lang])) {
            $this->context->smarty->assign('meta_keywords', $this->blogcategory->keyword[$id_lang]);
        } else {
            $this->context->smarty->assign(
                'meta_keywords',
                Configuration::get(
                    wbBlog::$wbblogshortname."meta_keyword"
                )
            );
        }
        if (isset($this->wberrors) && !empty($this->wberrors)) {
            $this->context->smarty->assign('wberrors', $this->wberrors);
        }

        $tpl_prefix = '';
        $template = 'archive.tpl';
        if (!empty($this->page_type)) {
            $template1 = $this->page_type.'-'.'archive.tpl';
            if ($path = $this->getTemplatePath($template1)) {
                $template = $template1;
            } else {
                $template = 'archive.tpl';
            }
        }
        $this->setTemplate($template);
        unset($tpl_prefix);
    }
    public function getLayout()
    {
        $entity = 'module-wbblog-archive';
        $layout = $this->context->shop->theme->getLayoutRelativePathForPage($entity);
        if ($overridden_layout = Hook::exec(
            'overrideLayoutTemplate',
            array(
                'default_layout' => $layout,
                'entity' => $entity,
                'locale' => $this->context->language->locale,
                'controller' => $this,
            )
        )) {
            return $overridden_layout;
        }
        if ((int) Tools::getValue('content_only')) {
            $layout = 'layouts/layout-content-only.tpl';
        }
        return $layout;
    }
    public function updateXprtQueryString(array $extraParams = null)
    {
        $uriWithoutParams = explode('?', $_SERVER['REQUEST_URI'])[0];
        $url = Tools::getCurrentUrlProtocolPrefix().$_SERVER['HTTP_HOST'].$uriWithoutParams;
        $params = array();
        parse_str($_SERVER['QUERY_STRING'], $params);

        if (null !== $extraParams) {
            foreach ($extraParams as $key => $value) {
                if (null === $value) {
                    unset($params[$key]);
                } else {
                    $params[$key] = $value;
                }
            }
        }

        ksort($params);

        if (null !== $extraParams) {
            foreach ($params as $key => $param) {
                if (null === $param || '' === $param) {
                    unset($params[$key]);
                }
            }
        } else {
            $params = array();
        }

        $queryString = str_replace('%2F', '/', http_build_query($params));

        return $url.($queryString ? "?$queryString" : '');
    }
    public function getXprtPagination()
    {

        $pagination = new Pagination();
        // $pagination
        //     ->setPage($this->p)
        //     ->setPagesCount(
        //         count($this->nbProducts / $this->n)
        //     )
        // ;
        $totalItems = $this->nbProducts;
        $itemsShownFrom = ($this->n * ($this->p - 1)) + 1;
        $itemsShownTo = $this->n * $this->p;
        return array(
            'total_items' => $totalItems,
            'items_shown_from' => $itemsShownFrom,
            'items_shown_to' => ($itemsShownTo <= $totalItems) ? $itemsShownTo : $totalItems,
            'pages' => array_map(function ($link) {
                $link['url'] = $this->updateXprtQueryString(array(
                    'page' => $link['page'],
                ));
                return $link;
            }, $pagination->buildLinks()),
        );
    }
    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $blog_title = Configuration::get(wbBlog::$wbblogshortname."meta_title");
        $breadcrumb['links'][] = array(
            'title' => $blog_title,
            'url' => wbBlog::wbBlogLink(),
        );
        $id_lang = (int)$this->context->language->id;

        if (isset($this->blogcategory->title[$id_lang]) &&
            !empty($this->blogcategory->title[$id_lang])) {
            $category_name = $this->blogcategory->title[$id_lang];
        } elseif (isset($this->blogcategory->name[$id_lang]) &&
            !empty($this->blogcategory->name[$id_lang])) {
            $category_name = $this->blogcategory->name[$id_lang];
        } else {
            $category_name = '';
        }
        $params = array();
        $params['id'] = $this->blogcategory->id_wbcategory ? $this->blogcategory->id_wbcategory : 0;
        $params['rewrite'] = (isset($this->blogcategory->link_rewrite[$id_lang]) &&
            !empty($this->blogcategory->link_rewrite[$id_lang])) ? $this->blogcategory->link_rewrite[$id_lang] : 'category_blog_post';
        $params['page_type'] = 'category';
        $params['subpage_type'] = 'post';
        $category_url = wbBlog::wbBlogCategoryLink($params);
        $breadcrumb['links'][] = array(
            'title' => $category_name,
            'url' => $category_url,
        );
        return $breadcrumb;
    }
}
