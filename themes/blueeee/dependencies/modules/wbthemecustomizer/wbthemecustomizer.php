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

if (!defined('_PS_VERSION_')) {
    exit;
}
use PrestaShop\PrestaShop\Adapter\Cart\CartPresenter;
use PrestaShop\PrestaShop\Adapter\ObjectPresenter;
use PrestaShop\PrestaShop\Core\Crypto\Hashing;
use PrestaShop\PrestaShop\Adapter\Configuration as ConfigurationAdapter;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Debug\Debug;

include_once(_PS_MODULE_DIR_ . 'wbthemecustomizer/model/wbThemeCustomizerModel.php');

class WbThemeCustomizer extends Module
{
    private $output = '';

    private $standardConfig = '';
    private $styleConfig = '';
    private $multiLangConfig = '';

    private $bgImageConfig = '';
    private $fontConfig = '';

    private $cssRules = array();
    private $configDefaults = array();
    private $websafeFonts = array();
    private $googleFonts = array();

    public function __construct()
    {
        $this->name = 'wbthemecustomizer';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Webibazaar';
        $this->need_instance = 0;
        $this->secure_key = Tools::encrypt($this->name);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Wb Theme Customizer');
        $this->description = $this->l('Required by author: Webibazaar.');

        $this->defineArrays();
    }

