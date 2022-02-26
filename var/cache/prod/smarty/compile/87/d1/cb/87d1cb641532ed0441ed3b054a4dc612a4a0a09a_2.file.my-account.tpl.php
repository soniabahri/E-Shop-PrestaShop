<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:23
  from 'C:\wamp\www\prestashop\modules\blockwishlist\views\templates\front\my-account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c83d09f69_47513022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87d1cb641532ed0441ed3b054a4dc612a4a0a09a' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\modules\\blockwishlist\\views\\templates\\front\\my-account.tpl',
      1 => 1645355119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c83d09f69_47513022 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- MODULE WishList -->
<li class="footer-div">
<i class="fa fa-angle-right"></i>
	<a class="lnk_wishlist" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockwishlist','mywishlist',array(),true),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
">
		<span class="link-item">
            <!-- <i class="fa fa-heart-o"></i> -->
    		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl ) );?>

        </span>
	</a>
</li>
	<a class="lnk_wishlist1 col-lg-4 col-md-6 col-sm-6 col-xs-12" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockwishlist','mywishlist',array(),true),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
">
		<span class="link-item">
            <i class="fa fa-heart-o"></i>
    		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl ) );?>

        </span>
	</a>
<!-- END : MODULE WishList --><?php }
}
