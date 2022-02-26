<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:22
  from 'C:\wamp\www\prestashop\modules\blockwishlist\views\templates\front\blockwishlist_top.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c823ec658_16465564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52beb447237cafa655b1c1c9b9aac926e626a12b' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\modules\\blockwishlist\\views\\templates\\front\\blockwishlist_top.tpl',
      1 => 1645355119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c823ec658_16465564 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="text/javascript">
var wishlistProductsIds='';
var baseDir ='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content_dir']->value, ENT_QUOTES, 'UTF-8');?>
';
var static_token='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
';
var isLogged ='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['isLogged']->value, ENT_QUOTES, 'UTF-8');?>
';
var loggin_required='<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You must be logged in to manage your wishlist.','mod'=>'blockwishlist','js'=>1),$_smarty_tpl ) );?>
';
var added_to_wishlist ='<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The product was successfully added to your wishlist.','mod'=>'blockwishlist','js'=>1),$_smarty_tpl ) );?>
';
var mywishlist_url='<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockwishlist','mywishlist',array(),true),'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
';
<?php if ((isset($_smarty_tpl->tpl_vars['isLogged']->value)) && $_smarty_tpl->tpl_vars['isLogged']->value) {?>
    var isLoggedWishlist=true;
<?php } else { ?>
    var isLoggedWishlist=false;
<?php }
echo '</script'; ?>
>

<li class="wishl wi-he d-inline-block">
	<a class="wishtlist_top" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockwishlist','mywishlist',array(),true),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
	<div class="wimg"><svg width="24px" height="24px"> <use xlink:href="#hwish"></use></svg><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'wishlist','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
</div>	</a>
</li>
<?php }
}
