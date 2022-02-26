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

class SampleDataVMenu
{
    public function initData()
    {
        $return = true;
        $languages = Language::getLanguages(true);
        $id_shop = Configuration::get('PS_SHOP_DEFAULT');
        
        $return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wbmegamenu` (`id_wbmegamenu`, `type_link`, `dropdown`, `type_icon`, `icon`, `align_sub`, `width_sub`, `class`, `active`) VALUES 
        (1, 0, 0, 0, "", "wb-sub-auto", "col-sm-12", "", 1),
        (2, 0, 1, 0, "", "wb-sub-auto", "col-sm-4", "", 1),
        (3, 0, 0, 0, "", "wb-sub-center", "col-sm-6", "", 1),
        (4, 0, 0, 0, "", "wb-sub-bottom", "col-sm-12", "", 1),
        (5, 0, 0, 0, "", "wb-sub-auto", "col-sm-12", "", 1),
        (6, 0, 0, 0, "", "wb-sub-auto", "col-sm-12", "", 1),
        (7, 0, 0, 0, "", "wb-sub-auto", "col-sm-12", "", 1);');
        
        
        
        $return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wbmegamenu_shop` (`id_wbmegamenu`, `id_shop`, `type_link`, `dropdown`, `type_icon`, `icon`, `align_sub`, `width_sub`, `class`, `active`) VALUES 
        (1, '.$id_shop.', 0, 0, 0, "", "wb-sub-auto", "col-sm-12", "", 1),
        (2, '.$id_shop.', 0, 1, 0, "", "wb-sub-auto", "col-sm-4", "", 1),
        (3, '.$id_shop.', 0, 0, 0, "", "wb-sub-center", "col-sm-6", "", 1),
        (4, '.$id_shop.', 0, 0, 0, "", "wb-sub-bottom", "col-sm-12", "", 1),
        (5, '.$id_shop.', 0, 0, 0, "", "wb-sub-auto", "col-sm-12", "", 1),
        (6, '.$id_shop.', 0, 0, 0, "", "wb-sub-auto", "col-sm-12", "", 1),
        (7, '.$id_shop.', 0, 0, 0, "", "wb-sub-auto", "col-sm-12", "", 1);');
        
        
        
        
        $return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wbmegamenu_row` (`id_row`, `id_wbmegamenu`, `class`, `active`) VALUES 
        (1,3,"",1),
        (2,4,"",1);');
        
        $return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wbmegamenu_row_shop` (`id_row`, `id_wbmegamenu`, `id_shop`, `class`, `active`) VALUES 
        (1,3,'.$id_shop.',"",1),
        (2,4,'.$id_shop.',"",1);');
        
        
        
        $return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wbmegamenu_column` (`id_column`, `id_row`, `width`, `class`, `active`) VALUES 
        (1, 1, "col-sm-6", "", 1),
        (2, 1, "col-sm-6", "", 1),
        (3, 2, "col-sm-4", "", 1),
        (4, 2, "col-sm-4", "", 1),
        (7, 2, "col-sm-4", "", 1);');
        
        
        
        $return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wbmegamenu_column_shop` (`id_column`, `id_row`, `id_shop`, `width`, `class`, `active`) VALUES 
        (1, 1, '.$id_shop.', "col-sm-6", "", 1),
        (2, 1, '.$id_shop.', "col-sm-6", "", 1),
        (3, 2, '.$id_shop.', "col-sm-4", "", 1),
        (4, 2, '.$id_shop.', "col-sm-4", "", 1),
        (7, 2, '.$id_shop.', "col-sm-4", "", 1);');
        
        
        
        
        $return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wbmegamenu_item` (`id_item`, `id_column`, `type_link`, `type_item`, `id_product`, `active`) VALUES 
        (1,1,1,"1",0,1),
        (2,1,1,"2",0,1),
        (3,1,1,"2",0,1),
        (4,1,1,"2",0,1),
        (5,1,1,"2",0,1),
        (6,1,1,"2",0,1),
        (7,1,1,"2",0,1),
        (8,1,1,"2",0,1),
        (9,2,1,"1",0,1),
        (10,2,1,"2",0,1),
        (11,2,1,"2",0,1),
        (12,2,1,"2",0,1),
        (13,2,1,"2",0,1),
        (14,2,1,"2",0,1),
        (15,2,1,"2",0,1),
        (16,2,1,"2",0,1),
        (17,3,1,"1",0,1),
        (18,3,1,"2",0,1),
        (19,3,1,"2",0,1),
        (20,3,1,"2",0,1),
        (21,3,1,"2",0,1),
        (22,3,1,"2",0,1),
        (23,4,1,"1",0,1),
        (24,4,1,"2",0,1),
        (25,4,1,"2",0,1),
        (26,4,1,"2",0,1),
        (27,4,1,"2",0,1),
        (28,4,1,"2",0,1),
        (37,7,1,"1",0,1),
        (48,7,1,"2",0,1),
        (49,7,1,"2",0,1),
        (50,7,1,"2",0,1),
        (51,7,1,"2",0,1),
        (52,7,1,"2",0,1);');
        
        
        
        
        $return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wbmegamenu_item_shop` (`id_item`, `id_column`, `id_shop`, `type_link`, `type_item`, `id_product`, `active`) VALUES 
        (1,1,'.$id_shop.',1,1,0,1),
        (2,1,'.$id_shop.',1,2,0,1),
        (3,1,'.$id_shop.',1,2,0,1),
        (4,1,'.$id_shop.',1,2,0,1),
        (5,1,'.$id_shop.',1,2,0,1),
        (6,1,'.$id_shop.',1,2,0,1),
        (7,1,'.$id_shop.',1,2,0,1),
        (8,1,'.$id_shop.',1,2,0,1),
        (9,2,'.$id_shop.',1,1,0,1),
        (10,2,'.$id_shop.',1,2,0,1),
        (11,2,'.$id_shop.',1,2,0,1),
        (12,2,'.$id_shop.',1,2,0,1),
        (13,2,'.$id_shop.',1,2,0,1),
        (14,2,'.$id_shop.',1,2,0,1),
        (15,2,'.$id_shop.',1,2,0,1),
        (16,2,'.$id_shop.',1,2,0,1),
        (17,3,'.$id_shop.',1,1,0,1),
        (18,3,'.$id_shop.',1,2,0,1),
        (19,3,'.$id_shop.',1,2,0,1),
        (20,3,'.$id_shop.',1,2,0,1),
        (21,3,'.$id_shop.',1,2,0,1),
        (22,3,'.$id_shop.',1,2,0,1),
        (23,4,'.$id_shop.',1,1,0,1),
        (24,4,'.$id_shop.',1,2,0,1),
        (25,4,'.$id_shop.',1,2,0,1),
        (26,4,'.$id_shop.',1,2,0,1),
        (27,4,'.$id_shop.',1,2,0,1),
        (28,4,'.$id_shop.',1,2,0,1),
        (37,7,'.$id_shop.',1,1,0,1),
        (48,7,'.$id_shop.',1,2,0,1),
        (49,7,'.$id_shop.',1,2,0,1),
        (50,7,'.$id_shop.',1,2,0,1),
        (51,7,'.$id_shop.',1,2,0,1),
        (52,7,'.$id_shop.',1,2,0,1);');
        
        
        
        
        foreach ($languages as $language) {
            $return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wbmegamenu_lang` (`id_wbmegamenu`, `id_shop`, `id_lang`, `title`, `link`, `subtitle`) VALUES 
            (1,'.$id_shop.','.$language['id_lang'].',"PAGindex","PAGindex",""),
            (2,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (3,'.$id_shop.','.$language['id_lang'].',"CAT4","CAT4",""),
            (4,'.$id_shop.','.$language['id_lang'].',"CAT8","CAT8",""),
            (5,'.$id_shop.','.$language['id_lang'].',"CAT10","CAT10",""),
            (6,'.$id_shop.','.$language['id_lang'].',"CAT7","CAT7",""),
            (7,'.$id_shop.','.$language['id_lang'].',"PAGcontact","PAGcontact","");');
            
            
            
            $return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wbmegamenu_item_lang` (`id_item`, `id_shop`, `id_lang`, `title`, `link`, `text`) VALUES 
            (1,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (2,'.$id_shop.','.$language['id_lang'].',"CAT5","CAT5",""),
            (3,'.$id_shop.','.$language['id_lang'].',"CAT9","CAT9",""),
            (4,'.$id_shop.','.$language['id_lang'].',"CAT5","CAT5",""),
            (5,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (6,'.$id_shop.','.$language['id_lang'].',"CAT7","CAT7",""),
            (7,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (8,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (9,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (10,'.$id_shop.','.$language['id_lang'].',"CAT9","CAT9",""),
            (11,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (12,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (13,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (14,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (15,'.$id_shop.','.$language['id_lang'].',"CAT25","CAT25",""),
            (16,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (17,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (18,'.$id_shop.','.$language['id_lang'].',"CAT5","CAT5",""),
            (19,'.$id_shop.','.$language['id_lang'].',"CAT10","CAT10",""),
            (20,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (21,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (22,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (23,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (24,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (25,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (26,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (27,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (28,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (37,'.$id_shop.','.$language['id_lang'].',"CAT3","CAT3",""),
            (48,'.$id_shop.','.$language['id_lang'].',"CAT4","CAT4",""),
            (49,'.$id_shop.','.$language['id_lang'].',"CAT5","CAT5",""),
            (50,'.$id_shop.','.$language['id_lang'].',"CAT7","CAT7",""),
            (51,'.$id_shop.','.$language['id_lang'].',"CAT8","CAT8",""),
            (52,'.$id_shop.','.$language['id_lang'].',"CAT9","CAT9","");');
        }
        return $return;
    }
}
