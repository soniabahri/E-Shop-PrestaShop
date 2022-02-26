<?php
/* Smarty version 3.1.39, created on 2022-02-20 18:44:14
  from 'C:\wamp\www\prestashop\modules\wbmegamenu\views\templates\admin\_configure\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62127dee707a66_05293240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8dcd483167bf6e61c1cba606138114f21aa8d09' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\modules\\wbmegamenu\\views\\templates\\admin\\_configure\\helpers\\form\\form.tpl',
      1 => 1645355119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62127dee707a66_05293240 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21917546462127dee553b30_63081811', "field");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "field"} */
class Block_21917546462127dee553b30_63081811 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'field' => 
  array (
    0 => 'Block_21917546462127dee553b30_63081811',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'select_link') {?>
		<select class="form-control fixed-width-xxl ps_link" name="ps_link" id="ps_link">
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['all_options']->value,'quotes','UTF-8' ));?>

		</select>
		<?php echo '<script'; ?>
 type="text/javascript">
			var type_link = <?php echo intval($_smarty_tpl->tpl_vars['type_link']->value);?>
;
			<?php if ($_smarty_tpl->tpl_vars['type_link']->value == 1) {?>
			$(document).ready(function() {
				$("#ps_link").val('<?php if ((isset($_smarty_tpl->tpl_vars['ps_link_value']->value)) && $_smarty_tpl->tpl_vars['ps_link_value']->value != '') {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ps_link_value']->value,"html","UTF-8" ));
}?>');
			});
			<?php } else { ?>
				$('.ps_link').parent('.form-group').css('display','none');
			<?php }?>
		<?php echo '</script'; ?>
>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'title') {?>
		<div class="wb-menu-title"><?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>
</div>
		<?php echo '<script'; ?>
 type="text/javascript">
		var type_link = <?php echo intval($_smarty_tpl->tpl_vars['type_link']->value);?>
;
		if (type_link == 1 || type_link == 4)
			$('.wb-menu-title').parent('.form-group').css('display','none');
		<?php echo '</script'; ?>
>
	<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['name'] == 'link') {?>
		<div class="wb-menu-link"><?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>
</div>
		<?php echo '<script'; ?>
 type="text/javascript">
		var type_link = <?php echo intval($_smarty_tpl->tpl_vars['type_link']->value);?>
;
		if (type_link == 1 || type_link == 4)
			$('.wb-menu-link').parent('.form-group').css('display','none');
		<?php echo '</script'; ?>
>
	<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['name'] == 'text') {?>
		<div class="wb-menu-text"><?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>
</div>
		<?php echo '<script'; ?>
 type="text/javascript">
		var type_link = <?php echo intval($_smarty_tpl->tpl_vars['type_link']->value);?>
;
		if (type_link == 1 || type_link == 2 || type_link == 4)
			$('.wb-menu-text').parent('.form-group').css('display','none');
		<?php echo '</script'; ?>
>
	<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['name'] == 'id_product') {?>
		<div class="wb-menu-product"><?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>
</div>
		<?php echo '<script'; ?>
 type="text/javascript">
		var type_link = <?php echo intval($_smarty_tpl->tpl_vars['type_link']->value);?>
;
		if (type_link == 1 || type_link == 2 || type_link == 3)
			$('.wb-menu-product').parent('.form-group').css('display','none');
		<?php echo '</script'; ?>
>
	<?php } else { ?>
		<?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

	<?php }
}
}
/* {/block "field"} */
}
