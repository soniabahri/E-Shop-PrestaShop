<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:18
  from 'module:wbimgbannerviewstemplates' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c7e898382_41271398',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b71ebd52064e23a551e069d1851cf009d928e9db' => 
    array (
      0 => 'module:wbimgbannerviewstemplates',
      1 => 1645355119,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c7e898382_41271398 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '165179077762124c7e8738d4_09003396';
?>
<div class="container vidoe_hr">
  <div class="">
<div class="col-md-10 col-sm-8 img_banner">
<?php if ($_smarty_tpl->tpl_vars['imgbanner']->value['slides']) {?>
<div class="imgbanner">
  <div data-wrap="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['imgbanner']->value['wrap'], ENT_QUOTES, 'UTF-8');?>
">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['imgbanner']->value['slides'], 'slide');
$_smarty_tpl->tpl_vars['slide']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->do_else = false;
?>
        <div class="">
          <div class="beffect">
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" class="img-responsive center-block" />
          </a>
        </div>
        </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
</div>
<?php }?>
</div>
<div class="homevideobc col-md-3 col-sm-4"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTopColumn'),$_smarty_tpl ) );?>
</div>
</div>
</div><?php }
}
