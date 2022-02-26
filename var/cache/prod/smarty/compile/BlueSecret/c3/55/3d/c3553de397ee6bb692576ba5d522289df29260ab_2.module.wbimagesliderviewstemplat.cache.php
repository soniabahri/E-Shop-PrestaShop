<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:15
  from 'module:wbimagesliderviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c7b8a5b49_26967670',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3553de397ee6bb692576ba5d522289df29260ab' => 
    array (
      0 => 'module:wbimagesliderviewstemplat',
      1 => 1645355119,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c7b8a5b49_26967670 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '124736461862124c7b833cd4_24057384';
?>

<?php if ($_smarty_tpl->tpl_vars['wbslider']->value['slides']) {?>
<div class="imgslider">

  <div id="owl-slider" class="owl-carousel owl-theme" data-interval="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wbslider']->value['speed'], ENT_QUOTES, 'UTF-8');?>
" data-wrap="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wbslider']->value['wrap'], ENT_QUOTES, 'UTF-8');?>
" data-pause="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wbslider']->value['pause'], ENT_QUOTES, 'UTF-8');?>
">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wbslider']->value['slides'], 'slide');
$_smarty_tpl->tpl_vars['slide']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->do_else = false;
?>

      	<div class="slide">
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" class="img-responsive center-block owl-item-bg"/>	
          </a>
         
          <div class="col-md-2"></div><div class="slidecap col-md-4"><?php echo $_smarty_tpl->tpl_vars['slide']->value['description'];?>
</div>
           <!-- <div class="title-1">soul bikini top</div> -->
      </div>

      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
</div>

<?php }
}
}
