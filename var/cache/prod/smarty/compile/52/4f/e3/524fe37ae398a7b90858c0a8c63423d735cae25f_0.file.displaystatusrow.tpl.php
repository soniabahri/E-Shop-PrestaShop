<?php
/* Smarty version 3.1.39, created on 2022-02-20 18:44:25
  from 'C:\wamp\www\prestashop\modules\wbmegamenu\views\templates\admin\displaystatusrow.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62127df9c5e432_35061231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '524fe37ae398a7b90858c0a8c63423d735cae25f' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\modules\\wbmegamenu\\views\\templates\\admin\\displaystatusrow.tpl',
      1 => 1645355119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62127df9c5e432_35061231 (Smarty_Internal_Template $_smarty_tpl) {
?>
<a class="btn <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['class']->value,'quotes','UTF-8' ));?>
" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value,'quotes','UTF-8' ));?>
&configure=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'quotes','UTF-8' ));?>
&token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'quotes','UTF-8' ));?>
&changeStatusRow&id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['id_menu']->value);?>
&id_row=<?php echo intval($_smarty_tpl->tpl_vars['id_row']->value);?>
" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'quotes','UTF-8' ));?>
"><i class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['icon']->value,'quotes','UTF-8' ));?>
"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'quotes','UTF-8' ));?>
</a><?php }
}
