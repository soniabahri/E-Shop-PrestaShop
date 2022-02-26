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

class Link extends LinkCore
{
    public function getImageLink($name, $ids, $type = null, $rollover = null)
    {
        $not_default = false;

        // Check if module is installed, enabled, customer is logged in and watermark logged option is on
        if (Configuration::get('WATERMARK_LOGGED') &&
            (Module::isInstalled('watermark') &&
                Module::isEnabled('watermark')) &&
            isset(Context::getContext()->customer->id)) {
            $type .= '-'.Configuration::get('WATERMARK_HASH');
        }

        // legacy mode or default image
        $theme = ((Shop::isFeatureActive() &&
            file_exists(_PS_PROD_IMG_DIR_.$ids.($type ? '-'.$type : '').'-'.(int)Context::getContext()->shop->id_theme.'.jpg')) ? '-'.Context::getContext()->shop->id_theme : '');
        if ((Configuration::get('PS_LEGACY_IMAGES')
            && (file_exists(_PS_PROD_IMG_DIR_.$ids.($type ? '-'.$type : '').$theme.'.jpg')))
            || ($not_default = strpos($ids, 'default') !== false)) {
            if ($this->allow == 1 && !$not_default) {
                $uri_path = __PS_BASE_URI__.$ids.($type ? '-'.$type : '').$theme.'/'.$name.'.jpg';
            } else {
                $uri_path = _THEME_PROD_DIR_.$ids.($type ? '-'.$type : '').$theme.'.jpg';
            }
        } else {
            // if ids if of the form id_product-id_image, we want to extract the id_image part
            $split_ids = explode('-', $ids);
            $id_image = (isset($split_ids[1]) ? $split_ids[1] : $split_ids[0]);
            $theme = ((Shop::isFeatureActive() && file_exists(_PS_PROD_IMG_DIR_.Image::getImgFolderStatic($id_image).$id_image.($type ? '-'.$type : '').'-'.(int)Context::getContext()->shop->id_theme.'.jpg')) ? '-'.Context::getContext()->shop->id_theme : '');
        
            if (isset($rollover)) {
                $id_image_cover = Db::getInstance()->getRow(
                    'SELECT `id_image` FROM '._DB_PREFIX_.'image_shop WHERE id_product = '.$rollover.' AND
                    id_shop = '.(int)Context::getContext()->shop->id.' AND cover = 1'
                );
                if ($id_image_cover['id_image']) {
                    $pos_image_hover = Db::getInstance()->getRow(
                        'SELECT `position` FROM '._DB_PREFIX_.'image  WHERE id_image = '.$id_image_cover['id_image']
                    );

                    $pos_image = Db::getInstance()->executeS(
                        'SELECT `position` FROM '._DB_PREFIX_.'image  as a INNER JOIN
                        '._DB_PREFIX_.'image_shop as b ON
                        (a.id_product = b.id_product AND a.id_image = b.id_image) WHERE a.id_product = '.$rollover.' AND
                        b.id_shop = '.(int)Context::getContext()->shop->id.' ORDER BY a.`position` ASC'
                    );
                    $result_data_pos_image = array();
                    foreach ($pos_image as $value) {
                        $result_data_pos_image[] = (int) $value['position'];
                    }

                    $max_pos_image = Db::getInstance()->getRow(
                        'SELECT MAX(position) FROM '._DB_PREFIX_.'image  as a INNER JOIN
                        '._DB_PREFIX_.'image_shop as b ON
                        (a.id_product = b.id_product AND a.id_image = b.id_image) WHERE a.id_product = '.$rollover.' AND
                        b.id_shop = '.(int)Context::getContext()->shop->id.' ORDER BY a.`position` ASC'
                    );
                    if ($pos_image_hover['position'] < $max_pos_image['MAX(position)']) {
                        for ($i = $pos_image_hover['position']; $i <= $max_pos_image['MAX(position)']; $i++) {
                            if (in_array($i, $result_data_pos_image) && $i > $pos_image_hover['position']) {
                                $pos_image_hover['position'] = $i;
                                break;
                            }
                        }
                    } else {
                        $pos_image_hover['position'] = $result_data_pos_image[0];
                    }
                    
                    $hover_image = Db::getInstance()->getRow(
                        'SELECT id_image FROM '._DB_PREFIX_.'image WHERE id_product = '.$rollover.' AND
                        position = '.$pos_image_hover['position']
                    );
                }
                if (isset($result_data_pos_image) && count($result_data_pos_image) > 1 && $hover_image) {
                    $id_image = array_shift($hover_image);
                } else {
                    return '0';
                }
            }
        
            if ($this->allow == 1) {
                $uri_path = __PS_BASE_URI__.$id_image.($type ? '-'.$type : '').$theme.'/'.$name.'.jpg';
            } else {
                $uri_path = _THEME_PROD_DIR_.Image::getImgFolderStatic($id_image).$id_image.($type ? '-'.$type : '').$theme.'.jpg';
            }
        }

        return $this->protocol_content.Tools::getMediaServer($uri_path).$uri_path;
    }
}
