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

class AdminwbcategoryController extends ModuleAdminController
{
    public function __construct()
    {
        $this->table = 'wbcategory';
        $this->className = 'wbcategoryclass';
        $this->lang = true;
        $this->deleted = false;
        $this->module = 'wbblog';
        $this->explicitSelect = true;
        $this->_defaultOrderBy = 'position';
        $this->allow_export = false;
        $this->_defaultOrderWay = 'DESC';
        $this->bootstrap = true;
            if (Shop::isFeatureActive())
            Shop::addTableAssociation($this->table, array('type' => 'shop'));
            parent::__construct();
        $this->fields_list = array(
            'id_wbcategory' => array(
                'title' => $this->l('ID'),
                'width' => 100,
                'type' => 'text',
            ),
            'name' => array(
                    'title' => $this->l('Category Name'),
                    'width' => 60,
                    'type' => 'text',
            ),
            'link_rewrite' => array(
                    'title' => $this->l('URL Rewrite'),
                    'width' => 220,
                    'type' => 'text',
            ),
            'position' => array(
                'title' => $this->l('Position'),
                'align' => 'left',
                'position' => 'position',
            ),
            'active' => array(
                'title' => $this->l('Status'),
                'active' => 'status',
                'type' => 'bool',
                'orderby' => false,
            )
        );
        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'icon' => 'icon-trash',
                'confirm' => $this->l('Delete selected items?')
            )
        );
        parent::__construct();
    }
    public function init()
    {
        parent::init();
        $this->_join = 'LEFT JOIN '._DB_PREFIX_.'wbcategory_shop sbp
        ON a.id_wbcategory=sbp.id_wbcategory && sbp.id_shop
        IN('.implode(',', Shop::getContextListShopID()).')';
        $this->_select = 'sbp.id_shop';
        $this->_defaultOrderBy = 'a.position';
        $this->_defaultOrderWay = 'DESC';
        if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP)
        $this->_group = 'GROUP BY a.id_wbcategory';
        $this->_where = ' AND a.category_type = "category" ';
        $this->_select = 'a.position position';
    }
    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);
        $this->addJqueryUi('ui.widget');
        $this->addJqueryPlugin('tagify');
        $this->addJqueryPlugin('select2');
    }
    public function renderForm()
    {
        $id_wbcategory = Tools::getValue("id_wbcategory");
        $category_img_temp = '';
        if (isset($id_wbcategory) && !empty($id_wbcategory)) {
            $wbcategoryclass = new WbCategoryClass($id_wbcategory);
            if (isset($wbcategoryclass->category_img) && !empty($wbcategoryclass->category_img)) {
                $category_img_temp = '<img src="'.WBBLOG_IMG_URI.$wbcategoryclass->category_img.'" height="110" width="auto"><br>';
            }
        }
        $this->fields_form = array(
            'legend' => array(
                'title' => $this->l('Wb Blog Category'),
            ),
            'input' => array(
                array(
                    'type' => 'hidden',
                    'name' => 'category_type',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Category Name'),
                    'name' => 'name',
                    'id' => 'name', // for copyMeta2friendlyURL compatibility
                    'class' => 'copyMeta2friendlyURL',
                    'desc' => $this->l('Enter Your Category Name'),
                    'lang' => true,
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Category Description'),
                    'name' => 'description',
                    'autoload_rte' => true,
                    'rows' => 5,
                    'cols' => 40,
                    'lang' => true,
                    'desc' => $this->l('Please Enter Category Description'),
                ),
                array(
                    'type' => 'file',
                    'label' => $this->l('Category Feature Image'),
                    'name' => 'category_img',
                    'desc' => $category_img_temp.$this->l('Please upload category feature image from your computer.'),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Select Category Group'),
                    'name' => 'category_group',
                    'options' => array(
                        'query' => wbcategoryclass::serializeCategory(),
                        'id' => 'id',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Meta Title'),
                    'name' => 'title',
                    'desc' => $this->l('Enter Your Category Meta Title for SEO'),
                    'lang' => true,
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Meta Description'),
                    'name' => 'meta_description',
                    'desc' => $this->l('Enter Your Category Meta Description for SEO'),
                    'lang' => true,
                ),
                array(
                    'type' => 'tags',
                    'label' => $this->l('Meta Keyword'),
                    'name' => 'keyword',
                    'desc' => $this->l('Enter Your Category Meta Keyword for SEO. Seperate by comma(,)'),
                    'lang' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('URL Rewrite'),
                    'name' => 'link_rewrite',
                    'desc' => $this->l('Enter Your Category URL for SEO URL'),
                    'lang' => true,
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Status'),
                    'name' => 'active',
                    'required' => false,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    )
                )
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right'
            )
        );
        if (Shop::isFeatureActive()) {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->l('Shop association:'),
                'name' => 'checkBoxShopAsso',
            );
        }
        if (!($wbcategoryclass = $this->loadObject(true))) {
            return;
        }
        if (isset($wbcategoryclass->category_type) && !empty($wbcategoryclass->category_type)) {
            $this->fields_value['category_type'] = $wbcategoryclass->category_type;
        } else {
            $this->fields_value['category_type'] = "category";
        }
        $this->tpl_form_vars = array(
            'active' => $this->object->active,
            'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL')
        );
        Media::addJsDef(
            array(
                'PS_ALLOW_ACCENTED_CHARS_URL' => (int)Configuration::get(
                    'PS_ALLOW_ACCENTED_CHARS_URL'
                )
            )
        );
        return parent::renderForm();
    }
    public function renderList()
    {
        if (isset($this->_filter) && trim($this->_filter) == '') {
            $this->_filter = $this->original_filter;
        }
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        return parent::renderList();
    }
    public function initToolbar()
    {
          parent::initToolbar();
    }
    public function processPosition()
    {
        if ($this->tabAccess['edit'] !== '1') {
            $this->errors[] = Tools::displayError('You do not have permission to edit this.');
        } elseif (!Validate::isLoadedObject(
            $object = new WbCategoryClass(
                (int)Tools::getValue(
                    $this->identifier,
                    Tools::getValue(
                        'id_wbcategory',
                        1
                    )
                )
            )
        ))
        $this->errors[] = Tools::displayError('An error occurred while updating the status for an object.').' <b>'.
        $this->table.'</b> '.Tools::displayError('(cannot load object)');
        if (!$object->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position'))) {
            $this->errors[] = Tools::displayError('Failed to update the position.');
        } else {
            $object->regenerateEntireNtree();
            Tools::redirectAdmin(self::$currentIndex.'&'.$this->table.'Orderby=position&'.$this->table.'Orderway=asc&conf=5'.(($id_wbcategory = (int)Tools::getValue($this->identifier)) ? ('&'.$this->identifier.'='.$id_wbcategory) : '').'&token='.Tools::getAdminTokenLite('Adminwbcategory'));
        }
    }
    public function ajaxProcessUpdatePositions()
    {
        $id_wbcategory = (int)(Tools::getValue('id'));
        $way = (int)(Tools::getValue('way'));
        $positions = Tools::getValue($this->table);
        if (is_array($positions)) {
            foreach ($positions as $key => $value) {
                $pos = explode('_', $value);
                if ((isset($pos[1]) && isset($pos[2])) && ($pos[2] == $id_wbcategory)) {
                    $position = $key + 1;
                    break;
                }
            }
            $wbcategoryclass = new WbCategoryClass($id_wbcategory);
            if (Validate::isLoadedObject($wbcategoryclass)) {
                if (isset($position) && $wbcategoryclass->updatePosition($way, $position)) {
                    Hook::exec('action'.$this->className.'Update');
                    die(true);
                } else {
                    die('{"hasError" : true, errors : "Can not update wbcategoryclass position"}');
                }
            } else {
                die('{"hasError" : true, "errors" : "This wbcategoryclass can not be loaded"}');
            }
        }
    }
}
