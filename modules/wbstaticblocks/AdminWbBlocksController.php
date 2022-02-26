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

class AdminWbBlocksController extends ModuleAdminController
{
    protected $id_banner;
    public function __construct()
    {
        $this->table = 'wbstaticblock';
        $this->className = 'Staticblock';
        $this->identifier = 'id_wbstaticblock';
        $this->bootstrap = true;
        $this->lang = true;
        $this->deleted = false;
        $this->colorOnBackground = false;
        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'confirm' => $this->l('Delete selected items?')
            )
        );
        Shop::addTableAssociation($this->table, array('type' => 'shop'));
        $this->context = Context::getContext();

//        $this->fieldImageSettings = array(
//            'name' => 'image',
//            'dir' => 'cms'
//        );
//        $this->imageType = "jpg";
        parent::__construct();
    }

    public function renderList()
    {
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'confirm' => $this->l('Delete selected items?')
            )
        );

        $this->fields_list = array(
            'id_wbstaticblock' => array(
                'title' => $this->l('ID'),
                'align' => 'center',
                'width' => 25,
                'lang' => false
            ),
            'title' => array(
                'title' => $this->l('Title'),
                'width' => 90,
                'lang' => false
            ),
            'identify' => array(
                'title' => $this->l('Identify'),
                'width' => '100',
                'lang' => false
            ),
            'hook_wbition' => array(
                'title' => $this->l('Hook Position'),
                'width' => '300',
                'lang' => false
            ),
            'wborder' => array(
                'title' => $this->l('Order'),
                'width' => '30',
                'lang' => false
            )
        );

//        $this->fields_list['image'] = array(
//            'title' => $this->l('Image'),
//            'width' => 70,
//            "image" => $this->fieldImageSettings["dir"]
//        );
//            
//        $listSlideshows = Staticblock::getSlideshowLists($this->context->language->id);
//        echo "<pre>"; print_r($listSlideshows); die;
        $lists = parent::renderList();
        parent::initToolbar();
        return $lists;
    }
    
    public function renderForm()
    {
        $mod = new wbstaticblocks();
        $listModules = $mod->getListModuleInstalled();
        
        $listHookPosition = array(
            array('hook_position'=> 'display'),
            array('hook_position'=> 'displayTopColumn'),
            array('hook_position'=>'rightColumn'),
            array('hook_position'=> 'displayLeftColumn'),
            array('hook_position'=>'displayHeader'),
            array('hook_position'=>'footer'),
            array('hook_position'=>'home'),
            array('hook_position'=>'displayLeftColumnProduct'),
            array('hook_position'=>'displayFooterDown'),
            array('hook_position'=>'displayFooterAfter'),
            array('hook_position'=>'displayFooterLeft'),
            array('hook_position'=>'displayFooterBefore'),
            array('hook_position'=>'displayNav1'),
            array('hook_position'=>'displayNavFullWidth'),
            array('hook_position'=>'displayHomeBlock'),
        );
        
        $this->fields_form = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('Slideshow'),
                'image' => '../img/admin/cog.gif'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Title:'),
                    'name' => 'title',
                    'size' => 40,
                    'lang' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Identify:'),
                    'name' => 'identify',
                    'size' => 40,
                    'require' => false
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Show/hide title'),
                    'desc' => $this->l('Show/hide title?'),
                    'name' => 'active',
                    'required' => true,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Hook Position:'),
                    'name' => 'hook_position',
                    'required' => true,
                    'options' => array(
                        'query' => $listHookPosition,
                        'id' => 'hook_position',
                        'name' => 'hook_position'
                    ),
                    'desc' => $this->l('Choose the type of the Hooks')
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Show/hide Hook'),
                    'desc' => $this->l('Show/hide Hook?'),
                    'name' => 'showhook',
                    'required' => true,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    ),
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description'),
                    'name' => 'description',
                    'autoload_rte' => true,
                    'lang' => true,
                    'required' => true,
                    'rows' => 5,
                    'cols' => 40,
                    'hint' => $this->l('Invalid characters:') . ' <>;=#{}'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Order:'),
                    'name' => 'wborder',
                    'size' => 40,
                    'require' => false
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Insert Module?'),
                    'desc' => $this->l('Insert module?'),
                    'name' => 'insert_module',
                    'required' => true,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on_module',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off_module',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Modules:'),
                    'name' => 'name_module',
                    'required' => true,
                    'options' => array(
                        'query' => $listModules,
                        'id' => 'name',
                        'name' => 'name'
                    ),
                    'desc' => $this->l('Choose the type of the Module')
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Hook-Modules:'),
                    'name' => 'hook_module',
                    'required' => true,
                    'options' => array(
                        'query' => $listHookPosition,
                        'id' => 'hook_position',
                        'name' => 'hook_position'
                    ),
                    'desc' => $this->l('Choose the type of the Hooks')
                ),
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

        if (!($obj = $this->loadObject(true))) {
            unset($obj);
            return;
        }
        return parent::renderForm();
    }
}
