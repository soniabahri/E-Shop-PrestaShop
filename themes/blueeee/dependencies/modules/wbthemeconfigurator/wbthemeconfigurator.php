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
class WbThemeConfigurator extends Module
{
    private $html;
    protected $max_image_size = 1048576;
    protected $default_language;
    protected $languages;
    
    private function loadConfig()
    {
        $themes_colors = array();
        $items_settings = array();
        include(dirname(__FILE__).'/_variables.php');
        $this->themes_colors = $themes_colors;
        $this->items_settings = $items_settings;
    }
    
    public function __construct()
    {
        $this->loadConfig();
        $this->name = 'wbthemeconfigurator';
        $this->tab = 'front_office_features';
        $this->version = '1.1.0';
        $this->bootstrap = true;
        $this->secure_key = Tools::encrypt($this->name);
        $this->default_language = Language::getLanguage(Configuration::get('PS_LANG_DEFAULT'));
        $this->languages = Language::getLanguages();
        $this->author = 'Webibazaar';
        parent::__construct();
        $this->displayName = $this->l('WB Load Script');
        $this->description = $this->l('Load Script Js, Css');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->font_list = Tools::file_get_contents(dirname(__FILE__).'/fonts/'.'googlefont.html');
        $this->module_path = _PS_MODULE_DIR_.$this->name.'/';
        $this->uploads_path = _PS_MODULE_DIR_.$this->name.'/views/img/';
        $this->admin_tpl_path = _PS_MODULE_DIR_.$this->name.'/views/templates/admin/';
        $this->hooks_tpl_path = _PS_MODULE_DIR_.$this->name.'/views/templates/hooks/';
        $this->path_pattern = _PS_MODULE_DIR_.$this->name.'/views/img/patterns/';
        $this->path_background = _PS_MODULE_DIR_.$this->name.'/views/img/backgrounds/';
        $this->pattern_list = array();
        $this->pattern_list = glob($this->path_pattern.'*.png');
        $this->module_key = 'bfa8064b724465caa33c75824aadaa16';
    }

    public function iniSetting()
    {
        $db_setting = array(
            'box_mode' => '0',
            'template' => 'default',
            'cpanel' => 0
        );
        return $db_setting;
    }

