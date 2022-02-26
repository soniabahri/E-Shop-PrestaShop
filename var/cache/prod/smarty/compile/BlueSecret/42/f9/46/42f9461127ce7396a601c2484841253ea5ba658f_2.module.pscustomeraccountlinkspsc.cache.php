<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:23
  from 'module:pscustomeraccountlinkspsc' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c83acc284_96871041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42f9461127ce7396a601c2484841253ea5ba658f' => 
    array (
      0 => 'module:pscustomeraccountlinkspsc',
      1 => 1645355121,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c83acc284_96871041 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '197365749762124c83aa19e6_40466818';
?>

<div id="block_myaccount_infos" class="col-sm-3 col-md-2 col-xs-12 links wrapper">
  <h3 class="myaccount-title hidden-sm-down">
    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['my_account'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>

    </a>
  </h3>
  <div class="title clearfix hidden-md-up" data-target="#footer_account_list" data-toggle="collapse">
    <span class="h3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>
</span>
    <span class="float-xs-right">
      <span class="navbar-toggler collapse-icons">
        <i class="fa fa-plus add"></i>
        <i class="fa fa-minus remove"></i>
      </span>
    </span>
  </div>
  <ul class="account-list collapse" id="footer_account_list">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['my_account_urls']->value, 'my_account_url');
$_smarty_tpl->tpl_vars['my_account_url']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['my_account_url']->value) {
$_smarty_tpl->tpl_vars['my_account_url']->do_else = false;
?>
        <li><i class="fa fa-angle-right"></i>
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value['title'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value['title'], ENT_QUOTES, 'UTF-8');?>

          </a>
        </li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayMyAccountBlock'),$_smarty_tpl ) );?>

  </ul>
</div><?php }
}