    /* ------------------------------------------------------------- */
    /*  INSTALL THE MODULE
    /* ------------------------------------------------------------- */
    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        return parent::install()
        && $this->registerHook('displayHeader')
        && $this->registerHook('displayFooter')
        && $this->registerHook('quickImageViewer')
        && $this->registerHook('productFooter')
        && $this->createConfigs()
        && $this->createTab();
    }

    /* ------------------------------------------------------------- */
    /*  UNINSTALL THE MODULE
    /* ------------------------------------------------------------- */
    public function uninstall()
    {
        return parent::uninstall()
        && $this->unregisterHook('displayHeader')
        && $this->unregisterHook('displayFooter')
        && $this->unregisterHook('quickImageViewer')
        && $this->unregisterHook('productFooter')
        && $this->deleteConfigs()
        && $this->deleteTab();
    }

    /* ------------------------------------------------------------- */
    /*  CREATE THE TABLES
    /* ------------------------------------------------------------- */
    private function createTables()
    {
        return true;
    }

    /* ------------------------------------------------------------- */
    /*  DELETE THE TABLES
    /* ------------------------------------------------------------- */
    private function deleteTables()
    {
        return true;
    }

    /* ------------------------------------------------------------- */
    /*  CREATE CONFIGS
    /* ------------------------------------------------------------- */
    private function createConfigs()
    {
        $languages = $this->context->language->getLanguages();

        // General Options
        
        $response = Configuration::updateValue('WB_showPanelTool', 1);
        $response &= Configuration::updateValue('WB_mainLayout', 'fullwidth');

        // Header Options
        $response &= Configuration::updateValue('WB_stickyMenu', 1);

        // Font Options
        $response &= Configuration::updateValue('WB_includeCyrillicSubset', 0);
        $response &= Configuration::updateValue('WB_includeGreekSubset', 0);
        $response &= Configuration::updateValue('WB_includeVietnameseSubset', 0);
        $response &= Configuration::updateValue('WB_mainFont', 'Poppins, sans-serif');
        $response &= Configuration::updateValue('WB_titleFont', 'roboto-regular, roboto-bold');

        // Color Options
        $response &= Configuration::updateValue('WB_mainColorScheme', '#80bdea');
        $response &= Configuration::updateValue('WB_activeColorScheme', '#313131');

        // Background Options
        $response &= Configuration::updateValue('WB_backgroundColor', '#fff');
        $response &= Configuration::updateValue('WB_backgroundImage', '');
        $response &= Configuration::updateValue('WB_backgroundRepeat', 'repeat');
        $response &= Configuration::updateValue('WB_backgroundAttachment', 'scroll');
        $response &= Configuration::updateValue('WB_backgroundSize', 'auto');

        $response &= Configuration::updateValue('WB_bodyBackgroundColor', '#fff');
        $response &= Configuration::updateValue('WB_bodyBackgroundImage', '');
        $response &= Configuration::updateValue('WB_bodyBackgroundRepeat', 'repeat');
        $response &= Configuration::updateValue('WB_bodyBackgroundAttachment', 'scroll');
        $response &= Configuration::updateValue('WB_bodyBackgroundSize', 'auto');

        $response &= Configuration::updateValue('WB_breadcrumbBackgroundImage', '');
        // Custom Codes
        $response &= Configuration::updateValue('WB_customCSS', '');
        $response &= Configuration::updateValue('WB_customJS', '');

        // Override Options
        $response &= Configuration::updateValue('PS_TC_ACTIVE', 0);
        $response &= Configuration::updateValue('PS_QUICK_VIEW', 1);
        $response &= Configuration::updateValue('PS_GRID_PRODUCT', 0);

        unset($languages);
        return $response;
    }

    /* ------------------------------------------------------------- */
    /*  DELETE CONFIGS
    /* ------------------------------------------------------------- */
    private function deleteConfigs()
    {
        // General Options
        $response = Configuration::deleteByName('WB_showPanelTool');
        $response &= Configuration::deleteByName('WB_mainLayout');

        // Header Options
        $response &= Configuration::deleteByName('WB_stickyMenu');

        // Font Options
        $response &= Configuration::deleteByName('WB_includeCyrillicSubset');
        $response &= Configuration::deleteByName('WB_includeGreekSubset');
        $response &= Configuration::deleteByName('WB_includeVietnameseSubset');
        $response &= Configuration::deleteByName('WB_mainFont');
        $response &= Configuration::deleteByName('WB_titleFont');

        // Color Options
        $response &= Configuration::deleteByName('WB_mainColorScheme');
        $response &= Configuration::deleteByName('WB_activeColorScheme');

        // Background Options
        $response &= Configuration::deleteByName('WB_backgroundColor');
        $response &= Configuration::deleteByName('WB_backgroundImage');
        $response &= Configuration::deleteByName('WB_backgroundRepeat');
        $response &= Configuration::deleteByName('WB_backgroundAttachment');
        $response &= Configuration::deleteByName('WB_backgroundSize');

        $response &= Configuration::deleteByName('WB_bodyBackgroundColor');
        $response &= Configuration::deleteByName('WB_bodyBackgroundImage');
        $response &= Configuration::deleteByName('WB_bodyBackgroundRepeat');
        $response &= Configuration::deleteByName('WB_bodyBackgroundAttachment');
        $response &= Configuration::deleteByName('WB_bodyBackgroundSize');

        $response &= Configuration::deleteByName('WB_breadcrumbBackgroundImage');
        // Custom Codes
        $response &= Configuration::deleteByName('WB_customCSS');
        $response &= Configuration::deleteByName('WB_customJS');

        return $response;
    }

    /* ------------------------------------------------------------- */
    /*  INSTALL DEMO DATA
    /* ------------------------------------------------------------- */
    private function installDemoData()
    {
        return true;
    }

    /* ------------------------------------------------------------- */
    /*  CREATE THE TAB MENU
    /* ------------------------------------------------------------- */
    private function createTab()
    {
        $response = true;

        // First check for parent tab
        $parentTabID = Tab::getIdFromClassName('AdminWbMenu');

        if ($parentTabID) {
            $parentTab = new Tab($parentTabID);
        } else {
            $parentTab = new Tab();
            $parentTab->active = 1;
            $parentTab->name = array();
            $parentTab->class_name = "AdminWbMenu";
            foreach (Language::getLanguages() as $lang) {
                $parentTab->name[$lang['id_lang']] = "Wb Extentions";
            }
            $parentTab->id_parent = 0;
            $parentTab->module = $this->name;
            $response &= $parentTab->add();
        }

        // Check for parent tab2
        $parentTab_2ID = Tab::getIdFromClassName('AdminWbMenu2');
        if ($parentTab_2ID) {
            $parentTab_2 = new Tab($parentTab_2ID);
        } else {
            $parentTab_2 = new Tab();
            $parentTab_2->active = 1;
            $parentTab_2->name = array();
            $parentTab_2->class_name = "AdminWbMenu2";
            foreach (Language::getLanguages() as $lang) {
                $parentTab_2->name[$lang['id_lang']] = "WbThemes Configure";
            }
            $parentTab_2->id_parent = $parentTab->id;
            $parentTab_2->module = $this->name;
            $response &= $parentTab_2->add();
        }
        // Created tab
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminWbThemeCustomizerConfig";
        $tab->name = array();
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = "Manage Theme Customizer";
        }
        $tab->id_parent = $parentTab_2->id;
        $tab->module = $this->name;
        $response &= $tab->add();
        return $response;
    }

    /* ------------------------------------------------------------- */
    /*  DELETE THE TAB MENU
    /* ------------------------------------------------------------- */
    private function deleteTab()
    {
        $id_tab = Tab::getIdFromClassName('AdminWbThemeCustomizerConfig');
        $parentTabID = Tab::getIdFromClassName('AdminWbMenu');

        $tab = new Tab($id_tab);
        $tab->delete();

        // Get the number of tabs inside our parent tab
        // If there is no tabs, remove the parent
        $parentTab_2ID = Tab::getIdFromClassName('AdminWbMenu2');
        $tabCount_2 = Tab::getNbTabs($parentTab_2ID);
        if ($tabCount_2 == 0) {
            $parentTab_2 = new Tab($parentTab_2ID);
            $parentTab_2->delete();
        }
        // Get the number of tabs inside our parent tab
        // If there is no tabs, remove the parent
        $tabCount = Tab::getNbTabs($parentTabID);
        if ($tabCount == 0) {
            $parentTab = new Tab($parentTabID);
            $parentTab->delete();
        }

        return true;
    }

    /* ------------------------------------------------------------- */
    /*  DEFINE ARRAYS
    /* ------------------------------------------------------------- */
    private function defineArrays()
    {
        $bgImageDirs = $this->context->link->getMediaLink(_MODULE_DIR_ . $this->name . '/views/img/front/bg/');
        
        $force_ssl = (Configuration::get('PS_SSL_ENABLED'));
        if ($force_ssl) {
            $bgImageDir = str_replace("http:", "https:", $bgImageDirs);
        } else {
            $bgImageDir = $bgImageDirs;
        }

        // CONFIG ARRAYS
        $this->standardConfig = array(
            // General Options
            'WB_showPanelTool',
            'WB_mainLayout',
            
            // Header Options
            'WB_stickyMenu',

            // Font Options
            'WB_includeCyrillicSubset',
            'WB_includeGreekSubset',
            'WB_includeVietnameseSubset'
        );

        $this->styleConfig = array(
            // Background Options
            'WB_backgroundColor',
            'WB_backgroundImage',
            'WB_backgroundRepeat',
            'WB_backgroundAttachment',
            'WB_backgroundSize',

            'WB_bodyBackgroundColor',
            'WB_bodyBackgroundImage',
            'WB_bodyBackgroundRepeat',
            'WB_bodyBackgroundAttachment',
            'WB_bodyBackgroundSize',
            
            'WB_breadcrumbBackgroundImage',

            // Font Options
            'WB_mainFont',
            'WB_titleFont',

            // Color Options
            'WB_mainColorScheme',
            'WB_activeColorScheme',

            // Custom Codes
            'WB_customCSS',
            'WB_customJS'
        );

        // SPECIAL ARRAYS
        // These arrays are only for defining certain config values that needs to be handled differently.
        $this->bgImageConfig = array(
            'WB_backgroundImage',
            'WB_bodyBackgroundImage',
            'WB_breadcrumbBackgroundImage'
        );

        $this->fontConfig = array(
            'WB_mainFont',
            'WB_titleFont'
        );
        // End - SPECIAL ARRAYS

        // CSS AND CONFIG RELATIONS
        $this->cssRules = array(
            // main Background
            'WB_backgroundColor' => array(
                array(
                    'selector' => 'main',
                    'rule' => 'background-color'
                )
            ),
            'WB_backgroundImage' => array(
                array(
                    'selector' => 'main',
                    'rule' => 'background-image',
                    'prefix' => 'url("' . $bgImageDir,
                    'suffix' => '")'
                )
            ),
            'WB_backgroundRepeat' => array(
                array(
                    'selector' => 'main',
                    'rule' => 'background-repeat'
                )
            ),
            'WB_backgroundAttachment' => array(
                array(
                    'selector' => 'main',
                    'rule' => 'background-attachment'
                )
            ),
            'WB_backgroundSize' => array(
                array(
                    'selector' => 'main',
                    'rule' => 'background-size'
                )
            ),

            // Body Background
            'WB_bodyBackgroundColor' => array(
                array(
                    'selector' => 'body',
                    'rule' => 'background-color'
                )
            ),
            'WB_bodyBackgroundImage' => array(
                array(
                    'selector' => 'body',
                    'rule' => 'background-image',
                    'prefix' => 'url("' . $bgImageDir,
                    'suffix' => '")'
                )
            ),
            'WB_bodyBackgroundRepeat' => array(
                array(
                    'selector' => 'body',
                    'rule' => 'background-repeat'
                )
            ),
            'WB_bodyBackgroundAttachment' => array(
                array(
                    'selector' => 'body',
                    'rule' => 'background-attachment'
                )
            ),
            'WB_bodyBackgroundSize' => array(
                array(
                    'selector' => 'body',
                    'rule' => 'background-size'
                )
            ),

            // Font
            'WB_mainFont' => array(
                array(
                    'selector' => 'body',
                    'rule' => 'font-family'
                ),
                array(
                    'selector' => '.ac_results .right-search span, .ac_results .right-search h5',
                    'rule' => 'font-family'
                )
            ),
            'WB_titleFont' => array(
                array(
                    'selector' => '.title_font, .block .title_block, .block h4, #footer .footer-block h4, .page-subheading, #more_info_tabs li a, table#product_comparison tbody tr td.td_empty > span, #create-account_form #SubmitCreate, #login_form #SubmitLogin, .cart_block .cart-buttons a#button_order_cart, #layer_cart .layer_cart_product span.title, #layer_cart .layer_cart_cart span.title, #layer_cart .layer_cart_cart .button-container .btn, .cart_voucher h4, #my-account ul.myaccount-link-list li a',
                    'rule' => 'font-family'
                )
            ),

            // Main Color Scheme
            'WB_mainColorScheme' => array(

                //default-theme.css
                array(
                    'selector' => '#wb_cat_carousel .catf h2 span::before,.catright h1 span,.owl-theme .owl-nav [class*="owl-"]:hover,.cart-c,.wb-product-list .thumbnail-container .button-group .cartb:hover,.thumbnail-container .button-group .wb-compare-button:hover, .thumbnail-container .button-group .quick:hover, .thumbnail-container .button-group .wish:hover,.thumbnail-container .product-flags .new,#search_block_top .btn.button-search,.slideshow-panel .owl-theme .owl-nav .owl-prev,.slideshow-panel .owl-theme .owl-nav .owl-next,.blog_mask .icon,#scroll,.owl-theme .owl-dots .owl-dot span,.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span,.wb-wishlist-product .cartb, .wb-productscompare-item .cartb,.custom-radio input[type="radio"]:checked + span,.custom-checkbox input[type="checkbox"] + span .checkbox-checked,button.usefulness_btn:hover,.product-tab .nav-tabs .nav-item a.active::before,.scroll-box-arrows i:hover,.pagination .page-list li a,.quickview .arrows .arrow-up:hover, .quickview .arrows .arrow-down:hover,.block-social li a:hover,.view-wb-dropdown-additional.show, .view-wb-dropdown-additional:hover,.btn-primary',
                    'rule' => 'background'
                ),

                array(
                    'selector' => '.pro-tab ul li a:hover, .pro-tab ul li a.active,.blogcount span,.bannercap h2 strong,.wb-menu-vertical li.level-1 > a:hover::after, .wb-menu-vertical li.level-1 > a:focus::after,.thumbnail-container .button-group .cartb,#owl-image-slider .slick-dots li.slick-active a,.catright a,.hcart,.product-title a:hover,.currency-selector li.current a,.vedio-bg h1,.wbpc-main .seconds .count, #products .wbpc-main .seconds .count,.pro-tab ul li a.active,.parallex .item h2,.pro-tab li a.active,.wb-menu-vertical li.level-1 > a:hover, .view_more a:hover,.wb-menu-vertical ul li.level-1:hover > a,.page-my-account #content .links a:hover i,.wb-compare-wishlist-button .wish:hover span, .wb-compare-wishlist-button .wish:focus span, .wb-compare-wishlist-button .wb-compare-button:hover span, .wb-compare-wishlist-button .wb-compare-button:focus span,.product-tab .nav-tabs .nav-link.active,.js-terms a,.facet-title,a:hover, a:focus, button:focus,.footer-container li a:hover, .fthr .block:hover, .fthr .data a:hover, .foot-payment li i:hover,.product-title:hover',
                    'rule' => 'color'
                ),

                array(
                    'selector' => '.bannercap::before,.owl-theme .owl-nav [class*="owl-"]:hover,.wb-menu-vertical li.level-1 span:hover::after,.language-selector li.current .lang-flag,.timg,.owl-theme .owl-dots .owl-dot span,.quickview .arrows .arrow-up:hover, .quickview .arrows .arrow-down:hover,.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span,.scroll-box-arrows i:hover,.form-control:focus',
                    'rule' => 'border-color'
                ),

                array(
                    'selector' => '.heading span hr,#blog .read_more:hover hr',
                    'rule' => 'border-top-color'
                ),

                array(
                    'selector' => '.catright a,.wb-menu-vertical .menu-dropdown,.view_menu .more-menu',
                    'rule' => 'border-bottom-color'
                ),

                 array(
                    'selector' => '',
                    'rule' => 'border-right-color'
                ),
                
                array(
                    'selector' => '.block_newsletter svg,.parallex .item svg,.deliveryinfo ul:hover svg,#footer_contact .icon svg,.wb-compare-wishlist-button .wish:hover svg, .wb-compare-wishlist-button .wish:focus svg, .wb-compare-wishlist-button .wb-compare-button:hover svg, .wb-compare-wishlist-button .wb-compare-button:focus svg,.user-info:hover svg, .blockcart:hover svg, .d-search:hover svg, .setting .set:hover svg',
                    'rule' => 'fill'
                )
            ),
            
            // Active Color Scheme
            'WB_activeColorScheme' => array(

                array(
                    'selector' => '',
                    'rule' => 'color'
                )

            ),
        );

        // Config defaults
        $this->configDefaults = array(
            'WB_mainColorScheme' => '#80bdea',
            'WB_activeColorScheme' => '#313131',

            /* Background Options */
            'WB_backgroundColor' => '#fff',
            'WB_backgroundRepeat' => 'repeat',
            'WB_backgroundAttachment' => 'scroll',
            'WB_backgroundSize' => 'auto',

            'WB_bodyBackgroundColor' => '#fff',
            'WB_bodyBackgroundRepeat' => 'repeat',
            'WB_bodyBackgroundAttachment' => 'scroll',
            'WB_bodyBackgroundSize' => 'auto'
        );

        // Web-safe Fonts
        $this->websafeFonts = array('Arial', 'Agency', 'Helveticaneue', 'sans-serif');

        // Google Fonts
        $this->googleFonts = array(
            'ABeeZee' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'Abel' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Abril Fatface' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Aclonica' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Acme' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Actor' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Adamina' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Advent Pro' => array('subsets' => array('latin', 'latin-ext', 'greek'), 'variants' => array('100', '200', '300', '400', '500', '600', '700')),
            'Aguafina Script' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Akronim' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Aladin' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Aldrich' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Alef' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Alegreya' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic', '900', '900italic')),
            'Alegreya SC' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic', '900', '900italic')),
            'Alegreya Sans' => array('subsets' => array('latin', 'latin-ext', 'vietnamese'), 'variants' => array('100', '100italic', '300', '300italic', '400', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic')),
            'Alegreya Sans SC' => array('subsets' => array('latin', 'latin-ext', 'vietnamese'), 'variants' => array('100', '100italic', '300', '300italic', '400', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic')),
            'Alex Brush' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Alfa Slab One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Alice' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Alike' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Alike Angular' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Allan' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Allerta' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Allerta Stencil' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Allura' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Almendra' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Almendra Display' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Almendra SC' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Amarante' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Amaranth' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Amatic SC' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Amethysta' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Anaheim' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Andada' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Andika' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Angkor' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Annie Use Your Telescope' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Anonymous Pro' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'greek'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Antic' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Antic Didone' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Antic Slab' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Anton' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Arapey' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'Arbutus' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Arbutus Slab' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Architects Daughter' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Archivo Black' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Archivo Narrow' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Arimo' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese', 'greek'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Arizonia' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Armata' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Artifika' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Arvo' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Asap' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Asset' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Astloch' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Asul' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Atomic Age' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Aubrey' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Audiowide' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Autour One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Average' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Average Sans' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Averia Gruesa Libre' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Averia Libre' => array('subsets' => array('latin'), 'variants' => array('300', '300italic', '400', 'italic', '700', '700italic')),
            'Averia Sans Libre' => array('subsets' => array('latin'), 'variants' => array('300', '300italic', '400', 'italic', '700', '700italic')),
            'Averia Serif Libre' => array('subsets' => array('latin'), 'variants' => array('300', '300italic', '400', 'italic', '700', '700italic')),
            'Bad Script' => array('subsets' => array('cyrillic', 'latin'), 'variants' => array('400')),
            'Balthazar' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Bangers' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Basic' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Battambang' => array('subsets' => array('khmer'), 'variants' => array('400', '700')),
            'Baumans' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Bayon' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Belgrano' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Belleza' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'BenchNine' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('300', '400', '700')),
            'Bentham' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Berkshire Swash' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Bevan' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Bigelow Rules' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Bigshot One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Bilbo' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Bilbo Swash Caps' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Bitter' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700')),
            'Black Ops One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Bokor' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Bonbon' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Boogaloo' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Bowlby One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Bowlby One SC' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Brawler' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Bree Serif' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Bubblegum Sans' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Bubbler One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Buda' => array('subsets' => array('latin'), 'variants' => array('300')),
            'Buenard' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Butcherman' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Butterfly Kids' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Cabin' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic')),
            'Cabin Condensed' => array('subsets' => array('latin'), 'variants' => array('400', '500', '600', '700')),
            'Cabin Sketch' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Caesar Dressing' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Cagliostro' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Calligraffitti' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Cambo' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Candal' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Cantarell' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Cantata One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Cantora One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Capriola' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Cardo' => array('subsets' => array('greek-ext', 'latin', 'latin-ext', 'greek'), 'variants' => array('400', 'italic', '700')),
            'Carme' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Carrois Gothic' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Carrois Gothic SC' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Carter One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Caudex' => array('subsets' => array('greek-ext', 'latin', 'latin-ext', 'greek'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Cedarville Cursive' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Ceviche One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Changa One' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'Chango' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Chau Philomene One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic')),
            'Chela One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Chelsea Market' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Chenla' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Cherry Cream Soda' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Cherry Swash' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Chewy' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Chicle' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Chivo' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '900', '900italic')),
            'Cinzel' => array('subsets' => array('latin'), 'variants' => array('400', '700', '900')),
            'Cinzel Decorative' => array('subsets' => array('latin'), 'variants' => array('400', '700', '900')),
            'Clicker Script' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Coda' => array('subsets' => array('latin'), 'variants' => array('400', '800')),
            'Coda Caption' => array('subsets' => array('latin'), 'variants' => array('800')),
            'Codystar' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('300', '400')),
            'Combo' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Comfortaa' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'greek'), 'variants' => array('300', '400', '700')),
            'Coming Soon' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Concert One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Condiment' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Content' => array('subsets' => array('khmer'), 'variants' => array('400', '700')),
            'Contrail One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Convergence' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Cookie' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Copse' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Corben' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Courgette' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Cousine' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese', 'greek'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Coustard' => array('subsets' => array('latin'), 'variants' => array('400', '900')),
            'Covered By Your Grace' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Crafty Girls' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Creepster' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Crete Round' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic')),
            'Crimson Text' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '600', '600italic', '700', '700italic')),
            'Croissant One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Crushed' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Cuprum' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Cutive' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Cutive Mono' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Damion' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Dancing Script' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Dangrek' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Dawning of a New Day' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Days One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Delius' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Delius Swash Caps' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Delius Unicase' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Della Respira' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Denk One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Devonshire' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Didact Gothic' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'greek'), 'variants' => array('400')),
            'Diplomata' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Diplomata SC' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Domine' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Donegal One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Doppio One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Dorsa' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Dosis' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('200', '300', '400', '500', '600', '700', '800')),
            'Dr Sugiyama' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Droid Sans' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Droid Sans Mono' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Droid Serif' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Duru Sans' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Dynalight' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'EB Garamond' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'), 'variants' => array('400')),
            'Eagle Lake' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Eater' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Economica' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Electrolize' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Elsie' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '900')),
            'Elsie Swash Caps' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '900')),
            'Emblema One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Emilys Candy' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Engagement' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Englebert' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Enriqueta' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Erica One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Esteban' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Euphoria Script' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Ewert' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Exo' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic')),
            'Exo 2' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic')),
            'Expletus Sans' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic')),
            'Fanwood Text' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'Fascinate' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Fascinate Inline' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Faster One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Fasthand' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Fauna One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Federant' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Federo' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Felipa' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Fenix' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Finger Paint' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Fjalla One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Fjord One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Flamenco' => array('subsets' => array('latin'), 'variants' => array('300', '400')),
            'Flavors' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Fondamento' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic')),
            'Fontdiner Swanky' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Forum' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Francois One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Freckle Face' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Fredericka the Great' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Fredoka One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Freehand' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Fresca' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Frijole' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Fruktur' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Fugaz One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'GFS Didot' => array('subsets' => array('greek'), 'variants' => array('400')),
            'GFS Neohellenic' => array('subsets' => array('greek'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Gabriela' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Gafata' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Galdeano' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Galindo' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Gentium Basic' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Gentium Book Basic' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Geo' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'Geostar' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Geostar Fill' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Germania One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Gilda Display' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Give You Glory' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Glass Antiqua' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Glegoo' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Gloria Hallelujah' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Goblin One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Gochi Hand' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Gorditas' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Goudy Bookletter 1911' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Graduate' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Grand Hotel' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Gravitas One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Great Vibes' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Griffy' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Gruppo' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Gudea' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700')),
            'Habibi' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Hammersmith One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Hanalei' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Hanalei Fill' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Handlee' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Hanuman' => array('subsets' => array('khmer'), 'variants' => array('400', '700')),
            'Happy Monkey' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Headland One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Henny Penny' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Herr Von Muellerhoff' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Holtwood One SC' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Homemade Apple' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Homenaje' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'IM Fell DW Pica' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'IM Fell DW Pica SC' => array('subsets' => array('latin'), 'variants' => array('400')),
            'IM Fell Double Pica' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'IM Fell Double Pica SC' => array('subsets' => array('latin'), 'variants' => array('400')),
            'IM Fell English' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'IM Fell English SC' => array('subsets' => array('latin'), 'variants' => array('400')),
            'IM Fell French Canon' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'IM Fell French Canon SC' => array('subsets' => array('latin'), 'variants' => array('400')),
            'IM Fell Great Primer' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'IM Fell Great Primer SC' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Iceberg' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Iceland' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Imprima' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Inconsolata' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Inder' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Indie Flower' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Inika' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Irish Grover' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Istok Web' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Italiana' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Italianno' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Jacques Francois' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Jacques Francois Shadow' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Jim Nightshade' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Jockey One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Jolly Lodger' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Josefin Sans' => array('subsets' => array('latin'), 'variants' => array('100', '100italic', '300', '300italic', '400', 'italic', '600', '600italic', '700', '700italic')),
            'Josefin Slab' => array('subsets' => array('latin'), 'variants' => array('100', '100italic', '300', '300italic', '400', 'italic', '600', '600italic', '700', '700italic')),
            'Joti One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Judson' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700')),
            'Julee' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Julius Sans One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Junge' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Jura' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'greek'), 'variants' => array('300', '400', '500', '600')),
            'Just Another Hand' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Just Me Again Down Here' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Kameron' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Kantumruy' => array('subsets' => array('khmer'), 'variants' => array('300', '400', '700')),
            'Karla' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Kaushan Script' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Kavoon' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Kdam Thmor' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Keania One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Kelly Slab' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Kenia' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Khmer' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Kite One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Knewave' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Kotta One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Koulen' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Kranky' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Kreon' => array('subsets' => array('latin'), 'variants' => array('300', '400', '700')),
            'Kristi' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Krona One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'La Belle Aurore' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Lancelot' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Lato' => array('subsets' => array('latin'), 'variants' => array('100', '100italic', '300', '300italic', '400', 'italic', '700', '700italic', '900', '900italic')),
            'League Script' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Leckerli One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Ledger' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Lekton' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700')),
            'Lemon' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Libre Baskerville' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700')),
            'Life Savers' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Lilita One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Lily Script One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Limelight' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Linden Hill' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'Lobster' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Lobster Two' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Londrina Outline' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Londrina Shadow' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Londrina Sketch' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Londrina Solid' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Lora' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Love Ya Like A Sister' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Loved by the King' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Lovers Quarrel' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Luckiest Guy' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Lusitana' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Lustria' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Macondo' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Macondo Swash Caps' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Magra' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Maiden Orange' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Mako' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Marcellus' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Marcellus SC' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Marck Script' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Margarine' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Marko One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Marmelad' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Marvel' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Mate' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'Mate SC' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Maven Pro' => array('subsets' => array('latin'), 'variants' => array('400', '500', '700', '900')),
            'McLaren' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Meddon' => array('subsets' => array('latin'), 'variants' => array('400')),
            'MedievalSharp' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Medula One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Megrim' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Meie Script' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Merienda' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Merienda One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Merriweather' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('300', '300italic', '400', 'italic', '700', '700italic', '900', '900italic')),
            'Merriweather Sans' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('300', '300italic', '400', 'italic', '700', '700italic', '800', '800italic')),
            'Metal' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Metal Mania' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Metamorphous' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Metrophobic' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Michroma' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Milonga' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Miltonian' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Miltonian Tattoo' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Miniver' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Miss Fajardose' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Modern Antiqua' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Molengo' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Molle' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('italic')),
            'Monda' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Monofett' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Monoton' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Monsieur La Doulaise' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Montaga' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Montez' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Montserrat' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Montserrat Alternates' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Montserrat Subrayada' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Moul' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Moulpali' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Mountains of Christmas' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Mouse Memoirs' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Mr Bedfort' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Mr Dafoe' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Mr De Haviland' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Mrs Saint Delafield' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Mrs Sheppards' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Muli' => array('subsets' => array('latin'), 'variants' => array('300', '300italic', '400', 'italic')),
            'Mystery Quest' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Neucha' => array('subsets' => array('cyrillic', 'latin'), 'variants' => array('400')),
            'Neuton' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('200', '300', '400', 'italic', '700', '800')),
            'New Rocker' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'News Cycle' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Niconne' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Nixie One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Nobile' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Nokora' => array('subsets' => array('khmer'), 'variants' => array('400', '700')),
            'Norican' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Nosifer' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Nothing You Could Do' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Noticia Text' => array('subsets' => array('latin', 'latin-ext', 'vietnamese'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Noto Sans' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese', 'greek'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Noto Serif' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese', 'greek'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Nova Cut' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Nova Flat' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Nova Mono' => array('subsets' => array('latin', 'greek'), 'variants' => array('400')),
            'Nova Oval' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Nova Round' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Nova Script' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Nova Slim' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Nova Square' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Numans' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Nunito' => array('subsets' => array('latin'), 'variants' => array('300', '400', '700')),
            'Odor Mean Chey' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Offside' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Old Standard TT' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700')),
            'Oldenburg' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Oleo Script' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Oleo Script Swash Caps' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Open Sans' => array(
                'subsets' => array(
                    'cyrillic',
                    'greek-ext',
                    'cyrillic-ext',
                    'latin',
                    'latin-ext',
                    'vietnamese',
                    'greek'
                ),
                'variants' => array(
                    '300',
                    '300italic',
                    '400',
                    'italic',
                    '600',
                    '600italic',
                    '700',
                    '700italic',
                    '800',
                    '800italic'
                )
            ),
            'Open Sans Condensed' => array(
                'subsets' => array(
                    'cyrillic',
                    'greek-ext',
                    'cyrillic-ext',
                    'latin',
                    'latin-ext',
                    'vietnamese',
                    'greek'
                ),
                'variants' => array(
                    '300',
                    '300italic',
                    '700'
                )
            ),
            'Oranienbaum' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Orbitron' => array('subsets' => array('latin'), 'variants' => array('400', '500', '700', '900')),
            'Oregano' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic')),
            'Orienta' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Original Surfer' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Oswald' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('300', '400', '700')),
            'Over the Rainbow' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Overlock' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic', '900', '900italic')),
            'Overlock SC' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Ovo' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Oxygen' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('300', '400', '700')),
            'Oxygen Mono' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'PT Mono' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400')),
            'PT Sans' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'PT Sans Caption' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400', '700')),
            'PT Sans Narrow' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400', '700')),
            'PT Serif' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'PT Serif Caption' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400', 'italic')),
            'Pacifico' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Paprika' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Parisienne' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Passero One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Passion One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700', '900')),
            'Pathway Gothic One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Patrick Hand' => array('subsets' => array('latin', 'latin-ext', 'vietnamese'), 'variants' => array('400')),
            'Patrick Hand SC' => array('subsets' => array('latin', 'latin-ext', 'vietnamese'), 'variants' => array('400')),
            'Patua One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Paytone One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Peralta' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Permanent Marker' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Petit Formal Script' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Petrona' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Philosopher' => array('subsets' => array('cyrillic', 'latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Piedra' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Pinyon Script' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Pirata One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Plaster' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Play' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'greek'), 'variants' => array('400', '700')),
            'Playball' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Playfair Display' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic', '900', '900italic')),
            'Playfair Display SC' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic', '900', '900italic')),
            'Podkova' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Poiret One' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Poller One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Poly' => array('subsets' => array('latin'), 'variants' => array('400', 'italic')),
            'Pompiere' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Pontano Sans' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Port Lligat Sans' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Port Lligat Slab' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Prata' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Preahvihear' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Press Start 2P' => array('subsets' => array('cyrillic', 'latin', 'latin-ext', 'greek'), 'variants' => array('400')),
            'Princess Sofia' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Prociono' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Prosto One' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Puritan' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Purple Purse' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Quando' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Quantico' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Quattrocento' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Quattrocento Sans' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Questrial' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Quicksand' => array('subsets' => array('latin'), 'variants' => array('300', '400', '700')),
            'Quintessential' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Qwigley' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Racing Sans One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Radley' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic')),
            'Raleway' => array('subsets' => array('latin'), 'variants' => array('100', '200', '300', '400', '500', '600', '700', '800', '900')),
            'Raleway Dots' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Rambla' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Rammetto One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Ranchers' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Rancho' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Rationale' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Redressed' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Reenie Beanie' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Revalia' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Ribeye' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Ribeye Marrow' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Righteous' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Risque' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Roboto' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese', 'greek'), 'variants' => array('100', '100italic', '300', '300italic', '400', 'italic', '500', '500italic', '700', '700italic', '900', '900italic')),
            'Roboto Condensed' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese', 'greek'), 'variants' => array('300', '300italic', '400', 'italic', '700', '700italic')),
            'Roboto Slab' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese', 'greek'), 'variants' => array('100', '300', '400', '700')),
            'Rochester' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Rock Salt' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Rokkitt' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Romanesco' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Ropa Sans' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic')),
            'Rosario' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Rosarivo' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic')),
            'Rouge Script' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Ruda' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700', '900')),
            'Rufina' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Ruge Boogie' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Ruluko' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Rum Raisin' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Ruslan Display' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Russo One' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Ruthie' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Rye' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Sacramento' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Sail' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Salsa' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Sanchez' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic')),
            'Sancreek' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Sansita One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Sarina' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Satisfy' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Scada' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Schoolbell' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Seaweed Script' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Sevillana' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Seymour One' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Shadows Into Light' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Shadows Into Light Two' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Shanti' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Share' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Share Tech' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Share Tech Mono' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Shojumaru' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Short Stack' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Siemreap' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Sigmar One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Signika' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('300', '400', '600', '700')),
            'Signika Negative' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('300', '400', '600', '700')),
            'Simonetta' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic', '900', '900italic')),
            'Sintony' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Sirin Stencil' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Six Caps' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Skranji' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '700')),
            'Slackey' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Smokum' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Smythe' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Sniglet' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', '800')),
            'Snippet' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Snowburst One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Sofadi One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Sofia' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Sonsie One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Sorts Mill Goudy' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400', 'italic')),
            'Source Code Pro' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('200', '300', '400', '500', '600', '700', '900')),
            'Source Sans Pro' => array('subsets' => array('latin', 'latin-ext', 'vietnamese'), 'variants' => array('200', '200italic', '300', '300italic', '400', 'italic', '600', '600italic', '700', '700italic', '900', '900italic')),
            'Special Elite' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Spicy Rice' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Spinnaker' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Spirax' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Squada One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Stalemate' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Stalinist One' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Stardos Stencil' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Stint Ultra Condensed' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Stint Ultra Expanded' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Stoke' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('300', '400')),
            'Strait' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Sue Ellen Francisco' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Sunshiney' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Supermercado One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Suwannaphum' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Swanky and Moo Moo' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Syncopate' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Tangerine' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Taprom' => array('subsets' => array('khmer'), 'variants' => array('400')),
            'Tauri' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Telex' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Tenor Sans' => array('subsets' => array('cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Text Me One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'The Girl Next Door' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Tienne' => array('subsets' => array('latin'), 'variants' => array('400', '700', '900')),
            'Tinos' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese', 'greek'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Titan One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Titillium Web' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('200', '200italic', '300', '300italic', '400', 'italic', '600', '600italic', '700', '700italic', '900')),
            'Trade Winds' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Trocchi' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Trochut' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700')),
            'Trykker' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Tulpen One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Ubuntu' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'greek'), 'variants' => array('300', '300italic', '400', 'italic', '500', '500italic', '700', '700italic')),
            'Ubuntu Condensed' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'greek'), 'variants' => array('400')),
            'Ubuntu Mono' => array('subsets' => array('cyrillic', 'greek-ext', 'cyrillic-ext', 'latin', 'latin-ext', 'greek'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Ultra' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Uncial Antiqua' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Underdog' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Unica One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'UnifrakturCook' => array('subsets' => array('latin'), 'variants' => array('700')),
            'UnifrakturMaguntia' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Unkempt' => array('subsets' => array('latin'), 'variants' => array('400', '700')),
            'Unlock' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Unna' => array('subsets' => array('latin'), 'variants' => array('400')),
            'VT323' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Vampiro One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Varela' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Varela Round' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Vast Shadow' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Vibur' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Vidaloka' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Viga' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Voces' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Volkhov' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Vollkorn' => array('subsets' => array('latin'), 'variants' => array('400', 'italic', '700', '700italic')),
            'Voltaire' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Waiting for the Sunrise' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Wallpoet' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Walter Turncoat' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Warnes' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Wellfleet' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Wendy One' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('400')),
            'Wire One' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Yanone Kaffeesatz' => array('subsets' => array('latin', 'latin-ext'), 'variants' => array('200', '300', '400', '700')),
            'Yellowtail' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Yeseva One' => array('subsets' => array('cyrillic', 'latin', 'latin-ext'), 'variants' => array('400')),
            'Yesteryear' => array('subsets' => array('latin'), 'variants' => array('400')),
            'Zeyada' => array('subsets' => array('latin'), 'variants' => array('400'))
        );
    }

    /* ------------------------------------------------------------- */
    /*  GET CONTENT
    /* ------------------------------------------------------------- */
    public function getContent()
    {
        $id_shop = $this->context->shop->id;
        $languages = $this->context->language->getLanguages();
        $errors = array();
        $reset_tables='<form class="import_demo"  method="post" action="'.$this->context->link->getAdminLink('AdminModules', false).'&reset_tables&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"> 
        <button type="submit" class="btn btn-default btn-lg" style="margin-bottom:20px;"><span class="icon icon-refresh"></span>&nbsp;&nbsp;'.$this->l('Refresh Tables').'</button></form>';
        // Load css file for option panel
        $this->context->controller->addCSS(_MODULE_DIR_ . $this->name . '/views/css/admin/wb-admin.css');

        // Load js file for option panel
        $this->context->controller->addJqueryPlugin('wb', _MODULE_DIR_ . $this->name . '/views/js/admin/');

        if (Tools::isSubmit('reset_tables')) {
            $parentTabID = Tab::getIdFromClassName('AdminWbMenu');
            $tables = Db::getInstance()->executeS('
            SELECT id_tab
            FROM `'._DB_PREFIX_.'tab`  
            WHERE `id_parent` = 0 AND active =0 AND id_tab > '.$parentTabID);
            foreach ($tables as $table) {
                Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'tab` WHERE `id_tab` = '.$table['id_tab'].'');
                Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'tab_lang` WHERE `id_tab` = '.$table['id_tab'].'');
            }
        } elseif (Tools::isSubmit('submit' . $this->name)) {// Standard config
            foreach ($this->standardConfig as $config) {
                if (Tools::isSubmit($config)) {
                    Configuration::updateValue($config, Tools::getValue($config));
                }
            }
            // Style config
            foreach ($this->styleConfig as $config) {// Check if the config is a background image
                if (in_array($config, $this->bgImageConfig)) {
                    if (isset($_FILES[$config]) && isset($_FILES[$config]['tmp_name']) && !empty($_FILES[$config]['tmp_name'])) {
                        if ($error = ImageManager::validateUpload($_FILES[$config], Tools::convertBytes(ini_get('upload_max_filesize')))) {
                            $errors[] = $error;
                        } else {
                            $imageName = explode('.', $_FILES[$config]['name']);
                            $imageExt = $imageName[1];
                            $imageName = $imageName[0];
                            $backgroundImageName = $imageName . '-' . $id_shop . '.' . $imageExt;

                            if (!move_uploaded_file($_FILES[$config]['tmp_name'], _PS_MODULE_DIR_ . $this->name . '/views/img/front/bg/' . $backgroundImageName)) {
                                $errors[] = $this->l('File upload error.');
                            } else {
                                Configuration::updateValue($config, $backgroundImageName);
                            }
                        }
                    }
                    continue;
                }
                if (Tools::isSubmit($config)) {
                    Configuration::updateValue($config, Tools::getValue($config));
                }
            }
            // Custom Codes
            if (Tools::isSubmit('WB_customCSS')) {
                Configuration::updateValue('WB_customCSS', Tools::getValue('WB_customCSS'));
            }

            if (Tools::isSubmit('WB_customJS')) {
                Configuration::updateValue('WB_customJS', Tools::getValue('WB_customJS'));
            }
            // Write the configurations to a CSS file
            $response = $this->writeCss();
            if (!$response) {
                $errors[] = $this->l('An error occured while writing the css file!');
            }

            // Prepare the output
            if (count($errors)) {
                $this->output .= $this->displayError(implode('<br />', $errors));
            } else {
                $this->output .= $this->displayConfirmation($this->l('Configuration updated'));
            }
        } elseif (Tools::isSubmit('deleteConfig')) {
            $config = Tools::getValue('deleteConfig');
            $configValue = Configuration::get($config);

            if (file_exists(_PS_MODULE_DIR_ . $this->name . '/views/img/front/bg/' . $configValue)) {
                unlink(_PS_MODULE_DIR_ . $this->name . '/views/img/front/bg/' . $configValue);
            }
            Configuration::updateValue($config, null);
        }
        unset($languages);
        return $reset_tables.$this->output . $this->_displayForm();
    }
    /* ------------------------------------------------------------- */
    /*  DISPLAY CONFIGURATION FORM
    /* ------------------------------------------------------------- */
    private function _displayForm()
    {
        $id_default_lang = $this->context->language->id;
        $languages = $this->context->language->getLanguages();
        $id_shop = $this->context->shop->id;

        // General Options
        $layoutTypes = array(
            array(
                'value' => 'fullwidth',
                'name' => 'FullWidth'
            ),
            array(
                'value' => 'boxed',
                'name' => 'Boxed'
            )
        );

        // Background Options
        $backgroundRepeatOptions = array(
            array(
                'value' => 'repeat-x',
                'name' => 'Repeat-X'
            ),
            array(
                'value' => 'repeat-y',
                'name' => 'Repeat-Y'
            ),
            array(
                'value' => 'repeat',
                'name' => 'Repeat Both'
            ),
            array(
                'value' => 'no-repeat',
                'name' => 'No Repeat'
            )
        );

        $backgroundAttachmentOptions = array(
            array(
                'value' => 'scroll',
                'name' => 'Scroll'
            ),
            array(
                'value' => 'fixed',
                'name' => 'Fixed'
            )
        );

        $backgroundSizeOptions = array(
            array(
                'value' => 'auto',
                'name' => 'Auto'
            ),
            array(
                'value' => 'cover',
                'name' => 'Cover'
            )
        );

        // Font Options
        $fontOptions = array();

        foreach ($this->websafeFonts as $fontName) {
            $fontOptions[] = array(
                'value' => $fontName,
                'name' => $fontName
            );
        }

        foreach ($this->googleFonts as $fontName => $fontInfo) {
            $fontOptions[] = array(
                'value' => $fontName,
                'name' => $fontName
            );
        }

        $fields_form = array(
            'wb-general' => array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('General'),
                        'icon' => 'icon-cog'
                    ),
                    'input' => array(
                        array(
                            'type' => 'switch',
                            'name' => 'WB_showPanelTool',
                            'label' => $this->l('Show paneltool'),
                            'required' => false,
                            'is_bool' => true,
                            'values' => array(
                                array(
                                    'id' => 'showPanelTool_on',
                                    'value' => 1,
                                    'label' => $this->l('On')
                                ),
                                array(
                                    'id' => 'showPanelTool_off',
                                    'value' => 0,
                                    'label' => $this->l('Off')
                                )
                            )
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'WB_mainLayout',
                            'label' => $this->l('Layout type'),
                            'required' => false,
                            'lang' => false,
                            'options' => array(
                                'query' => $layoutTypes,
                                'id' => 'value',
                                'name' => 'name'
                            )
                        )
                    ),
                    // Submit Button
                    'submit' => array(
                        'title' => $this->l('Save'),
                        'name' => 'savewbThemeConfig'
                    )
                )
            ),
            'wb-header' => array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Header'),
                        'icon' => 'icon-cog'
                    ),
                    'input' => array(
                        array(
                            'type' => 'switch',
                            'label' => $this->l('Sticky menu'),
                            'name' => 'WB_stickyMenu',
                            'required' => false,
                            'is_bool' => true,
                            'values' => array(
                                array(
                                    'id' => 'stickymenu_on',
                                    'value' => 1,
                                    'label' => $this->l('On')
                                ),
                                array(
                                    'id' => 'stickymenu_off',
                                    'value' => 0,
                                    'label' => $this->l('Off')
                                )
                            )
                        )
                    ),
                    // Submit Button
                    'submit' => array(
                        'title' => $this->l('Save'),
                        'name' => 'savewbThemeConfig'
                    )
                )
            ),
            'wb-fonts' => array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Fonts'),
                        'icon' => 'icon-cog'
                    ),
                    'input' => array(
                        array(
                            'type' => 'switch',
                            'name' => 'WB_includeCyrillicSubset',
                            'label' => $this->l('Include Cyrillic subsets'),
                            'desc' => $this->l('If the selected font has support for Cyrillic subset, Wbthemes will automatically include it if selected Yes. To see which fonts have Cyrillic subsets support: https://www.google.com/fonts'),
                            'required' => false,
                            'is_bool' => true,
                            'values' => array(
                                array(
                                    'id' => 'cyrillic_on',
                                    'value' => 1,
                                    'label' => $this->l('Include Cyrillic')
                                ),
                                array(
                                    'id' => 'cyrillic_off',
                                    'value' => 0,
                                    'label' => $this->l('Exclude Cyrillic')
                                )
                            )
                        ),
                        array(
                            'type' => 'switch',
                            'name' => 'WB_includeGreekSubset',
                            'label' => $this->l('Include Greek subsets'),
                            'desc' => $this->l('If the selected font has support for Greek subset, Wbthemes will automatically include it if selected Yes. To see which fonts have Greek subsets support: https://www.google.com/fonts'),
                            'required' => false,
                            'is_bool' => true,
                            'values' => array(
                                array(
                                    'id' => 'greek_on',
                                    'value' => 1,
                                    'label' => $this->l('Include Greek')
                                ),
                                array(
                                    'id' => 'greek_off',
                                    'value' => 0,
                                    'label' => $this->l('Exclude Greek')
                                )
                            )
                        ),
                        array(
                            'type' => 'switch',
                            'name' => 'WB_includeVietnameseSubset',
                            'label' => $this->l('Include Vietnamese subset'),
                            'desc' => $this->l('If the selected font has support for Vietnamese subset, Wbthemes will automatically include it if selected Yes. To see which fonts have Vietnamese subset support: https://www.google.com/fonts'),
                            'required' => false,
                            'is_bool' => true,
                            'values' => array(
                                array(
                                    'id' => 'vietnamese_on',
                                    'value' => 1,
                                    'label' => $this->l('Include Vietnamese')
                                ),
                                array(
                                    'id' => 'vietnamese_off',
                                    'value' => 0,
                                    'label' => $this->l('Exclude Vietnamese')
                                )
                            )
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'WB_mainFont',
                            'label' => $this->l('Main Font Family'),
                            'required' => false,
                            'lang' => false,
                            'options' => array(
                                'query' => $fontOptions,
                                'id' => 'value',
                                'name' => 'name'
                            )
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'WB_titleFont',
                            'label' => $this->l('Title Font Family'),
                            'required' => false,
                            'lang' => false,
                            'options' => array(
                                'query' => $fontOptions,
                                'id' => 'value',
                                'name' => 'name'
                            )
                        )
                    ),
                    // Submit Button
                    'submit' => array(
                        'title' => $this->l('Save'),
                        'name' => 'savewbThemeConfig'
                    )
                )
            ),
            'wb-colors' => array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Colors'),
                        'icon' => 'icon-cog'
                    ),
                    'input' => array(
                        array(
                            'type' => 'color',
                            'name' => 'WB_mainColorScheme',
                            'label' => $this->l('Main color scheme'),
                            'size' => 20,
                            'required' => false,
                            'lang' => false
                        ),
                        array(
                            'type' => 'color',
                            'name' => 'WB_activeColorScheme',
                            'label' => $this->l('Active color scheme'),
                            'size' => 20,
                            'required' => false,
                            'lang' => false
                        )
                    ),
                    // Submit Button
                    'submit' => array(
                        'title' => $this->l('Save'),
                        'name' => 'savewbThemeConfig'
                    )
                )
            ),
            'wb-background' => array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Backgrounds'),
                        'icon' => 'icon-cog'
                    ),
                    'input' => array(
                        array(
                            'type' => 'color',
                            'name' => 'WB_backgroundColor',
                            'label' => $this->l('Background color'),
                            'size' => 20,
                            'required' => false,
                            'lang' => false
                        ),
                        array(
                            'type' => 'file',
                            'name' => 'WB_backgroundImage',
                            'label' => $this->l('Background image'),
                            'size' => 20,
                            'required' => false,
                            'lang' => false
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'WB_backgroundRepeat',
                            'label' => $this->l('Background repeat'),
                            'required' => false,
                            'lang' => false,
                            'options' => array(
                                'query' => $backgroundRepeatOptions,
                                'id' => 'value',
                                'name' => 'name'
                            )
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'WB_backgroundAttachment',
                            'label' => $this->l('Background attachment'),
                            'required' => false,
                            'lang' => false,
                            'options' => array(
                                'query' => $backgroundAttachmentOptions,
                                'id' => 'value',
                                'name' => 'name'
                            )
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'WB_backgroundSize',
                            'label' => $this->l('Background size'),
                            'required' => false,
                            'lang' => false,
                            'options' => array(
                                'query' => $backgroundSizeOptions,
                                'id' => 'value',
                                'name' => 'name'
                            )
                        ),
                        array(
                            'type' => 'color',
                            'name' => 'WB_bodyBackgroundColor',
                            'label' => $this->l('Body background color'),
                            'desc' => $this->l('Body background color only visible in "Boxed" mode.'),
                            'size' => 20,
                            'required' => false,
                            'lang' => false
                        ),
                        array(
                            'type' => 'file',
                            'name' => 'WB_bodyBackgroundImage',
                            'label' => $this->l('Body background image'),
                            'desc' => $this->l('Body background image only visible in "Boxed" mode.'),
                            'size' => 20,
                            'required' => false,
                            'lang' => false
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'WB_bodyBackgroundRepeat',
                            'label' => $this->l('Body background repeat'),
                            'required' => false,
                            'lang' => false,
                            'options' => array(
                                'query' => $backgroundRepeatOptions,
                                'id' => 'value',
                                'name' => 'name'
                            )
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'WB_bodyBackgroundAttachment',
                            'label' => $this->l('Body background attachment'),
                            'required' => false,
                            'lang' => false,
                            'options' => array(
                                'query' => $backgroundAttachmentOptions,
                                'id' => 'value',
                                'name' => 'name'
                            )
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'WB_bodyBackgroundSize',
                            'label' => $this->l('Body background size'),
                            'required' => false,
                            'lang' => false,
                            'options' => array(
                                'query' => $backgroundSizeOptions,
                                'id' => 'value',
                                'name' => 'name'
                            )
                        ),
                        array(
                            'type' => 'file',
                            'name' => 'WB_breadcrumbBackgroundImage',
                            'label' => $this->l('Breadcrumb background image'),
                            'size' => 20,
                            'required' => false,
                            'lang' => false
                        )
                    ),
                    // Submit Button
                    'submit' => array(
                        'title' => $this->l('Save'),
                        'name' => 'savewbThemeConfig'
                    )
                )
            ),
            'wb-codes' => array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Custom Codes'),
                        'icon' => 'icon-cog'
                    ),
                    'input' => array(
                        array(
                            'type' => 'textarea',
                            'name' => 'WB_customCSS',
                            'desc' => $this->l('Important Note: Use this area if only there are rules you cannot override with using normal css files. This will add css rules as inline code and it is not the best practice. Try using "custom.css" file located under "themes/[theme_name]/css/" folder to add your custom css rules.'),
                            'rows' => 10,
                            'label' => $this->l('Custom CSS Code'),
                            'required' => false,
                            'lang' => false
                        ),
                        array(
                            'type' => 'textarea',
                            'name' => 'WB_customJS',
                            'rows' => 10,
                            'label' => $this->l('Custom JS Code'),
                            'required' => false,
                            'lang' => false
                        )
                    ),
                    // Submit Button
                    'submit' => array(
                        'title' => $this->l('Save'),
                        'name' => 'savewbThemeConfig'
                    )
                )
            )
        );

        $helper = new HelperForm();

        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;

        $helper->default_form_language = $id_default_lang;
        $helper->allow_employee_form_lang = $id_default_lang;

        $helper->title = $this->displayName;
        $helper->show_toolbar = true;
        $helper->toolbar_scroll = true;
        $helper->submit_action = 'submit' . $this->name;
        $helper->toolbar_btn = array(
            'save' => array(
                'desc' => $this->l('Save'),
                'href' => AdminController::$currentIndex . '&configure=' . $this->name . '&save' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules'),
            )
        );

        foreach ($languages as $language) {
            $helper->languages[] = array(
                'id_lang' => $language['id_lang'],
                'iso_code' => $language['iso_code'],
                'name' => $language['name'],
                'is_default' => ($id_default_lang == $language['id_lang'] ? 1 : 0)
            );
        }

        // Load standard wb values
        foreach ($this->standardConfig as $standardWb) {
            $helper->fields_value[$standardWb] = Configuration::get($standardWb);
        }

        // Load css wb values
        foreach ($this->styleConfig as $cssWb) {
            $helper->fields_value[$cssWb] = Configuration::get($cssWb);
        }

        // Custom variables
        $helper->tpl_vars = array(
            'wbtabs' => $this->_getTabs(),
            'imagePath' => _MODULE_DIR_ . $this->name . '/views/img/front/bg/',
            'shopId' => $id_shop
        );

        return $helper->generateForm($fields_form);
    }


    /* ------------------------------------------------------------- */
    /*  GET TABS
    /* ------------------------------------------------------------- */
    private function _getTabs()
    {
        $tabArray = array(
            'General' => 'fieldset_wb-general',
            'Header' => 'fieldset_wb-header_1',
            'Fonts' => 'fieldset_wb-fonts_2',
            'Colors' => 'fieldset_wb-colors_3',
            'Background' => 'fieldset_wb-background_4',
            'Custom Codes' => 'fieldset_wb-codes_5',
        );

        return $tabArray;
    }

    /* ------------------------------------------------------------- */
    /*  WRITE CSS
    /* ------------------------------------------------------------- */
    private function writeCss()
    {
        $id_shop = $this->context->shop->id;

        $cssFile = _PS_MODULE_DIR_ . $this->name . '/views/css/front/configCss-' . $id_shop . '.css';
        $handle = fopen($cssFile, 'w');

        $config = $this->getThemeConfig();

        // Starting of the cssCode
        $cssCode = '';

        // Read cssRules and create css rules
        foreach ($this->cssRules as $configName => $css) {
            // Check if the config is set, and it's not the default value
            if ($config[$configName] == '') {
                continue;
            }
            if (isset($this->configDefaults[$configName]) && $config[$configName] == $this->configDefaults[$configName]) {
                continue;
            }

            // If the config is a font config then do this and write the css rule for it
            if (in_array($configName, $this->fontConfig)) {
                // Check if the font is one of the web-safe fonts,
                // if it's then just write the basic font-family rule
                if (in_array($config[$configName], $this->websafeFonts)) {
                    foreach ($css as $line) {
                        $cssCode .= $line['selector'] . '{' . $line['rule'] . ':' . (isset($line['prefix']) ? $line['prefix'] : '') . (isset($line['value']) ? $line['value'] : '"' . $config[$configName] . '", "sans-serif"') . (isset($line['suffix']) ? $line['suffix'] : '') . ';}';
                    }
                    continue;
                }

                // If not then do some preparations for google fonts
                // then write the proper css rule
                $googleFontName = str_replace(' ', '+', $config[$configName]);
                $googleFontSubsets = $this->googleFonts[$config[$configName]]['subsets'];
                $googleFontVariants = $this->googleFonts[$config[$configName]]['variants'];

                $isIncludeCyrillic = Configuration::get('WB_includeCyrillicSubset');
                $isIncludeGreek = Configuration::get('WB_includeCyrillicSubset');
                $isIncludeVietnamese = Configuration::get('WB_includeCyrillicSubset');

                $importCode = '@import "//fonts.googleapis.com/css?family='.$googleFontName;

                /* VARIANTS */
                // Include normal (400)
                if (in_array('300', $googleFontVariants)) {
                            $importCode .= ':300';
                    $importCode .= ',400';
                } else {
                    $importCode .= ':400';
                }
                // Include bold if available
                if (in_array('700', $googleFontVariants)) {
                    $importCode .= ',700';
                }

                /* SUBSETS */
                // Include Latin and Latin-ext
                $importCode .= '&subset=latin,latin-ext';

                // Include Cyrillic subsets if they are selected and available for the font
                if ($isIncludeCyrillic) {
                    if (in_array('cyrillic', $googleFontSubsets)) {
                        $importCode .=',cyrillic';
                    }
                    if (in_array('cyrillic-ext', $googleFontSubsets)) {
                        $importCode .=',cyrillic-ext';
                    }
                }

                // Include Greek subsets if they are selected and available for the font
                if ($isIncludeGreek) {
                    if (in_array('greek', $googleFontSubsets)) {
                        $importCode .=',greek';
                    }
                    if (in_array('cyrillic-ext', $googleFontSubsets)) {
                        $importCode .=',greek-ext';
                    }
                }

                // Include Vietnamese subset if it is selected and available for the font
                if ($isIncludeVietnamese && in_array('vietnamese', $googleFontSubsets)) {
                    $importCode .=',greek';
                }

                $importCode .= '";';

                $cssCode = $importCode . $cssCode;

                foreach ($css as $line) {
                    $cssCode .= $line['selector'] . '{' . $line['rule'] . ':' . (isset($line['prefix']) ? $line['prefix'] : '') . (isset($line['value']) ? $line['value'] : '"' . $config[$configName] . '", "Helvetica", "Arial", "sans-serif"') . (isset($line['suffix']) ? $line['suffix'] : '') . ';}';
                }

                continue;
            }

            // Otherwise create the general css rule for it
            foreach ($css as $line) {
                $cssCode .= (isset($line['media']) ? $line['media'].'{' : '') . $line['selector'] . '{' . $line['rule'] . ':' . (isset($line['prefix']) ? $line['prefix'] : '') . (isset($line['value']) ? $line['value'] : $config[$configName]) . (isset($line['suffix']) ? $line['suffix'] : '') . ';}' . (isset($line['media']) ? '}' : '');
            }
        }

        $response = fwrite($handle, $cssCode);

        return $response;
    }
    /* ------------------------------------------------------------- */
    /*  GET THEME CONFIG
    /* ------------------------------------------------------------- */
    private function getThemeConfig($standard = true, $style = true, $multiLang = true)
    {
        $id_default_lang = $this->context->language->id;

        $config = array();

        if ($standard) {
            foreach ($this->standardConfig as $configItem) {
                $config[$configItem] = Configuration::get($configItem);
            }
        }

        if ($style) {
            foreach ($this->styleConfig as $configItem) {
                $config[$configItem] = Configuration::get($configItem);
            }
        }
        unset($multiLang, $id_default_lang);
        return $config;
    }

    /* ------------------------------------------------------------- */
    /*  PREPARE PRODUCT NAVIGATIONS
    /* ------------------------------------------------------------- */
    private function prepProductNav()
    {
        $controller_name = Dispatcher::getInstance()->getController();
        $id_lang = $this->context->language->id;

        // First make sure we have all the stuff we need, so we can get the next/prev product links
        if ($controller_name != 'product' || !Tools::getIsset('id_product')) {
            return false;
        }

        $id_product = Tools::getValue('id_product');
        $product = new Product($id_product, false, $id_lang);

        if (!isset($this->context->cookie->last_visited_category) ||
            (isset($this->context->cookie->last_visited_category) &&
                $this->context->cookie->last_visited_category == '') ||
            !Product::idIsOnCategoryId($id_product, array('0' => array('id_category' => $this->context->cookie->last_visited_category)))
        ) {
            $id_category = $product->id_category_default;
        } else {
            $id_category = $this->context->cookie->last_visited_category;
        }

        $productPos = WbThemeCustomizerModel::findProductPos($id_category, $id_product);
        $productMaxPos = WbThemeCustomizerModel::findProductMaxPos($id_category);
        if (!is_int($productPos) || !is_int($productMaxPos)) {
            return false;
        }

        // Try to get previous product
        $pos = $productPos - 1;

        if ($pos < 0) {
            $prevProductLink = 'firstItem';
        } else {
            for ($pos; $pos >= 0; $pos--) {
                $prevProductID = WbThemeCustomizerModel::getProductIdFromPos($id_category, $pos);
                $prevProduct = new Product($prevProductID, false, $id_lang);

                if (!$prevProduct->active) {
                    $prevProductLink = 'firstItem';
                    continue;
                } else {
                    $prevProductLink = $this->context->link->getProductLink($prevProduct);
                    break;
                }
            }
        }

        // Try to get next product
        $pos = $productPos + 1;

        if ($pos > $productMaxPos) {
            $nextProductLink = 'lastItem';
        } else {
            for ($pos; $pos <= $productMaxPos; $pos++) {
                $nextProductID = WbThemeCustomizerModel::getProductIdFromPos($id_category, $pos);
                $nextProduct = new Product($nextProductID, false, $id_lang);

                if (!$nextProduct->active) {
                    $nextProductLink = 'lastItem';
                    continue;
                } else {
                    $nextProductLink = $this->context->link->getProductLink($nextProduct);
                    break;
                }
            }
        }

        return array(
            'prev' => $prevProductLink,
            'next' => $nextProductLink
        );
    }

    /* ------------------------------------------------------------- */
    /*  PREPARE FOR HOOK
    /* ------------------------------------------------------------- */
    private function prepHook()
    {
        $config = $this->getThemeConfig();
        $controller_name = Dispatcher::getInstance()->getController();

        if ($config) {
            foreach ($config as $key => $value) {
                $this->smarty->assignGlobal($key, $value);
            }
        }
        // $this->context->controller->registerStylesheet(
        //     'font_awesome_css',
        //     '/assets/wb-css/font-awesome/font-awesome.css',
        //     array(
        //         'media' => 'all',
        //         'priority' => 1000
        //     )
        // );
        // $this->context->controller->registerStylesheet(
        //     'wb_style_css',
        //     '/assets/wb-css/wb_style.css',
        //     array(
        //         'media' => 'all',
        //         'priority' => 1000
        //     )
        // );
        $this->smarty->assignGlobal(
            'WB_IMG_LANG',
            $this->context->link->getMediaLink(_THEME_LANG_DIR_)
        );
        // $this->smarty->assignGlobal(
        //     'WB_JQUERY',
        //     $this->context->link->getMediaLink(_THEME_DIR_.'assets/wb-js/jquery-1.11.0.min.js')
        // );
        /* Show paneltool */
        $WB_showPanelTool = Configuration::get('WB_showPanelTool');
        if ($WB_showPanelTool) {
            $this->context->controller->addJS($this->_path.'views/js/front/colorpicker.js');
            $this->context->controller->addJS($this->_path.'views/js/front/jquery.wbcolortool.js');
            $this->context->controller->addCSS(_MODULE_DIR_ . $this->name . '/views/css/front/wb.cltool.css');
            $this->smarty->assignGlobal(
                'WB_PANELTOOL_TPL',
                _PS_MODULE_DIR_.$this->name.'/views/templates/front/colortool.tpl'
            );
        }
        /* LOAD JS */

            // Load custom JS files
        // $this->context->controller->registerJavascript(
        //     'wb-jquery.plugins',
        //     '/assets/wb-js/jquery.plugins.js',
        //     array(
        //         'position' => 'bottom',
        //         'priority' => 10000
        //     )
        // );
        //$productVerticalThumb = Configuration::get('WB_productVerticalThumb');
    //  var_dump($productVerticalThumb);
        // if (isset($productVerticalThumb) && $productVerticalThumb) {
        //     $this->context->controller->registerJavascript(
        //         'wb-themes-jquery.carouFredSel-6.2.1.min',
        //         '/assets/js/wb-js/jquery.carouFredSel-6.2.1.min.js',
        //         array(
        //             'position' => 'bottom',
        //             'priority' => 10000
        //         )
        //     );
        // }
            
        $this->context->controller->registerJavascript(
            'wb-jquery-wb',
            '/assets/js/jquery.wb.js',
            array(
                'position' => 'bottom',
                'priority' => 10000
            )
        );
        $this->context->controller->registerJavascript(
            'wb-jquery.wb_title',
            '/assets/js/jquery.wb_title.js',
            array(
                'position' => 'bottom',
                'priority' => 10000
            )
        );
        // $this->context->controller->registerJavascript(
        //     'wb-fancybox',
        //     '/assets/wb-js/fancybox/jquery.fancybox.js'
        // );
        // $this->context->controller->registerStylesheet(
        //     'wb-fancyboxcss',
        //     '/assets/wb-js/fancybox/jquery.fancybox.css'
        // );
        unset($controller_name);
        return true;
    }


    /* ------------------------------------------------------------- */
    /*  HOOK (displayHeader)
    /* ------------------------------------------------------------- */
    public function hookDisplayHeader($params)
    {
        $this->prepHook($params);
        $id_shop = $this->context->shop->id;
        $this->smarty->assignGlobal('modules_dir_smart', _MODULE_DIR_);
        /* We are loading css files in this hook, because
         * this is the only way to make sure these css files
         * will override any other css files.. Otherwise
         * module positioning will cause a lot of issues.
         */
    /* LOAD JS */
        /* LOAD CSS */
        // Load auto-created css files
        
        $cssFile = 'configCss-' . $id_shop . '.css';
        if (file_exists(_PS_MODULE_DIR_ . $this->name . '/views/css/front/' . $cssFile)) {
            $this->context->controller->registerStylesheet(
                'configCss',
                $this->context->controller->getAssetUriFromLegacyDeprecatedMethod(
                    $this->_path.'views/css/front/' . $cssFile
                ),
                array(
                    'media' => 'all',
                    'priority' => 1001
                )
            );
        } else {
            $this->context->controller->registerStylesheet(
                'configCss',
                $this->context->controller->getAssetUriFromLegacyDeprecatedMethod(
                    $this->_path.'views/css/front/configCSS-default.css'
                ),
                array(
                    'media' => 'all',
                    'priority' => 1001
                )
            );
        }
        // Load custom.css file
        $this->context->controller->addCSS(_THEME_CSS_DIR_ . 'custom.css');
    }
    /* ------------------------------------------------------------- */
    /*  HOOK (productFooter)
    /* ------------------------------------------------------------- */
    public function hookProductFooter($params)
    {
        if (!Configuration::get('WB_productUpsell')) {
            return;
        }
        $id_product = (int)$params['product']->id;
        $product = $params['product'];
        $this->smarty->assign(array(
            'upsellProducts' => $this->getCrossSells($id_product, $this->context->language->id)
        ));
        
        unset($product);
        return $this->display(__FILE__, 'upsellproduct.tpl');
    }
    
    public static function getCrossSells($id_product, $id_lang, $limit = 12)
    {
        if (!$id_product || !$id_lang) {
            return;
        }

        $front = true;
        if (!in_array(Context::getContext()->controller->controller_type, array('front', 'modulefront'))) {
            $front = false;
        }

        $orders = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
        SELECT o.id_order
        FROM '._DB_PREFIX_.'orders o
        LEFT JOIN '._DB_PREFIX_.'order_detail od ON (od.id_order = o.id_order)
        WHERE o.valid = 1 AND od.product_id = '.(int)$id_product);

        if (count($orders)) {
            $list = '';
            foreach ($orders as $order) {
                $list .= (int)$order['id_order'].',';
            }
            $list = rtrim($list, ',');

            $order_products = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
                'SELECT DISTINCT od.product_id, p.id_product, pl.name, pl.link_rewrite, p.reference, i.id_image, product_shop.show_price,
                cl.link_rewrite category, p.ean13, p.out_of_stock, p.id_category_default '.(Combination::isFeatureActive() ? ', IFNULL(product_attribute_shop.id_product_attribute,0) id_product_attribute' : '').'
                FROM '._DB_PREFIX_.'order_detail od
                LEFT JOIN '._DB_PREFIX_.'product p ON (p.id_product = od.product_id)
                '.Shop::addSqlAssociation('product', 'p').
                (Combination::isFeatureActive() ? 'LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
                ON (p.`id_product` = product_attribute_shop.`id_product` AND
                    product_attribute_shop.`default_on` = 1 AND
                    product_attribute_shop.id_shop='.(int)Context::getContext()->shop->id.')':'').'
                LEFT JOIN '._DB_PREFIX_.'product_lang pl ON
                (pl.id_product = od.product_id'.Shop::addSqlRestrictionOnLang('pl').')
                LEFT JOIN '._DB_PREFIX_.'category_lang cl ON
                (cl.id_category = product_shop.id_category_default'.Shop::addSqlRestrictionOnLang('cl').')
                LEFT JOIN '._DB_PREFIX_.'image i ON (i.id_product = od.product_id)
                '.Shop::addSqlAssociation('image', 'i', true, 'image_shop.cover=1').'
                WHERE od.id_order IN ('.$list.')
                    AND pl.id_lang = '.(int)$id_lang.'
                    AND cl.id_lang = '.(int)$id_lang.'
                    AND od.product_id != '.(int)$id_product.'
                    AND product_shop.active = 1'
                    .($front ? ' AND product_shop.`visibility` IN ("both", "catalog")' : '').'
                ORDER BY RAND()
                LIMIT '.(int)$limit.' ',
                true,
                false
            );

            $tax_calc = Product::getTaxCalculationMethod();
            if (is_array($order_products)) {
                foreach ($order_products as &$order_product) {
                    $order_product['image'] = Context::getContext()->link->getImageLink(
                        $order_product['link_rewrite'],
                        (int)$order_product['product_id'].'-'.(int)$order_product['id_image'],
                        ImageType::getFormatedName('home')
                    );
                    $order_product['link'] = Context::getContext()->link->getProductLink(
                        (int)$order_product['product_id'],
                        $order_product['link_rewrite'],
                        $order_product['category'],
                        $order_product['ean13']
                    );
                    if ($tax_calc == 0 || $tax_calc == 2) {
                        $order_product['displayed_price'] = Product::getPriceStatic(
                            (int)$order_product['product_id'],
                            true,
                            null
                        );
                    } elseif ($tax_calc == 1) {
                        $order_product['displayed_price'] = Product::getPriceStatic(
                            (int)$order_product['product_id'],
                            false,
                            null
                        );
                    }
                }
                return Product::getProductsProperties($id_lang, $order_products);
            }
        }
    }
}
