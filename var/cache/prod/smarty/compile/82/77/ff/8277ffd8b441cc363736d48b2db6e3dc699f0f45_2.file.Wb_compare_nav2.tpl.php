<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:22
  from 'C:\wamp\www\prestashop\modules\wbcompare\views\templates\hook\Wb_compare_nav2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c8227e5f9_19487798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8277ffd8b441cc363736d48b2db6e3dc699f0f45' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\modules\\wbcompare\\views\\templates\\hook\\Wb_compare_nav2.tpl',
      1 => 1645355119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c8227e5f9_19487798 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
<li class="hcom">
	<form method="post" action="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getModuleLink('wbcompare','WbCompareProduct'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="compare-form">
		<button type="submit" class="bt_compare" disabled="disabled">
			<span class="wcom"><svg width="15px" height="14px"> <use xlink:href="#hcom"></use></svg><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Compare','mod'=>'wbcompare'),$_smarty_tpl ) );?>
</span>
			<!-- <span class="wcom"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Compare','mod'=>'wbcompare'),$_smarty_tpl ) );?>
 </span> -->
		</button>
		<input type="hidden" name="compare_product_count" class="compare_product_count" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['count_product']->value, ENT_QUOTES, 'UTF-8');?>
" />
		<input type="hidden" name="compare_product_list" class="compare_product_list" value="" />
	</form>
</li>
<?php }
}
}
