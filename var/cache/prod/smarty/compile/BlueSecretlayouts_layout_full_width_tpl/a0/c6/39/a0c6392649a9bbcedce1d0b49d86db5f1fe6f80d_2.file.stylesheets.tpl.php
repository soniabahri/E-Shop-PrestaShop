<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:20
  from 'C:\wamp\www\prestashop\themes\BlueSecret\templates\_partials\stylesheets.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c80688605_56182489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a0c6392649a9bbcedce1d0b49d86db5f1fe6f80d' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\themes\\BlueSecret\\templates\\_partials\\stylesheets.tpl',
      1 => 1645355121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c80688605_56182489 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stylesheets']->value['external'], 'stylesheet');
$_smarty_tpl->tpl_vars['stylesheet']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->value) {
$_smarty_tpl->tpl_vars['stylesheet']->do_else = false;
?>
  <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['uri'], ENT_QUOTES, 'UTF-8');?>
" type="text/css" media="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['media'], ENT_QUOTES, 'UTF-8');?>
">
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stylesheets']->value['inline'], 'stylesheet');
$_smarty_tpl->tpl_vars['stylesheet']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->value) {
$_smarty_tpl->tpl_vars['stylesheet']->do_else = false;
?>
  <style>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['content'], ENT_QUOTES, 'UTF-8');?>

  </style>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php if ((isset($_smarty_tpl->tpl_vars['WB_customCSS']->value)) && $_smarty_tpl->tpl_vars['WB_customCSS']->value) {?>
<!-- Start Custom CSS -->
    <style><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['WB_customCSS']->value, ENT_QUOTES, 'UTF-8');?>
</style>
<!-- End Custom CSS -->
<?php }
if ((isset($_smarty_tpl->tpl_vars['WB_JQUERY']->value)) && $_smarty_tpl->tpl_vars['WB_JQUERY']->value) {
echo '<script'; ?>
 type="text/javascript" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['WB_JQUERY']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo '</script'; ?>
>
<?php }
echo '<script'; ?>
 type="text/javascript">
	var LANG_RTL=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['is_rtl'], ENT_QUOTES, 'UTF-8');?>
;
	var langIso='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['language_code'], ENT_QUOTES, 'UTF-8');?>
';
	var baseUri='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
';
<?php if (((isset($_smarty_tpl->tpl_vars['WB_stickyMenu']->value)) && $_smarty_tpl->tpl_vars['WB_stickyMenu']->value)) {?>
	var WB_stickyMenu=true;
<?php }
if (((isset($_smarty_tpl->tpl_vars['WB_stickySearch']->value)) && $_smarty_tpl->tpl_vars['WB_stickySearch']->value)) {?>
	var WB_stickySearch=true;
<?php }
if (((isset($_smarty_tpl->tpl_vars['WB_stickyCart']->value)) && $_smarty_tpl->tpl_vars['WB_stickyCart']->value)) {?>
	var WB_stickyCart=true;
<?php }
if (((isset($_smarty_tpl->tpl_vars['WB_mainLayout']->value)) && $_smarty_tpl->tpl_vars['WB_mainLayout']->value)) {?>
	var WB_mainLayout='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['WB_mainLayout']->value, ENT_QUOTES, 'UTF-8');?>
';
<?php }
if (((isset($_smarty_tpl->tpl_vars['WB_enableCountdownTimer']->value)) && $_smarty_tpl->tpl_vars['WB_enableCountdownTimer']->value)) {?>
var WB_enableCountdownTimer=true;
<?php }
if (((isset($_smarty_tpl->tpl_vars['WB_mainLayout']->value)) && $_smarty_tpl->tpl_vars['WB_mainLayout']->value)) {?>
var WB_mainLayout='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['WB_mainLayout']->value, ENT_QUOTES, 'UTF-8');?>
';
<?php }?>


 <?php echo '</script'; ?>
><?php }
}
