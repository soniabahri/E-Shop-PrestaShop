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

class AdminwbcommentController extends ModuleAdminController
{
    public function __construct()
    {
        $this->table = 'wb_comments';
        $this->className = 'wbcommentclass';
        $this->deleted = false;
        $this->module = 'wbblog';
        $this->allow_export = false;
        $this->_defaultOrderWay = 'DESC';
        $this->bootstrap = true;
            parent::__construct();
        $this->fields_list = array(
            'id_wb_comments' => array(
                'title' => $this->l('ID'),
                'width' => 100,
                'type' => 'text',
            ),
            'id_post' => array(
                'title' => $this->l('Post ID'),
                'width' => 100,
                'type' => 'text',
            ),
            'name' => array(
                'title' => $this->l('Name'),
                'width' => 60,
                'type' => 'text',
            ),
            'subject' => array(
                'title' => $this->l('Subject'),
                'width' => 220,
                'type' => 'text',
            ),
            'content' => array(
                'title' => $this->l('Comment'),
                'width' => 100,
                'type' => 'text',
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
    public function renderList()
    {
        return parent::renderList();
    }
}
