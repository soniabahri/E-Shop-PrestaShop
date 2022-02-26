<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:22
  from 'module:psshoppingcartpsshoppingc' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c8272c174_19811743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35655e6409b6198f29dd6e732ef9598dec599880' => 
    array (
      0 => 'module:psshoppingcartpsshoppingc',
      1 => 1645355121,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c8272c174_19811743 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<div id="_desktop_cart" class="d-inline-block hidden-sm-down">
  <div class="dropdown js-dropdown">
  <div class="blockcart cart-preview <?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count'] > 0) {?>active<?php } else { ?>inactive<?php }?>" data-refresh-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['refresh_url']->value, ENT_QUOTES, 'UTF-8');?>
">
    <div class="header">
      <div class="" data-toggle="dropdown">
        <div class="hcart d-inline-block"><svg width="25px" height="25px"><use xlink:href="#hcart"></use></svg><span class="cart-products-count cart-c d-inline-block"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['products_count'], ENT_QUOTES, 'UTF-8');?>
</span></div>
          
      </div>
            <ul class="dropdown-menu dropdown-menu-right head-cart-drop">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_85426524262124c825b8db2_02630748', 'cart_detailed_product');
?>

            </ul>
    </div>
  </div>
</div>
</div>
<div class="setting dropdown js-dropdown d-inline-block hidden-sm-down">
<div data-toggle="dropdown" class="set">
  <svg width="21px" height="20px"> <use xlink:href="#setting"></use></svg>
</div>
<ul class="dropdown-menu dropdown-menu-right se-do text-xs-left" style="display: none;">
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNav2'),$_smarty_tpl ) );?>

</ul>
</div><?php }
/* {block 'cart_detailed_product'} */
class Block_85426524262124c825b8db2_02630748 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cart_detailed_product' => 
  array (
    0 => 'Block_85426524262124c825b8db2_02630748',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <li class="cart-det" data-refresh-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'cart','params'=>array('ajax'=>true,'action'=>'refresh')),$_smarty_tpl ) );?>
">
                <?php if ($_smarty_tpl->tpl_vars['cart']->value['products']) {?>
                <ul class="cart-drop-table">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value['products'], 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                    <div class="cart-down">
                    <!--  image-->
                        <li class="cart-img d-inline-block">
                            <img class="" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['cart_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'quotes' )), ENT_QUOTES, 'UTF-8');?>
">
                        </li>
                        <div class="qtyp d-inline-block">
                    <!--  name -->
                        <li  class="cart-name">
                            <a class="label name-cart2" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" data-id_customization="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_customization']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
                        </li>
                        <!--  qty -->
                        <li>
                            <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
</span>
                    <!-- price -->
                         <?php if ((isset($_smarty_tpl->tpl_vars['product']->value['is_gift'])) && $_smarty_tpl->tpl_vars['product']->value['is_gift']) {?>
                            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Gift','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</span>
                        <?php } else { ?>
                            <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['total'], ENT_QUOTES, 'UTF-8');?>
</span>
                        <?php }?>
                        </li>
                        </div>
                    <!-- delete -->
                        <li class="float-xs-right cartclose">
                        <a  class                   = "remove-from-cart"
                        rel                         = "nofollow"
                        href                        = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['remove_from_cart_url'], ENT_QUOTES, 'UTF-8');?>
"
                        data-link-action            = "delete-from-cart"
                        data-id-product             = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['id_product'],'javascript' )), ENT_QUOTES, 'UTF-8');?>
"
                        data-id-product-attribute   = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'],'javascript' )), ENT_QUOTES, 'UTF-8');?>
"
                        data-id-customization       = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['id_customization'],'javascript' )), ENT_QUOTES, 'UTF-8');?>
" >
                            <?php if (!(isset($_smarty_tpl->tpl_vars['product']->value['is_gift'])) || !$_smarty_tpl->tpl_vars['product']->value['is_gift']) {?>
                                <i class="fa fa-close"></i>
                            <?php }?>
                        </a>
                        </li>
                    <!-- total -->
                </div>
                   <?php if (count($_smarty_tpl->tpl_vars['product']->value['customizations']) > 1) {?><hr><?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
                <hr>
                <table class="cdroptable">
                    <tbody>
                        <tr>
                            <td class="text-xs-left"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total products:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</td>
                            <td class="text-xs-right"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['products']['value'], ENT_QUOTES, 'UTF-8');?>
</td>
                        </tr>
                        <tr>
                            <td class="text-xs-left"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total shipping:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</td>
                            <td class="text-xs-right"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['shipping']['value'], ENT_QUOTES, 'UTF-8');?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayCheckoutSubtotalDetails','subtotal'=>$_smarty_tpl->tpl_vars['cart']->value['subtotals']['shipping']),$_smarty_tpl ) );?>
</td>
                        </tr>
                        <tr>
                            <td class="text-xs-left"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</td>
                            <td class="text-xs-right"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['labels']['tax_short'], ENT_QUOTES, 'UTF-8');?>
</td>
                        </tr>
                    </tbody>
                </table>
              <!-- checkout -->    
               <!--    <button type="button"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Continue shopping','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</button> -->
                  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart_url']->value, ENT_QUOTES, 'UTF-8');?>
" class="btn btn-primary btn-block float-xs-right"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'checkout','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</a>
                <?php } else { ?>
                  <p class="no-items"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your cart is empty!','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</p>
                <?php }?><div class="clearfix"></div>
              </li>
            <?php
}
}
/* {/block 'cart_detailed_product'} */
}
