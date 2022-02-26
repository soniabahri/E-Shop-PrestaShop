<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:20
  from 'C:\wamp\www\prestashop\themes\BlueSecret\templates\_partials\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c80f159c7_87454621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd85a0041f8d22cc669468f5785ca1d45d5e4ad12' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\themes\\BlueSecret\\templates\\_partials\\header.tpl',
      1 => 1645355121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c80f159c7_87454621 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_176516579462124c80ed8911_44721464', 'header_top');
?>

<?php }
/* {block 'header_top'} */
class Block_176516579462124c80ed8911_44721464 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_top' => 
  array (
    0 => 'Block_176516579462124c80ed8911_44721464',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="header-top">
    <div class="container-fluid">
       <div class="row headcolor">
        <div class="col-md-2 col-sm-3 hidden-md-down" id="_desktop_logo">
          <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name'] == 'index') {?>
              <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
">
                <img class="logo img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
              </a>
          <?php } else { ?>
              <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
">
                <img class="logo img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
              </a>
          <?php }?>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12 text-xs-right tright">
      <div class="mobile">
       <div class="float-xs-left hidden-lg-up">
    <div id="menu-icon">
    <div class="navbar-header">
        <button type="button" class="btn-navbar navbar-toggle" data-toggle="collapse" onclick="openNav()">
        <i class="fa fa-bars"></i></button>
    </div>
    </div>
    <div id="mySidenav" class="sidenav text-xs-left">
    <div class="close-nav">
        <span class="categories"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Category','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
        <a href="javascript:void(0)" class="closebtn float-xs-right" onclick="closeNav()"><i class="fa fa-close"></i></a>
    </div>
    <div id="mobile_top_menu_wrapper" class="row hidden-lg-up">
        <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
    </div>
    </div>
    </div>
        <div class="top-logo float-xs-left hidden-lg-up" id="_mobile_logo"></div>
    <div class="float-xs-right hidden-lg-up" id="_mobile_cart"></div>
    <div id="_mobile_user_info" class="float-xs-right hidden-lg-up"></div>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTop'),$_smarty_tpl ) );?>

    <div id="_mobile_currency_selector" class="hidden-lg-up"></div>
    <div id="_mobile_language_selector" class="hidden-lg-up"></div>
</div> 
      </div>
      </div>
    </div>
  </div>
<?php
}
}
/* {/block 'header_top'} */
}
