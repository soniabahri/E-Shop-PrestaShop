<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:15:57
  from 'C:\wamp\www\prestashop\modules\blockwishlist\views\templates\front\blockwishlist-extra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124d1d9b6578_50150081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e37278a241d7bb9036a449ddf8efabdaba90517c' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\modules\\blockwishlist\\views\\templates\\front\\blockwishlist-extra.tpl',
      1 => 1645355119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124d1d9b6578_50150081 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['wishlists']->value)) && is_array($_smarty_tpl->tpl_vars['wishlists']->value) > 1) {?>
    <div class="buttons_bottom_block no-print panel-product-line panel-product-actions">
    	<div id="wishlist_button">
    		<button class="wishlist_button_extra btn btn-primary" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_product']->value), ENT_QUOTES, 'UTF-8');?>
', $('#idCombination').val(), document.getElementById('quantity_wanted').value, $('#idWishlist').val()); return false;"  title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to wishlist','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
">
    			                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to wishlist','mod'=>'blockwishlist'),$_smarty_tpl ) );?>

    		</button>
            <div class="select-wl">
            <select id="idWishlist">
    			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wishlists']->value, 'wishlist');
$_smarty_tpl->tpl_vars['wishlist']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wishlist']->value) {
$_smarty_tpl->tpl_vars['wishlist']->do_else = false;
?>
    				<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist']->value['id_wishlist'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>
    			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    		</select>
        </div>
    	</div>
    </div>
<?php } else { ?>
    <p class="panel-product-line panel-product-actions">
    	<a id="wishlist_button" class="btn btn-primary" href="#" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_product']->value), ENT_QUOTES, 'UTF-8');?>
', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;" rel="nofollow"  title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to my wishlist','mod'=>'blockwishlist'),$_smarty_tpl ) );?>
">
    		            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to wishlist','mod'=>'blockwishlist'),$_smarty_tpl ) );?>

    	</a>
    </p>
<?php }?>

<?php }
}
