<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:17
  from 'module:psfeaturedproductsviewste' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c7d2ac043_70045410',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa6cc378d2942c8857b89d6bca728048c0caeedd' => 
    array (
      0 => 'module:psfeaturedproductsviewste',
      1 => 1645355121,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/product.tpl' => 1,
  ),
),false)) {
function content_62124c7d2ac043_70045410 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '115912282062124c7d293f57_09396626';
?>
<div class="product-tab-item container">
        <div class="pro-tab tabs text-xs-left">
          <h1 class="heading text-xs-left"><span><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'latest products','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span></span></h1>
            <ul class="list-inline nav nav-tabs text-xs-right">
                <li class="nav-item"><a class="nav-link active" href="#tab-fea-0"  data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'featured','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</a>
                </li><li class="nav-item center"><a class="nav-link" href="#tab-new-0"  data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'latest','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</a>
                </li><li class="nav-item"><a class="nav-link" href="#tab-best-0"  data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'bestseller','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</a>
                </li>
            </ul>
        </div>
<div class="tab-content tab-pro" id="tab-content">
<section id="tab-fea-0" class="tab-pane active clearfix fadeIn animated">
  <div class="products  rless">
  <div id="owl-fea" class="owl-carousel owl-theme"> 
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
        <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
</div>
</section><?php }
}
