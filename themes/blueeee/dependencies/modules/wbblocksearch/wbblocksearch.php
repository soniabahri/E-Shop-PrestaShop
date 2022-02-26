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

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class WbBlockSearch extends Module implements WidgetInterface
{
    private $html;
    public function __construct()
    {
        $this->name = 'wbblocksearch';
        $this->tab = 'search_filter';
        $this->version = '1.1.0';
        $this->author = 'Webibazaar';
        $this->need_instance = 0;
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->getTranslator()->trans(
            'Webi Ajax Live Category Search',
            array(),
            'Modules.WBBockSearch.Admin'
        );
        $this->description = $this->getTranslator()->trans(
            'Show a quick search category to your website..',
            array(),
            'Modules.WBBockSearch.Admin'
        );
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        Configuration::updateValue('NUM_ITEM_DISPLAY', '8');
        if (!parent::install() ||
            !$this->registerHook('displaySearch') ||
            !$this->registerHook('header') ||
            !$this->registerHook('displayTop')) {
            return false;
        }
        return true;
    }
    public function uninstall()
    {
        // Delete configuration
        return Configuration::deleteByName('NUM_ITEM_DISPLAY') && parent::uninstall();
    }
    

    // public function hookdisplayMobileTopSiteMap($params)
    // {
    //     $this->smarty->assign(array('hook_mobile' => true, 'instantsearch' => false));
    //     $params['hook_mobile'] = true;
    //     return $this->hookTop($params);
    // }

    public function hookHeader()
    {
        if (Configuration::get('PS_SEARCH_AJAX')) {
            $this->context->controller->addJqueryPlugin('autocomplete');
        }
        
        $this->context->controller->addJS($this->_path.'views/js/wbblocksearch.js');
        $this->context->controller->addCSS(_THEME_CSS_DIR_.'product_list.css');
        
    
        $this->context->controller->registerStylesheet(
            'modules-wbsearch',
            'modules/'.$this->name.'/views/css/wbsearch.css',
            array(
                'media' => 'all'
            )
        );
        
        if (Configuration::get('PS_SEARCH_AJAX')) {
            Media::addJsDef(
                array(
                    'search_url' => $this->context->link->getPageLink(
                        'search',
                        Tools::usingSecureMode()
                    )
                )
            );
        }
    }

    public function getContent()
    {
            $this->_html='';
           $this->_html .= $this->_postProcess();
            $this->_html .= $this->displayFormOption();
            return $this->html;
    }
    private function _postProcess()
    {
        $errors = array();
        if (Tools::isSubmit('submitSaveOption')) {
            Configuration::updateValue('NUM_ITEM_DISPLAY', Tools::getValue('num_item_display'));
            Tools::redirectAdmin(
                $this->context->link->getAdminLink(
                    'AdminModules',
                    false
                ).'&configure='.$this->name.'&token='.Tools::getAdminTokenLite(
                    'AdminModules'
                ).'&saveOptionConfirmation'
            );
        } elseif (Tools::isSubmit('saveOptionConfirmation')) {
            $this->html = $this->displayConfirmation($this->l('The option has been saved successfully'));
        }
        unset($errors);
    }

    public function displayFormOption()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Option'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Products Displayed:'),
                        'desc' => $this->l('Number of products to be displayed.'),
                        'lang' => false,
                        'name' => 'num_item_display',
                        'cols' => 20,
                        'rows' => 10,
                        'class' => 'fixed-width-xs'
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $this->fields_form = array();
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitSaveOption';
        $helper->currentIndex = $this->context->link->getAdminLink(
            'AdminModules',
            false
        ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValuesOption()
        );
        $this->html .= $helper->generateForm(array($fields_form));
    }

    public function getConfigFieldsValuesOption()
    {
        return array(
            'num_item_display' => Tools::getValue(
                'num_item_display',
                Configuration::get(
                    'NUM_ITEM_DISPLAY'
                )
            )
        );
    }

    public function hookDisplayNav()
    {
        return $this->display(__FILE__, 'wbblocksearch-nav.tpl');
    }

    public function getWidgetVariables($hookName = null, array $configuration = null)
    {
        unset($hookName, $configuration);
        return array(
            'search_category' => $this->getCategoryOption(),
            'categorysearch_type' => 'top',
            'search_query' => (string)Tools::getValue('search_query'),
            'path_ssl' => _PS_BASE_URL_.__PS_BASE_URI__.'modules/'.$this->name,
            'base_ssl' => $this->context->link->getBaseLink().'modules/'.$this->name,
            'search_controller_url' => $this->context->link->getPageLink('search'),
        );
    }
    
    public function renderWidget($hookName = null, array $configuration = null)
    {
            //Media::addJsDef(array('categorysearch_type' => 'top'));
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
 
        unset($hookName, $configuration);
        return $this->fetch('module:'.$this->name.'/views/templates/hook/wbblocksearch-top.tpl', $this->getCacheId());
    }
    
    public function getCategoryOption($id_category = 1, $id_lang = false, $id_shop = false, $recursive = true)
    {
        $html = '';
        $id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
        $category = new Category((int)$id_category, (int)$id_lang, (int)$id_shop);
        if (is_null($category->id)) {
            return;
        }
        if ($recursive) {
            $children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
                $spacer = '';
            if ($category->level_depth > 0) {
                $spacer = str_repeat('-', 2 * ((int)$category->level_depth - 1));
            }
        }
        $shop = (object)Shop::getShop((int)$category->getShopID());
        if ($category->id != Configuration::get('PS_ROOT_CATEGORY')) {
            $html .= '<option value="'.(int)$category->id.'">'.$spacer.$category->name.'</option>';
        }
        if (isset($children) && count($children)) {
            foreach ($children as $child) {
                $html .= $this->getCategoryOption(
                    (int)$child['id_category'],
                    (int)$id_lang,
                    (int)$child['id_shop'],
                    $recursive
                );
            }
        }
        unset($shop);
        return $html;
    }
    
    public function liveSearchProduct($id_cat, $id_lang, $expr, $page_number = 1, $page_size = 1, $order_by = 'position', $order_way = 'asc', $ajax = false, $use_cookie = true, Context $context = null)
    {
        if ($id_cat == 'all') {
            $id_cat = 0;
        }
        
        if (!$context) {
            $context = Context::getContext();
        }
        $db = Db::getInstance(_PS_USE_SQL_SLAVE_);

        // TODO : smart page management
        if ($page_number < 1) {
            $page_number = 1;
        }
        if ($page_size < 1) {
            $page_size = 1;
        }

        if (!Validate::isOrderBy($order_by) || !Validate::isOrderWay($order_way)) {
            return false;
        }

        $intersect_array = array();
        $score_array = array();
        $words = explode(' ', Search::sanitize($expr, $id_lang, false, $context->language->iso_code));

        foreach ($words as $key => $word) {
            if (!empty($word) && Tools::strlen($word) >= (int)Configuration::get('PS_SEARCH_MINWORDLEN')) {
                $word = str_replace(array('%', '_'), array('\\%', '\\_'), $word);
                $start_search = Configuration::get('PS_SEARCH_START') ? '%': '';
                $end_search = Configuration::get('PS_SEARCH_END') ? '': '%';

                $intersect_array[] = 'SELECT si.id_product
                    FROM '._DB_PREFIX_.'search_word sw
                    LEFT JOIN '._DB_PREFIX_.'search_index si ON sw.id_word = si.id_word
                    WHERE sw.id_lang = '.(int)$id_lang.'
                        AND sw.id_shop = '.$context->shop->id.'
                        AND sw.word LIKE
                    '.($word[0] == '-'
                        ? ' \''.$start_search.pSQL(Tools::substr($word, 1, PS_SEARCH_MAX_WORD_LENGTH)).$end_search.'\''
                        : ' \''.$start_search.pSQL(Tools::substr($word, 0, PS_SEARCH_MAX_WORD_LENGTH)).$end_search.'\''
                    );

                if ($word[0] != '-') {
                    $score_array[] = 'sw.word LIKE \''.$start_search.pSQL(
                        Tools::substr(
                            $word,
                            0,
                            PS_SEARCH_MAX_WORD_LENGTH
                        )
                    ).$end_search.'\'';
                }
            } else {
                unset($words[$key]);
            }
        }

        if (!count($words)) {
            return ($ajax ? array() : array('total' => 0, 'result' => array()));
        }

        $score = '';
        if (is_array($score_array) && !empty($score_array)) {
            $score = ',(
                SELECT SUM(weight)
                FROM '._DB_PREFIX_.'search_word sw
                LEFT JOIN '._DB_PREFIX_.'search_index si ON sw.id_word = si.id_word
                WHERE sw.id_lang = '.(int)$id_lang.'
                    AND sw.id_shop = '.$context->shop->id.'
                    AND si.id_product = p.id_product
                    AND ('.implode(' OR ', $score_array).')
            ) position';
        }

        $sql_groups = '';
        if (Group::isFeatureActive()) {
            $groups = FrontController::getCurrentCustomerGroups();
            $sql_groups = 'AND cg.`id_group` '.(count($groups) ? 'IN ('.implode(',', $groups).')' : '= 1');
        }

        $results = $db->executeS('
        SELECT cp.`id_product`
        FROM `'._DB_PREFIX_.'category_product` cp
        '.(Group::isFeatureActive() ? 'INNER JOIN `'._DB_PREFIX_.'category_group` cg ON cp.`id_category` = cg.`id_category`' : '').'
        INNER JOIN `'._DB_PREFIX_.'category` c ON cp.`id_category` = c.`id_category`
        INNER JOIN `'._DB_PREFIX_.'product` p ON cp.`id_product` = p.`id_product`
        '.Shop::addSqlAssociation('product', 'p', false).'
        WHERE c.`active` = 1
        AND product_shop.`active` = 1
        AND product_shop.`active` = 1
        '.($id_cat ? 'AND c.`id_category` = '.$id_cat.'':'').'
        AND product_shop.`visibility` IN ("both", "search")
        AND product_shop.indexed = 1
        '.$sql_groups, true, false);

        $eligible_products = array();
        foreach ($results as $row) {
            $eligible_products[] = $row['id_product'];
        }
        foreach ($intersect_array as $query) {
            $eligible_products2 = array();
            foreach ($db->executeS($query, true, false) as $row) {
                $eligible_products2[] = $row['id_product'];
            }

            $eligible_products = array_intersect($eligible_products, $eligible_products2);
            if (!count($eligible_products)) {
                return ($ajax ? array() : array('total' => 0, 'result' => array()));
            }
        }

        $eligible_products = array_unique($eligible_products);

        $product_pool = '';
        foreach ($eligible_products as $id_product) {
            if ($id_product) {
                $product_pool .= (int)$id_product.',';
            }
        }
        if (empty($product_pool)) {
            return ($ajax ? array() : array('total' => 0, 'result' => array()));
        }
        $product_pool = ((strpos($product_pool, ',') === false) ? (' = '.(int)$product_pool.' ') : (' IN ('.rtrim($product_pool, ',').') '));

        if ($ajax) {
            $sql = 'SELECT DISTINCT p.id_product, pl.name pname, cl.name cname,
                        cl.link_rewrite crewrite, pl.link_rewrite prewrite '.$score.'
                    FROM '._DB_PREFIX_.'product p
                    INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (
                        p.`id_product` = pl.`id_product`
                        AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
                    )
                    '.Shop::addSqlAssociation('product', 'p').'
                    INNER JOIN `'._DB_PREFIX_.'category_lang` cl ON (
                        product_shop.`id_category_default` = cl.`id_category`
                        AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').'
                    )
                    WHERE p.`id_product` '.$product_pool.'
                    ORDER BY position DESC LIMIT 100';
            return $db->executeS($sql, true, false);
        }

        if (strpos($order_by, '.') > 0) {
            $order_by = explode('.', $order_by);
            $order_by = pSQL($order_by[0]).'.`'.pSQL($order_by[1]).'`';
        }
        $alias = '';
        if ($order_by == 'price') {
            $alias = 'product_shop.';
        } elseif (in_array($order_by, array('date_upd', 'date_add'))) {
            $alias = 'p.';
        }
        $sql = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity,
                pl.`description_short`, pl.`available_now`, pl.`available_later`, pl.`link_rewrite`, pl.`name`,
             image_shop.`id_image` id_image, il.`legend`, m.`name` manufacturer_name '.$score.',
                DATEDIFF(
                    p.`date_add`,
                    DATE_SUB(
                        "'.date('Y-m-d').' 00:00:00",
                        INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY
                    )
                ) > 0 new'.(Combination::isFeatureActive() ? ', product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity, IFNULL(product_attribute_shop.`id_product_attribute`,0) id_product_attribute' : '').'
                FROM '._DB_PREFIX_.'product p
                '.Shop::addSqlAssociation('product', 'p').'
                INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (
                    p.`id_product` = pl.`id_product`
                    AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
                )
                '.(Combination::isFeatureActive() ? 'LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
                ON (p.`id_product` = product_attribute_shop.`id_product` AND
                    product_attribute_shop.`default_on` = 1 AND
                    product_attribute_shop.id_shop='.(int)$context->shop->id.')':'').'
                '.Product::sqlStock('p', 0).'
                LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = p.`id_manufacturer`
                LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
                    ON (image_shop.`id_product` = p.`id_product` AND
                        image_shop.cover=1 AND image_shop.id_shop='.(int)$context->shop->id.')
                LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON
                (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
                WHERE p.`id_product` '.$product_pool.'
                GROUP BY product_shop.id_product
                '.($order_by ? 'ORDER BY  '.$alias.$order_by : '').($order_way ? ' '.$order_way : '').'
                LIMIT 1000';
                
        $result = $db->executeS($sql, true, false);

        $sql = 'SELECT COUNT(*)
                FROM '._DB_PREFIX_.'product p
                '.Shop::addSqlAssociation('product', 'p').'
                INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (
                    p.`id_product` = pl.`id_product`
                    AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
                )
                LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = p.`id_manufacturer`
                WHERE p.`id_product` '.$product_pool;
        $total = $db->getValue($sql, false);

        if (!$result) {
            $result_properties = false;
        } else {
            $result_properties = Product::getProductsProperties((int)$id_lang, $result);
        }
        unset($use_cookie);
        return array('total' => $total,'result' => $result_properties);
    }
}
