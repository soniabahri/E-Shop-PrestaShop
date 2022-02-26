<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:15
  from 'module:wbcategoryfeaturedproduct' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c7be577e1_87972953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '535d9143964d404fef49ba7f22ab6d15f49f9864' => 
    array (
      0 => 'module:wbcategoryfeaturedproduct',
      1 => 1645355119,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/custom_product.tpl' => 2,
  ),
),false)) {
function content_62124c7be577e1_87972953 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '156105584862124c7be0c8c5_31256263';
?>
<div class="container leftbest">
	<div class="col-md-2"></div>
<section class="category-products clearfix col-md-8">
 <h1 class="heading"><span><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'top seller','mod'=>'wbcategoryfeaturedproducts'),$_smarty_tpl ) );?>
</span></span></h1>
  <div class="products rless">
  <div id="owl-rate1" class="">
      <?php $_smarty_tpl->_assignInScope('num_row', 3);?> <!-- Number of Row Ex 2,3,4,5....etc-->
    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php if (count($_smarty_tpl->tpl_vars['products']->value) <= 1) {?>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
        <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/custom_product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['i']->value == 0) {?>
          <ul>
            <li>
        <?php }?>
              <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/custom_product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
              <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
        <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['num_row']->value) {?>
            </li>
          </ul>
          <?php $_smarty_tpl->_assignInScope('i', 0);?>
        <?php }?>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>
  </div>
</div>
</section>
<div class="col-md-2"></div>
</div>	

<?php }
}
