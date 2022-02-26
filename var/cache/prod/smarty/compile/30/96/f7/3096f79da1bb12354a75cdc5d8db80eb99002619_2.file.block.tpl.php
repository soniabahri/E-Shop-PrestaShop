<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:18
  from 'C:\wamp\www\prestashop\modules\wbstaticblocks\views\templates\hook\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c7ef2be25_44514429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3096f79da1bb12354a75cdc5d8db80eb99002619' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\modules\\wbstaticblocks\\views\\templates\\hook\\block.tpl',
      1 => 1645355119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c7ef2be25_44514429 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['staticblocks']->value, 'block', false, 'key');
$_smarty_tpl->tpl_vars['block']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->do_else = false;
?>
    <?php if ($_smarty_tpl->tpl_vars['block']->value['active'] == 1) {?>
        <p class ="title_block"> <?php ob_start();
echo $_smarty_tpl->tpl_vars['block']->value['title'];
$_prefixVariable1 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_prefixVariable1,'mod'=>'wbstaticblocks'),$_smarty_tpl ) );?>
 </p>
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['block']->value['description'];?>

    <?php if ($_smarty_tpl->tpl_vars['block']->value['insert_module'] == 1) {?>
        <?php echo $_smarty_tpl->tpl_vars['block']->value['block_module'];?>

    <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
