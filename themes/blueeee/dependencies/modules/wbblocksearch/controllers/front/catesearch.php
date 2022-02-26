<?php
/**
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2019 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class WbBlockSearchCateSearchModuleFrontController extends ModuleFrontController
{
    public $ssl = true;
    public $instant_search;
    public $ajax_search;
    public function __construct()
    {
        parent::__construct();
        $this->context = Context::getContext();
        $this->instant_search = Tools::getValue('instantSearch');
        $this->display_column_left = true;
        $this->display_column_right = false;
        $this->ajax_search = Tools::getValue('ajax_Search');
        if ($this->instant_search || $this->ajax_search) {
            $this->display_header = false;
            $this->display_footer = false;
        }
    }

    public function initContent()
    {
        parent::initContent();
        $this->assign();
    }
    
    public function assign()
    {
        $tpl_tem = 'searchresult.tpl';
        $query = Tools::replaceAccentedChars(urldecode(Tools::getValue('q')));
        $original_query = Tools::getValue('q');
        $id_category = Tools::getValue('id_category');
        if (Tools::getValue('ajax_Search')) {
            $searchResults = Search::find(
                (int)(
                    Tools::getValue(
                        'id_lang'
                    )
                ),
                $query,
                1,
                (int)Tools::getValue(
                    'limit',
                    10
                ),
                'position',
                'desc',
                true
            );
            $results = array();
            foreach ($searchResults as $product) {
                $cover = Product::getCover($product['id_product']);
                $product['product_link'] = $this->context->link->getProductLink(
                    $product['id_product'],
                    $product['prewrite'],
                    $product['crewrite']
                );
                $product['id_category'] = $id_category;
                $product['categories'] = Product::getProductCategories($product['id_product']);
                if ($id_category == 'all' || in_array((int)$id_category, $product['categories'])) {
                    $results[] = $product;
                }
            }

            die(Tools::jsonEncode($results));
        }
        if (Tools::getValue('instantSearch') && !is_array($query)) {
            $this->productSort();
            $this->n = abs((int)(Tools::getValue('n', Configuration::get('PS_PRODUCTS_PER_PAGE'))));
            $this->p = abs((int)(Tools::getValue('p', 1)));
            $search = Search::find(
                $this->context->language->id,
                $query,
                1,
                10,
                'position',
                'desc'
            );
            Hook::exec('actionSearch', array('expr' => $query, 'total' => $search['total']));
            $results = array();
            $index = 0;
            foreach ($search['result'] as $product) {
                $categories_arr = Product::getProductCategories($product['id_product']);
                if ($id_category == 'all' || in_array((int)$id_category, $categories_arr)) {
                    if (($this->p - 1) * $this->n <= $index && $index < $this->p * $this->n) {
                        $results[] = $product;
                    }
                    $index++;
                }
            }
            $nbProducts = $index;
            $this->pagination($nbProducts);
            $this->addColorsToProductList($results);
            $this->context->smarty->assign(array(
                'products' => $results,
                'search_products' => $results,
                'nbProducts' => $search['total'],
                'search_query' => $original_query,
                'instant_search' => $this->instant_search,
                'request'=>$this->context->link->getModuleLink('wbblocksearch', 'catesearch'),
                'homeSize' => Image::getSize(ImageType::getFormatedName('home'))));
        } elseif (($query = Tools::getValue('search_query', Tools::getValue('ref'))) && !is_array($query)) {
            $this->productSort();
            $this->n = abs((int)(Tools::getValue('n', Configuration::get('PS_PRODUCTS_PER_PAGE'))));
            $this->p = abs((int)(Tools::getValue('p', 1)));
            $original_query = $query;
            $query = Tools::replaceAccentedChars(urldecode($query));
            $search = Search::find(
                $this->context->language->id,
                $query,
                $this->p,
                $this->n,
                $this->orderBy,
                $this->orderWay
            );
            foreach ($search['result'] as &$product) {
                $product['link'] .= (
                    strpos(
                        $product['link'],
                        '?'
                    ) === false ? '?' : '&').'search_query='.urlencode($query).'&results='.(int)$search['total'];
            }
            $results = array();
            $id_category = Tools::getValue('search_category', 'all');
            Hook::exec('actionSearch', array('expr' => $query, 'total' => $search['total']));
            $nbProducts = $search['total'];
            $this->context->smarty->assign(
                array(
                    'search_query' => $original_query,
                    'homeSize' => Image::getSize(
                        ImageType::getFormatedName(
                            'home'
                        )
                    )
                )
            );
            if ($id_category == 'all') {
                $this->pagination($nbProducts);
                $this->addColorsToProductList($search['result']);
                $this->context->smarty->assign(
                    array(
                        'products' => $search['result'],
                        'search_products' => $search['result'],
                        'nbProducts' => $search['total'],
                        'nbp' => $this->p,
                        'nbn' => $this->n,
                        'orderby' => $this->orderBy,
                        'orderWay' => $this->orderWay,
                        'request'=>$this->context->link->getModuleLink(
                            'wbblocksearch',
                            'catesearch'
                        )
                    )
                );
            } else {
                $search = Search::find(
                    $this->context->language->id,
                    $query,
                    1,
                    $nbProducts,
                    $this->orderBy,
                    $this->orderWay
                );
                $results = array();
                $index = 0;
                foreach ($search['result'] as $product) {
                    $categories_id = Product::getProductCategories($product['id_product']);
                    if (in_array((int)$id_category, Product::getProductCategories($product['id_product']))) {
                        if (($this->p - 1) * $this->n <= $index && $index < $this->p * $this->n) {
                            $results[] = $product;
                        }
                        $index++;
                    }
                }
                $nbProducts = $index;
                foreach ($results as &$product) {
                    $product['link'] .= (
                        strpos(
                            $product['link'],
                            '?'
                        ) === false ? '?' : '&').'search_query='.urlencode($query).'&results='.(int)$nbProducts;
                }
                $this->pagination($nbProducts);
                $this->addColorsToProductList($results);
                $this->context->smarty->assign(
                    array(
                        'products' => $results,
                        'search_products' => $results,
                        'nbProducts' => $nbProducts,
                        'nbp' => $this->p,
                        'nbn' => $this->n,
                        'orderby' => $this->orderBy,
                        'orderWay' => $this->orderWay,
                        'request'=>$this->context->link->getModuleLink(
                            'wbblocksearch',
                            'catesearch'
                        )
                    )
                );
            }
        } else {
            $this->context->smarty->assign(
                array(
                    'products' => array(),
                    'search_products' => array(),
                    'pages_nb' => 1,
                    'nbProducts' => 0
                )
            );
        }
        
        $this->context->smarty->assign(
            array(
                'add_prod_display' => Configuration::get(
                    'PS_ATTRIBUTE_CATEGORY_DISPLAY'
                ),
                'comparator_max_item' => Configuration::get(
                    'PS_COMPARATOR_MAX_ITEM'
                )
            )
        );

        unset($cover, $categories_id);
        $this->setTemplate($tpl_tem);
    }
    public function displayHeader()
    {
        if (!$this->instant_search && !$this->ajax_search) {
            parent::displayHeader();
        } else {
            $this->context->smarty->assign('static_token', Tools::getToken(false));
        }
    }

    public function displayFooter()
    {
        if (!$this->instant_search && !$this->ajax_search) {
            parent::displayFooter();
        }
    }

    public function setMedia()
    {
        parent::setMedia();

        if (!$this->instant_search && !$this->ajax_search) {
            $this->addCSS(_THEME_CSS_DIR_.'product_list.css');
        }
    }
}
