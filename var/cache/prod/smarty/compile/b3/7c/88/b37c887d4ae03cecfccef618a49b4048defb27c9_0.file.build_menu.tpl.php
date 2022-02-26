<?php
/* Smarty version 3.1.39, created on 2022-02-20 18:43:16
  from 'C:\wamp\www\prestashop\modules\wbmegamenu\views\templates\admin\build_menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62127db4938912_73366242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b37c887d4ae03cecfccef618a49b4048defb27c9' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\modules\\wbmegamenu\\views\\templates\\admin\\build_menu.tpl',
      1 => 1645355119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62127db4938912_73366242 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel">
	<h3><i class="icon-list-ul"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Rows Of Menu','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>

	<span class="panel-heading-action">
		<a id="desc-product-new" class="list-toolbar-btn" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wbmegamenu&id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['id_wbmegamenu']->value);?>
&addRow=1">
			<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true">
				<i class="process-icon-new "></i>
			</span>
		</a>
	</span>
	</h3>
	<div class="form-wrapper" id="menuRowContent">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info_rows']->value, 'info_row', false, NULL, 'info_row', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['info_row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['info_row']->value) {
$_smarty_tpl->tpl_vars['info_row']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_info_row']->value['iteration']++;
?>
			<div class="wb-menu-row container-fluid">
				<h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Row','mod'=>'wbmegamenu'),$_smarty_tpl ) );?>
 #<?php echo intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_info_row']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_info_row']->value['iteration'] : null));?>

					<a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wbmegamenu&id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['id_wbmegamenu']->value);?>
&id_row=<?php echo intval($_smarty_tpl->tpl_vars['info_row']->value['id_row']);?>
&delete_row=1"><i class="icon-trash"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'wbmegamenu'),$_smarty_tpl ) );?>

					</a>
					<a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wbmegamenu&id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['id_wbmegamenu']->value);?>
&id_row=<?php echo intval($_smarty_tpl->tpl_vars['info_row']->value['id_row']);?>
">
						<i class="icon-edit"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>

					</a>
					<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_row']->value['status'],'quotes','UTF-8' ));?>

				</h4>
				<div class="wb-menu-column-content">
					<a class="btn btn-default btn-lg button-new-item" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wbmegamenu&id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['id_wbmegamenu']->value);?>
&id_row=<?php echo intval($_smarty_tpl->tpl_vars['info_row']->value['id_row']);?>
&addCol=1"><i class="icon-plus-sign"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add Column','mod'=>'wbmegamenu'),$_smarty_tpl ) );?>

					</a>
					<div class="wb-menu-column">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info_row']->value['list_col'], 'info_col');
$_smarty_tpl->tpl_vars['info_col']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['info_col']->value) {
$_smarty_tpl->tpl_vars['info_col']->do_else = false;
?>
							<div id="col_<?php echo intval($_smarty_tpl->tpl_vars['info_col']->value['id_column']);?>
" class="wb-column <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_col']->value['width'],'html','UTF-8' ));?>
">
								<h4>
								<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete Colum','mod'=>'wbmegamenu'),$_smarty_tpl ) );?>
" data-html="true">
									<a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wbmegamenu&id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['id_wbmegamenu']->value);?>
&id_row=<?php echo intval($_smarty_tpl->tpl_vars['info_row']->value['id_row']);?>
&id_column=<?php echo intval($_smarty_tpl->tpl_vars['info_col']->value['id_column']);?>
&delete_col=1">
										<i class="icon-trash"></i>
									</a>
									</span>
									<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit Column','mod'=>'wbmegamenu'),$_smarty_tpl ) );?>
" data-html="true">
									<a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wbmegamenu&id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['id_wbmegamenu']->value);?>
&id_row=<?php echo intval($_smarty_tpl->tpl_vars['info_row']->value['id_row']);?>
&id_column=<?php echo intval($_smarty_tpl->tpl_vars['info_col']->value['id_column']);?>
">
										<i class="icon-edit"></i>
									</a>
									</span>
									<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new Item','mod'=>'wbmegamenu'),$_smarty_tpl ) );?>
" data-html="true">
									<a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wbmegamenu&id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['id_wbmegamenu']->value);?>
&id_row=<?php echo intval($_smarty_tpl->tpl_vars['info_row']->value['id_row']);?>
&id_column=<?php echo intval($_smarty_tpl->tpl_vars['info_col']->value['id_column']);?>
&addMenuItem=1">
										<i class="process-icon-new "></i>
									</a>
									</span>
								</h4>
								<ul class="block-items">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info_col']->value['list_menu_item'], 'sub_menu_item');
$_smarty_tpl->tpl_vars['sub_menu_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sub_menu_item']->value) {
$_smarty_tpl->tpl_vars['sub_menu_item']->do_else = false;
?>
										<li id="menuitem_<?php echo intval($_smarty_tpl->tpl_vars['sub_menu_item']->value['id_item']);?>
" class="<?php if ($_smarty_tpl->tpl_vars['sub_menu_item']->value['type_item'] == 1) {?>item-header<?php } else { ?>item-line<?php }?>">
											<span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_menu_item']->value['title'],'html','UTF-8' ));?>
</span>
											<div class="group-action">
												<a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wbmegamenu&id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['id_wbmegamenu']->value);?>
&id_row=<?php echo intval($_smarty_tpl->tpl_vars['info_row']->value['id_row']);?>
&id_column=<?php echo intval($_smarty_tpl->tpl_vars['info_col']->value['id_column']);?>
&id_item=<?php echo intval($_smarty_tpl->tpl_vars['sub_menu_item']->value['id_item']);?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit Item','mod'=>'wbmegamenu'),$_smarty_tpl ) );?>
 ">
													<i class="icon-edit"></i>
												</a>
												<a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wbmegamenu&id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['id_wbmegamenu']->value);?>
&id_row=<?php echo intval($_smarty_tpl->tpl_vars['info_row']->value['id_row']);?>
&id_column=<?php echo intval($_smarty_tpl->tpl_vars['info_col']->value['id_column']);?>
&id_item=<?php echo intval($_smarty_tpl->tpl_vars['sub_menu_item']->value['id_item']);?>
&delete_submenu_item=1" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'delete Item','mod'=>'wbmegamenu'),$_smarty_tpl ) );?>
 "><i class="icon-trash"></i>
												</a>
												<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_menu_item']->value['status'],'quotes','UTF-8' ));?>

											</div>
											<?php if ($_smarty_tpl->tpl_vars['sub_menu_item']->value['type_link'] == 3) {?>
											<div class="text-html">
												<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_menu_item']->value['text'],'quotes','UTF-8' ));?>

											</div>
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['sub_menu_item']->value['type_link'] == 4) {?>
												#<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product ID','mod'=>'wbmegamenu'),$_smarty_tpl ) );?>
: <?php echo intval($_smarty_tpl->tpl_vars['sub_menu_item']->value['id_product']);?>

											<?php }?>
										</li>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</ul>
							</div>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>
				</div>
			</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
	<div class="panel-footer">
		<a href="index.php?controller=AdminModules&amp;configure=wbmegamenu&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'html','UTF-8' ));?>
" class="btn btn-default">
		<i class="process-icon-back"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back to list','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</a>
	</div>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(function() {
			var $myMenus = $("ul.block-items");
			$myMenus.sortable({
				opacity: 0.6,
				cursor: "move",
				update: function() {
					var order = $(this).sortable("serialize") + "&action=updateMenusItemPosition";
					$.post("<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['url_base']->value,'html','UTF-8' ));?>
modules/wbmegamenu/ajax_wbmegamenu.php?secure_key=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['secure_key']->value,'html','UTF-8' ));?>
", order);
					}
				});
			$myMenus.hover(function() {
				$(this).css("cursor","move");
				},
				function() {
				$(this).css("cursor","auto");
			});
			
			var $myColumns = $("div.wb-menu-column");
			$myColumns.sortable({
				opacity: 0.6,
				cursor: "move",
				update: function() {
					var order1 = $(this).sortable("serialize") + "&action=updateColumnsPosition";
					$.post("<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['url_base']->value,'html','UTF-8' ));?>
modules/wbmegamenu/ajax_wbmegamenu.php?secure_key=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['secure_key']->value,'html','UTF-8' ));?>
", order1);
					}
				});
			$myColumns.hover(function() {
				$(this).css("cursor","move");
				},
				function() {
				$(this).css("cursor","auto");
			});
		});
	<?php echo '</script'; ?>
>
</div><?php }
}