    public function install()
    {
        $option = $this->iniSetting();
        if (!parent::install() ||
            !$this->registerHook('displayHeader') ||
            !$this->registerHook('displayFooter') ||
            !$this->registerHook('displayRightSidebar') ||
            !$this->registerHook('displayBackOfficeHeader') ||
            !Configuration::updateValue('WB_TC_THEMES', serialize($this->themes_colors)) ||
            !Configuration::updateValue('WB_TC_OPTIONS', serialize($option)) ||
            !Configuration::updateValue('WB_TC_THEME', 'default') ||
            !Configuration::updateValue('WB_SUB_CAT', '1')) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }
        return true;
    }
    
    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('configure') != $this->name) {
            return;
        }

        $this->context->controller->addCSS($this->_path.'views/css/admin/admin.css');
        $this->context->controller->addCSS($this->_path.'views/css/admin/coltemp.css');
        $this->context->controller->addJquery();
        $this->context->controller->addJS($this->_path.'views/js/admin/admin.js');
    }

    public function hookdisplayHeader()
    {
        $this->context->controller->addCss($this->_path.'views/css/frontend/font-awesome.min.css');
        $this->context->controller->addCss($this->_path.'views/css/frontend/owl.carousel.min.css');
        $this->context->controller->addCss($this->_path.'views/css/frontend/owl.theme.default.min.css');
        $this->context->controller->addCss($this->_path.'views/css/frontend/lightbox.css');
        $this->context->controller->addCss($this->_path.'views/css/frontend/slick.css');
        $this->context->controller->addCss($this->_path.'views/css/frontend/slick-theme.css');
        $this->context->controller->addCss($this->_path.'views/css/frontend/es-slider.css');
        $this->context->controller->addCss($this->_path.'views/css/frontend/animate.css');
        $this->context->controller->addJs($this->_path.'views/js/frontend/owl.carousel.js');
        $this->context->controller->addJs($this->_path.'views/js/frontend/jquery.elevatezoom.js');
        $this->context->controller->addJs($this->_path.'views/js/frontend/jquery.easing.1.3.js');
        $this->context->controller->addJs($this->_path.'views/js/frontend/jquery.eislideshow.js');
        $this->context->controller->addJs($this->_path.'views/js/frontend/jquery.imagesloaded.min.js');
        $this->context->controller->addJs($this->_path.'views/js/frontend/lightbox-2.6.min.js');
        $this->context->controller->addJs($this->_path.'views/js/frontend/slick.js');
        $this->context->controller->addJs($this->_path.'views/js/frontend/slick.min.js');
        $this->context->controller->addJqueryPlugin('cooki-plugin');
        $id_shop = (int)$this->context->shop->id;
        $optionArr = unserialize(Configuration::get('WB_TC_OPTIONS'));
        
        if (isset($optionArr['cpanel'])) {
            $enable_cpanel = $optionArr['cpanel'];
        } else {
            $enable_cpanel = 0;
        }
            
        if ($enable_cpanel == 1) {
            $this->context->controller->addJs($this->_path.'views/js/frontend/setconfig.js');
            $this->context->controller->addCSS($this->_path.'views/css/frontend/demo_frontend.css');
            $this->context->controller->addCSS($this->_path.'views/css/frontend/colorpicker.css');
            $this->html .= '<script type="text/javascript" src="'.$this->_path.'views/js/colorpicker.js"></script>';
        } else {
            if (Configuration::get('WB_TC_THEME') != '') {
                $this->context->controller->addCss(
                    $this->_path.'views/css/'.Configuration::get('WB_TC_THEME').'.css',
                    'all'
                );
            }
        }
        
        $this->context->controller->addCss($this->_path.'views/css/config_'.$id_shop.'.css', 'all');
        $optionArr = unserialize(Configuration::get('WB_TC_OPTIONS'));
            
        if (isset($optionArr['box_mode'])) {
            $box_mode = $optionArr['box_mode'];
        } else {
            $box_mode = 0;
        }
        
        $hide_left_column = false;
        $hide_right_column = true;
        $col_md = 'col-md-3';
        $col_sm = 'col-sm-4';
        $nbItemsPerLine = 4;
        $nbItemsPerLineTablet = 3;
        
        
        $is_rtl = $this->context->language->is_rtl;
        $class_rtl_left = '';
        $class_rtl_right = '';
        $class_rtl_center = '';
        
        if (Configuration::get('PS_LOGO_MOBILE')) {
            $logo_footer = $this->context->link->getMediaLink(
                _PS_IMG_.Configuration::get('PS_LOGO_MOBILE').'?'.Configuration::get('PS_IMG_UPDATE_TIME')
            );
        } else {
            $logo_footer = $this->context->link->getMediaLink(_PS_IMG_.Configuration::get('PS_LOGO'));
        }
        
        $this->context->smarty->assign(array(
            'hasSubCat' => (int)Configuration::get('WB_SUB_CAT'),
            'grid_column' => null,
            'nbItemsPerLine' =>$nbItemsPerLine,
            'nbItemsPerLineTablet'=> $nbItemsPerLineTablet,
            'col_md' =>$col_md,
            'col_sm' =>$col_sm,
            'box_mode'=>$box_mode,
            'class_rtl_left'=>$class_rtl_left,
            'class_rtl_center'=>$class_rtl_center,
            'class_rtl_right'=>$class_rtl_right,
            'logo_footer' => $logo_footer
        ));
        unset($hide_left_column,$hide_right_column,$is_rtl);
        return $this->html;
    }

    public function hookDisplayFooter()
    {
        $color_bgs = array();
        $patterns = array();
        $font_l = array();
        $optionArr = unserialize(Configuration::get('WB_TC_OPTIONS'));
        if (isset($optionArr['cpanel'])) {
            $enable_cpanel = $optionArr['cpanel'];
        } else {
            $enable_cpanel = 0;
        }
        if ($enable_cpanel == 1) {
            foreach ($this->items_settings as $key => $item) {
                $style = $item['attr_css'];
                $note = '';
                if (isset($item['note'])) {
                    $note = $item['note'];
                }
                if (isset($item['frontend']) && $item['frontend'] && $style == 'color') {
                    if ($key != 'body_color') {
                        if (is_string($item['selector'])) {
                            $color_bgs['color_'.$key.''] = array(
                                $item['text'], $note , $item['default_val'], 'selector' => array(
                                    $style => $item['selector']));
                        } else {
                            $color_bgs['color_'.$key.''] = array(
                                $item['text'], $note,  $item['default_val'], 'selector' => $item['selector']);
                        }
                    }
                    if ($key == 'body_color') {
                        $body_col = array(
                            $item['text'],
                            'color_'.$key.'',
                            $note, $item['default_val'],
                            'selector' => array(
                                $style => $item['selector']
                            )
                        );
                    }
                }
                
                if ($item['frontend'] && $style == 'font-family') {
                    $font_l['font_family_'.$key.''] = array($item['text'],$item['selector'], $style);
                }
            }
            
            foreach ($this->pattern_list as $key => $pattern_temp) {
                if (basename($pattern_temp) != 'no_img.jpg') {
                    $patterns[$key] = basename($pattern_temp);
                }
            }
            
            $this->smarty->assign(array(
                'patterns' => $patterns,
                'font_list' => $font_l,
                'color_bgs' => $color_bgs,
                'config_data' => Tools::jsonEncode($color_bgs),
                'templates' => $this->themes_colors,
                'options_admin' => unserialize(Configuration::get('WT_TC_OPTIONS')),
                'font_list_demo' => Tools::file_get_contents(dirname(__FILE__).'/fonts/googlefont_frontend.html'),
                'path_img' => _MODULE_DIR_.$this->name.'/views/img/',
                'body_col' => $body_col,
                'config_body_col' => Tools::jsonEncode($body_col),
            ));
        
            //return $this->display(__FILE__, 'demo_frontend.tpl');
        }
    }
    
    public function hookDisplayRightSidebar()
    {
        /*return $this->display(__FILE__, 'right_slidebar.tpl');*/
    }

    protected function deleteImage($image, $path)
    {
        $file_name = $path.$image;
        
        if (realpath(dirname($file_name)) != realpath($path)) {
            Tools::dieOrLog(sprintf('Could not find upload directory'));
        }

        if ($image != '' && is_file($file_name)) {
            unlink($file_name);
        }
    }

    protected function updateItem()
    {
        $id_item = (int)Tools::getValue('item_id');
        $title = Tools::getValue('item_title');
        $content = Tools::getValue('item_html');

        if (!Validate::isCleanHtml($title, (int)Configuration::get('PS_ALLOW_HTML_IFRAME')) ||
        !Validate::isCleanHtml($content, (int)Configuration::get('PS_ALLOW_HTML_IFRAME'))) {
            $this->context->smarty->assign('error', $this->l('Invalid content'));
            return false;
        }

        $new_image = '';
        $image_w = (is_numeric(Tools::getValue('item_img_w'))) ? (int)Tools::getValue('item_img_w') : '';
        $image_h = (is_numeric(Tools::getValue('item_img_h'))) ? (int)Tools::getValue('item_img_h') : '';
        if (!empty($_FILES['item_img']['name'])) {
            if ($old_image = Db::getInstance()->getValue(
                'SELECT image FROM 
                `'._DB_PREFIX_.'wbthemeconfigurator` 
                WHERE id_item = '.(int)$id_item
            )) {
                if (file_exists(dirname(__FILE__).'/views/img/'.$old_image)) {
                    @unlink(dirname(__FILE__).'/views/img/'.$old_image);
                }
            }
            if (!$image = $this->uploadImage($_FILES['item_img'], $image_w, $image_h)) {
                return false;
            }

            $new_image = 'image = \''.pSQL($image).'\',';
        }

        if (!Db::getInstance()->execute(
            'UPDATE `'._DB_PREFIX_.'wbthemeconfigurator` SET 
                    title = \''.pSQL($title).'\',
                    title_use = '.(int)Tools::getValue('item_title_use').',
                    hook = \''.pSQL(Tools::getValue('item_hook')).'\',
                    url = \''.pSQL(Tools::getValue('item_url')).'\',
                    target = '.(int)Tools::getValue('item_target').',
                    '.$new_image.'
                    active = '.(int)Tools::getValue('item_active').',
                    html = \''.pSQL($content, true).'\'
            WHERE id_item = '.(int)Tools::getValue('item_id')
        )) {
            if ($image = Db::getInstance()->getValue(
                'SELECT image FROM
                `'._DB_PREFIX_.'wbthemeconfigurator`
                WHERE id_item = '.(int)Tools::getValue('item_id')
            )) {
                $this->deleteImage($image, $this->uploads_path);
            }

            $this->context->smarty->assign('error', $this->l('An error occured while saving data.'));

            return false;
        }

        $this->context->smarty->assign('confirmation', $this->l('Successfully updated.'));

        return true;
    }

    protected function uploadImage($image, $image_w = '', $image_h = '', $image_url = '')
    {
        $res = false;

        if (is_array($image) &&
            (ImageManager::validateUpload($image, $this->max_image_size) === false) &&
            ($tmp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS')) &&
            move_uploaded_file($image['tmp_name'], $tmp_name)) {
            $type = Tools::strtolower(Tools::substr(strrchr($image['name'], '.'), 1));
            $img_name = Tools::encrypt($image['name'].sha1(microtime())).'.'.$type;
            Configuration::set('PS_IMAGE_QUALITY', 'png_all');
            if (ImageManager::resize(
                $tmp_name,
                dirname(__FILE__).'/views/img/'.$image_url.$img_name,
                $image_w,
                $image_h
            )) {
                $res = true;
            }
        }

        if (!$res) {
            $this->context->smarty->assign('error', $this->l('An error occurred during the image upload.'));

            return false;
        }

        return $img_name;
    }

    
    public function resetSetting()
    {
        $id_shop = (int)$this->context->shop->id;
        $file = _PS_MODULE_DIR_.$this->name.'/views/css/config_'.$id_shop.'.css';
        file_put_contents($file, '');
    }
    public function saveCSS()
    {
        $option = unserialize(Configuration::get('WB_TC_OPTIONS'));
        $id_shop = (int)$this->context->shop->id;
        $items_settings = $this->items_settings;
        $font_l = array();
        $mystyle = '';
        $style_change = '';
        foreach ($items_settings as $key => $item) {
            $style = $item['attr_css'];
            
            if (is_string($item['selector'])) {
                $style_change .= ''.$item['selector'].'{';
                switch ($style) {
                    case 'font-family':
                        $element = 'font_family_'.$key.'';
                        if (isset($option[$element]) && $option[$element] != '') {
                            $style_change .= ''.$style.':'.$option[$element].';';
                            $font_l[] = $option[$element];
                        }
                        break;
                }
                $style_change .= '}';
            } else {
                $element = 'color_'.$key.'';
                if (isset($option[$element]) && $option[$element] != '') {
                    foreach ($item['selector'] as $key_sel => $item_sel) {
                        $pos = strpos($key_sel, '_');
                        if ($pos !== false) {
                            $arr_key_sel = explode('_', $key_sel);
                            $key_sel = $arr_key_sel[0];
                            $darkenV = (int)$arr_key_sel[1];
                            $new_color = $this->adjustColorLightenDarken($option[$element], $darkenV);
                            $style_change .= ''.$item_sel.'{';
                            $style_change .= ''.$key_sel.':'.$new_color.';';
                            $style_change .= '}';
                        } else {
                            $style_change .= ''.$item_sel.'{';
                            $style_change .= ''.$key_sel.':'.$option[$element].';';
                            $style_change .= '}';
                        }
                    }
                }
            }
        }
                
        foreach ($font_l as $font_i) {
            $str = str_replace(' ', '+', $font_i);
            $mystyle .= '@import url(https://fonts.googleapis.com/css?family='.$str.');';
        }
        $mystyle .= $style_change;
        
        $optionArr = unserialize(Configuration::get('WT_TC_OPTIONS'));
        if (isset($optionArr['box_mode'])) {
            $box_mode = $optionArr['box_mode'];
        } else {
            $box_mode = 0;
        }
        
        if ($box_mode == 1) {
            $mystyle .= '.box-mode #page{box-shadow: 0 0 8px #666666;}';
        }
        $file = _PS_MODULE_DIR_.$this->name.'/views/css/config_'.$id_shop.'.css';
        file_put_contents($file, $mystyle);
    }

    public function adjustColorLightenDarken($color_code, $percentage_adjuster = 0)
    {
        $percentage_adjuster = round($percentage_adjuster / 100, 2);
        if (is_array($color_code)) {
            $r = $color_code['r'] - (round($color_code['r']) * $percentage_adjuster);
            $g = $color_code['g'] - (round($color_code['g']) * $percentage_adjuster);
            $b = $color_code['b'] - (round($color_code['b']) * $percentage_adjuster);
            return array(
                'r'=> round(max(0, min(255, $r))),'g'=> round(max(0, min(255, $g))),'b'=> round(max(0, min(255, $b)))
            );
        } elseif (preg_match('/#/', $color_code)) {
            $hex = str_replace('#', '', $color_code);
            $r = (Tools::strlen($hex) == 3)?
            hexdec(Tools::substr($hex, 0, 1).Tools::substr($hex, 0, 1)):hexdec(Tools::substr($hex, 0, 2));
            $g = (Tools::strlen($hex) == 3)?
            hexdec(Tools::substr($hex, 1, 1).Tools::substr($hex, 1, 1)):hexdec(Tools::substr($hex, 2, 2));
            $b = (Tools::strlen($hex) == 3)?
            hexdec(Tools::substr($hex, 2, 1).Tools::substr($hex, 2, 1)):hexdec(Tools::substr($hex, 4, 2));
            $r = round($r - ($r * $percentage_adjuster));
            $g = round($g - ($g * $percentage_adjuster));
            $b = round($b - ($b * $percentage_adjuster));
            return '#'.str_pad(
                dechex(
                    max(
                        0,
                        min(
                            255,
                            $r
                        )
                    )
                ),
                2,
                '0',
                STR_PAD_LEFT
            ).str_pad(
                dechex(
                    max(
                        0,
                        min(
                            255,
                            $g
                        )
                    )
                ),
                2,
                '0',
                STR_PAD_LEFT
            ).str_pad(
                dechex(
                    max(
                        0,
                        min(
                            255,
                            $b
                        )
                    )
                ),
                2,
                '0',
                STR_PAD_LEFT
            );
        }
    }
    
    protected function addItem()
    {
        $title = Tools::getValue('item_title');
        $content = Tools::getValue('item_html');
        if (!Validate::isCleanHtml($title, (int)Configuration::get('PS_ALLOW_HTML_IFRAME')) ||
            !Validate::isCleanHtml($content, (int)Configuration::get('PS_ALLOW_HTML_IFRAME'))) {
            $this->context->smarty->assign('error', $this->l('Invalid content'));
            return false;
        }

        if (!$current_order = (int)Db::getInstance()->getValue(
            'SELECT item_order + 1
            FROM `'._DB_PREFIX_.'wtthemeconfigurator` 
            WHERE 
                    id_shop = '.(int)$this->context->shop->id.'
                    AND id_lang = '.(int)Tools::getValue('id_lang').'
                    AND hook = \''.pSQL(Tools::getValue('item_hook')).'\'
                    ORDER BY item_order DESC'
        )) {
            $current_order = 1;
        }

        $image_w = is_numeric(Tools::getValue('item_img_w')) ? (int)Tools::getValue('item_img_w') : '';
        $image_h = is_numeric(Tools::getValue('item_img_h')) ? (int)Tools::getValue('item_img_h') : '';

        if (!empty($_FILES['item_img']['name'])) {
            if (!$image = $this->uploadImage($_FILES['item_img'], $image_w, $image_h)) {
                return false;
            }
        } else {
            $image = '';
            $image_w = '';
            $image_h = '';
        }

        if (!Db::getInstance()->Execute('
            INSERT INTO `'._DB_PREFIX_.'wbthemeconfigurator` ( 
                    `id_shop`, `id_lang`, `item_order`, `title`,
                    `title_use`, `hook`, `url`, `target`, `image`,`html`, `active`
            ) VALUES ( 
                    \''.(int)$this->context->shop->id.'\',
                    \''.(int)Tools::getValue('id_lang').'\',
                    \''.(int)$current_order.'\',
                    \''.pSQL($title).'\',
                    \''.(int)Tools::getValue('item_title_use').'\',
                    \''.pSQL(Tools::getValue('item_hook')).'\',
                    \''.pSQL(Tools::getValue('item_url')).'\',
                    \''.(int)Tools::getValue('item_target').'\',
                    \''.pSQL($image).'\',
                    \''.pSQL($content, true).'\',
                    1)
            ')) {
            if (!Tools::isEmpty($image)) {
                $this->deleteImage($image, $this->uploads_path);
            }

            $this->context->smarty->assign('error', $this->l('An error occured while saving data.'));

            return false;
        }

        $this->context->smarty->assign('confirmation', $this->l('New item added successfull.'));

        return true;
    }


    public function renderConfigurationFormColor()
    {
        $this->context->controller->addCss($this->_path.'views/css/admin/colorpicker.css', 'all');
        $this->context->controller->addJs($this->_path.'views/js/colorpicker.js');
        $this->context->controller->addJs($this->_path.'views/js/custom.js');
        $submit_action = 'submitColor';
        $postAction = 'index.php?tab=AdminModules&configure='.$this->name.'&token='.Tools::getAdminTokenLite(
            'AdminModules'
        ).'&tab_module=other&module_name='.$this->name.'';
        $pattern_list = array();
        foreach ($this->pattern_list as $pattern) {
            if (basename($pattern) != 'no_img.jpg') {
                $pattern_list[basename($pattern)] = _MODULE_DIR_.$this->name.'/views/img/patterns/'.basename($pattern);
            }
        }
        $bg_colors = array();
        $fonts = array();
        foreach ($this->items_settings as $key => $item_setting) {
            if ($item_setting['attr_css'] == 'color') {
                $bg_colors[$key] = $item_setting;
            }
            if ($item_setting['attr_css'] == 'font-family') {
                $fonts[$key] = $item_setting;
            }
        }
        $path_img = _MODULE_DIR_.$this->name.'/views/img/';
        $this->context->smarty->assign('postAction', $postAction);
        $this->context->smarty->assign('submit_action', $submit_action);
        
        $this->context->smarty->assign('pattern_list', $pattern_list);
        $this->context->smarty->assign('templates', $this->themes_colors);
        $this->context->smarty->assign('template_current', Configuration::get('WB_TC_THEME'));
        $this->context->smarty->assign('items_settings', $this->items_settings);
        $this->context->smarty->assign('bg_colors', $bg_colors);
        $this->context->smarty->assign('fonts', $fonts);
        $this->context->smarty->assign('options', unserialize(Configuration::get('WB_TC_OPTIONS')));
        $this->context->smarty->assign('font_list', $this->font_list);
        $this->context->smarty->assign('path_img', $path_img);
        return $this->display(__FILE__, 'views/templates/admin/setting_theme.tpl');
    }
    
    private function saveConfigSetting($items_settings)
    {
        $result = array();
        $options = unserialize(Configuration::get('WB_TC_OPTIONS'));
        $arrColumn = array('box_mode','template','cpanel');
        foreach ($arrColumn as $item) {
            if (Tools::getValue(''.$item.'') != '') {
                $result[''.$item.''] = Tools::getValue(''.$item.'');
            }
        }
        
        foreach ($items_settings as $key => $item) {
            switch ($item['attr_css']) {
                case 'color':
                    if (Tools::getValue('color_'.$key.'') != $item['default_val']) {
                        $result['color_'.$key.''] = Tools::getValue('color_'.$key.'');
                    } else {
                        $result['color_'.$key.''] = '';
                    }
                    break;
                case 'font-family':
                    $result['font_family_'.$key.''] = Tools::getValue('font_family_'.$key.'');
                    break;
            }
        }
        unset($options);
        return $result;
    }
}
