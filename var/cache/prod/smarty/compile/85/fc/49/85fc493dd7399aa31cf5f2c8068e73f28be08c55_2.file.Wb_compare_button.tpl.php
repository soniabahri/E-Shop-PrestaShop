<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:18
  from 'C:\wamp\www\prestashop\modules\wbcompare\views\templates\hook\Wb_compare_button.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c7e11ccc0_52447123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85fc493dd7399aa31cf5f2c8068e73f28be08c55' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\modules\\wbcompare\\views\\templates\\hook\\Wb_compare_button.tpl',
      1 => 1645355119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c7e11ccc0_52447123 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="compare">
	<a class="add_to_compare title_font btn-product  href="#" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['Wb_compare_id_product']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php if ($_smarty_tpl->tpl_vars['add_compare']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove from Compare','mod'=>'wbcompare'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to Compare','mod'=>'wbcompare'),$_smarty_tpl ) );
}?>">
            <h5 class="wb-compare-content wb-compare-button compare-button-content pcom">
			<svg width="16px" height="16px"> <use xlink:href="#compare"></use></svg>
			<span class="homec">Compare</span>
		</h5>
	</a>
</div><?php }
}
