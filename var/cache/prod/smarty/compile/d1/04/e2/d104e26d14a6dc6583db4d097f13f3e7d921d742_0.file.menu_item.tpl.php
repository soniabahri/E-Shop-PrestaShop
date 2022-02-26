<?php
/* Smarty version 3.1.39, created on 2022-02-26 21:03:18
  from 'C:\wamp\www\prestashop\modules\wbmegamenu\views\templates\admin\menu_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_621a87865ef5b7_65574457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd104e26d14a6dc6583db4d097f13f3e7d921d742' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\modules\\wbmegamenu\\views\\templates\\admin\\menu_item.tpl',
      1 => 1645355119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621a87865ef5b7_65574457 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="module_form" class="defaultForm form-horizontal" action="index.php?controller=AdminModules&amp;configure=wbmegamenu&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Tools::getAdminTokenLite('AdminModules'),'html','UTF-8' ));?>
" method="post" enctype="multipart/form-data" novalidate="">
<div class="panel"><h3><i class="icon-list-ul"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Menu Item','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</h3>
	<div class="form-wrapper" id="menuContent" >
		<div class="form-group wb-type-link">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Type Link','d'=>'Modules.WB<egamenu.Admin'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<div class="radio wb-radio">
					<label><input type="radio" name="type_link" id="type_link_custom" value="1" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_link == 1) {?>checked="checked" <?php }?>>Custom Link</label>
				</div>
				<div class="radio wb-radio">
					<label><input type="radio" name="type_link" id="type_link_ps" value="0" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_link == 0) {?>checked="checked" <?php }?>>PrestaShop Link</label>
				</div>
			</div>
		</div>
		
		<div class="form-group wb-menu-title" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_link == 0) {?>style="display:none"<?php }?>>
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Title','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['id_language']->value) {?>style="display:none"<?php }?>>
					<?php }?>
					<div class="col-lg-10">
					<input type="text" class="title" id="title_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="title_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->title[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])]))) {
echo $_smarty_tpl->tpl_vars['menu']->value->title[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])];
} else { ?>menu title<?php }?>"/>
					</div>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8' ));?>

								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
								<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);javascript:changeLangInfor(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lang']->value['name'],'html','UTF-8' ));?>
</a></li>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</div>
					<?php }?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						</div>
					<?php }?>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
		
		<div class="form-group wb-menu-link" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_link == 0) {?>style="display:none"<?php }?>>
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Link','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['id_language']->value) {?>style="display:none"<?php }?>>
					<?php }?>
					<div class="col-lg-10">
					<input type="text" id="link_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="link_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->link[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])]))) {
echo $_smarty_tpl->tpl_vars['menu']->value->link[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])];
} else { ?>#<?php }?>"/>
					</div>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8' ));?>

								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
								<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);javascript:changeLangInfor(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lang']->value['name'],'html','UTF-8' ));?>
</a></li>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</div>
					<?php }?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						</div>
					<?php }?>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
		<div class="form-group ps_link" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_link == 1) {?>style="display:none"<?php }?>>
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PrestaShop Link','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<select class="form-control fixed-width-lg" name="ps_link" id="ps_link">
					<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['all_options']->value,'quotes','UTF-8' ));?>

				</select>
			</div>
			<?php echo '<script'; ?>
 type="text/javascript">
				<?php if ($_smarty_tpl->tpl_vars['menu']->value->type_link == 0) {?>
				$(document).ready(function(){
					<?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->link[$_smarty_tpl->tpl_vars['id_language']->value])) && $_smarty_tpl->tpl_vars['menu']->value->link[$_smarty_tpl->tpl_vars['id_language']->value] != '') {?>
						var ps_link_val = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value->link[$_smarty_tpl->tpl_vars['id_language']->value],"html","UTF-8" ));?>
';
					<?php } else { ?>
						var ps_link_val = 'CAT3';
					<?php }?>
					$("#ps_link").val(ps_link_val);
				});
				<?php }?>
			<?php echo '</script'; ?>
>
		</div>
		
		<div class="form-group show_sub" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_link == 1) {?>style="display:none"<?php }?>>
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Show Sub Categories','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<span class="switch prestashop-switch fixed-width-lg">
					<input type="radio" name="dropdown" id="dropdown_on" value="1" <?php if (((isset($_smarty_tpl->tpl_vars['menu']->value->dropdown)) && $_smarty_tpl->tpl_vars['menu']->value->dropdown == 1)) {?>checked="checked"<?php }?>>
					<label for="dropdown_on">Yes</label>
					<input type="radio" name="dropdown" id="dropdown_off" value="0" <?php if (((isset($_smarty_tpl->tpl_vars['menu']->value->dropdown)) && $_smarty_tpl->tpl_vars['menu']->value->dropdown == 0) || !$_smarty_tpl->tpl_vars['menu']->value->dropdown) {?>checked="checked"<?php }?>>
					<label for="dropdown_off">No</label>
					<a class="slide-button btn"></a>
				</span>	
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sub Title','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['id_language']->value) {?>style="display:none"<?php }?>>
					<?php }?>
					<div class="col-lg-10">
					<input type="text" class="subtitle" id="subtitle_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="subtitle_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->subtitle[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])]) {
echo $_smarty_tpl->tpl_vars['menu']->value->subtitle[intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])];
}?>"/>
					</div>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8' ));?>

								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
								<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);javascript:changeLangInfor(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lang']->value['name'],'html','UTF-8' ));?>
</a></li>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</div>
					<?php }?>
					<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
						</div>
					<?php }?>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
		
		<div class="form-group wb-type-icon">
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Type Icon','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<div class="radio wb-radio">
					<label><input type="radio" name="type_icon" id="type_icon_fw" value="1" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_icon == 1) {?>checked="checked"<?php }?>>Font-Awesome Icon</label>
				</div>
				<div class="radio wb-radio">
					<label><input type="radio" name="type_icon" id="type_icon_img" value="0" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_icon == 0) {?>checked="checked"<?php }?>>Image Icon</label>
				</div>
			</div>
		</div>
		
		<div class="form-group wb-fw-icon" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_icon == 0) {?>style="display:none"<?php }?>>
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Font-Awesome Icon','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<input type="text" class="icon_font" id="icon_font" name="icon_font" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->icon && $_smarty_tpl->tpl_vars['menu']->value->type_icon == 1) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value->icon,'html','UTF-8' ));
}?>"/>
				<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Put class icon of Font-Awesome at :','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
 <a href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/">http://fortawesome.github.io/Font-Awesome/3.2.1/icons/.</a> ex: icon-sun</p>
			</div>
		</div>
		<div class="form-group wb-img-icon" <?php if ($_smarty_tpl->tpl_vars['menu']->value->type_icon == 1) {?>style="display:none"<?php }?>>
			<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Image Icon','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
			<div class="col-lg-9">
				<div class="col-lg-6">
					<input id="icon_img" type="file" name="icon_img" class="hide">
					<div class="dummyfile input-group">
						<span class="input-group-addon"><i class="icon-file"></i></span>
						<input id="icon_img-name" type="text" name="filename" readonly="">
						<span class="input-group-btn">
							<button id="icon_img-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
								<i class="icon-folder-open"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add file','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
				</button>
										</span>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['menu']->value->type_icon == 0 && (isset($_smarty_tpl->tpl_vars['menu']->value->icon)) && $_smarty_tpl->tpl_vars['menu']->value->icon != '') {?>
						<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_baseurl']->value,'html','UTF-8' ));
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value->icon,'html','UTF-8' ));?>
" class="img-thumbnail"/>
						<?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->id))) {?>
							<a href="index.php?controller=AdminModules&amp;configure=wbmegamenu&amp;tab_module=front_office_features&amp;module_name=wbmegamenu&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Tools::getAdminTokenLite('AdminModules'),'html','UTF-8' ));?>
&amp;removeIcon=1&amp;id_wbmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['menu']->value->id);?>
" id="del_icon">Remove</a>
						<?php }?>
					<?php }?>
						<?php echo '<script'; ?>
 type="text/javascript">
						$(document).ready(function(){
							$('#icon_img-selectbutton').click(function(e) {
								$('#icon_img').trigger('click');
							});

							$('#icon_img-name').click(function(e) {
								$('#icon_img').trigger('click');
							});

							$('#icon_img-name').on('dragenter', function(e) {
								e.stopPropagation();
								e.preventDefault();
							});

							$('#icon_img-name').on('dragover', function(e) {
								e.stopPropagation();
								e.preventDefault();
							});

							$('#icon_img-name').on('drop', function(e) {
								e.preventDefault();
								var files = e.originalEvent.dataTransfer.files;
								$('#icon_img')[0].files = files;
								$(this).val(files[0].name);
							});

							$('#icon_img').change(function(e) {
								if ($(this)[0].files !== undefined)
								{
									var files = $(this)[0].files;
									var name  = '';

									$.each(files, function(index, value) {
										name += value.name+', ';
									});

									$('#icon_img-name').val(name.slice(0, -2));
								}
								else // Internet Explorer 9 Compatibility
								{
									var name = $(this).val().split(/[\\/]/);
									$('#icon_img-name').val(name[name.length-1]);
								}
							});

							if (typeof icon_img_max_files !== 'undefined')
							{
								$('#icon_img').closest('form').on('submit', function(e) {
									if ($('#icon_img')[0].files.length > icon_img_max_files) {
										e.preventDefault();
										alert('You can upload a maximum of  files');
									}
								});
							}
						});
					<?php echo '</script'; ?>
>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Align Of SubMenu','mod'=>'wbmegamenu'),$_smarty_tpl ) );?>
</label>
		<div class="col-lg-9">
			<select class="form-control fixed-width-lg" name="align_sub" id="align_sub">
				<option value="wb-sub-top"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Top','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</option>
				<option value="wb-sub-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Center','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</option>
				<option value="wb-sub-bottom"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Bottom','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</option>
			</select>
			<?php echo '<script'; ?>
 type="text/javascript">
				$(document).ready(function(){
					<?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->align_sub)) && $_smarty_tpl->tpl_vars['menu']->value->align_sub != '') {?>
						var align_sub_val = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value->align_sub,"html","UTF-8" ));?>
';
					<?php } else { ?>
						var align_sub_val = 'wb-sub-auto';
					<?php }?>
					$('#align_sub').val(align_sub_val);
				});
			<?php echo '</script'; ?>
>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Width Of SubMenu','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
		<div class="col-lg-9">
			<select class="form-control fixed-width-lg" name="width_sub" id="width_sub">
				<option value="column-1">1 column</option>
				<option value="column-2">2 column</option>
				<option value="column-3">3 column</option>
				<option value="column-4">4 column</option>
				<!-- <option value="col-sm-6">col-sm-6</option>
				<option value="col-sm-7">col-sm-7</option>
				<option value="col-sm-8">col-sm-8</option>
				<option value="col-sm-9">col-sm-9</option>
				<option value="col-sm-10">col-sm-10</option>
				<option value="col-sm-11">col-sm-11</option>
				<option value="col-sm-12">col-sm-12</option> -->
			</select>
			<?php echo '<script'; ?>
 type="text/javascript">
				$(document).ready(function() {
					<?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->width_sub)) && $_smarty_tpl->tpl_vars['menu']->value->width_sub != '') {?>
						var width_sub_val = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value->width_sub,"html","UTF-8" ));?>
';
					<?php } else { ?>
						var width_sub_val = '4 column';
					<?php }?>
					$("#width_sub").val(width_sub_val);
				});
			<?php echo '</script'; ?>
>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Class','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
		<div class="col-lg-9">
			<input type="text" class="class" id="class" name="class" value="<?php if ($_smarty_tpl->tpl_vars['menu']->value->class) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value->class,'html','UTF-8' ));
}?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Active','d'=>'Modules.WBMegamenu.Admin'),$_smarty_tpl ) );?>
</label>
		<div class="col-lg-9">
			<span class="switch prestashop-switch fixed-width-lg">
				<input type="radio" name="active" id="active_on" value="1" <?php if (((isset($_smarty_tpl->tpl_vars['menu']->value->active)) && $_smarty_tpl->tpl_vars['menu']->value->active != 0) || !$_smarty_tpl->tpl_vars['menu']->value->active) {?>checked="checked"<?php }?>>
				<label for="active_on">Yes</label>
				<input type="radio" name="active" id="active_off" value="0" <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->active)) && $_smarty_tpl->tpl_vars['menu']->value->active == 0) {?>checked="checked"<?php }?>>
				<label for="active_off">No</label>
				<a class="slide-button btn"></a>
			</span>	
		</div>
	</div>
	
	<div class="panel-footer" style="margin-bottom:10px;">
		<input type="hidden" name="id_wbmegamenu" id="id_wbmegamenu" value="<?php if ((isset($_smarty_tpl->tpl_vars['menu']->value->id))) {
echo intval($_smarty_tpl->tpl_vars['menu']->value->id);
}?>"/>
		<button type="submit" value="1" id="module_form_submit_btn" name="submitMenuItem" class="btn btn-default pull-right">
			<i class="process-icon-save"></i> Save
		</button>
		<a href="index.php?controller=AdminModules&amp;configure=wbmegamenu&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'html','UTF-8' ));?>
" class="btn btn-default">
		<i class="process-icon-back"></i> Back to list</a>
	</div>
	
</div>
</form><?php }
}
