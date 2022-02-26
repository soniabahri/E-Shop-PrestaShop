<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:21:09
  from 'C:\wamp\www\prestashop\themes\BlueSecret\templates\catalog\listing\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124e556d9891_05883834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '882a66c0cc4504f43bc307d9f0650bb1fd1eebe3' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\themes\\BlueSecret\\templates\\catalog\\listing\\category.tpl',
      1 => 1645355121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124e556d9891_05883834 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9005043562124e556a9bc0_18788672', 'product_list_header');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'catalog/listing/product-list.tpl');
}
/* {block 'product_list_header'} */
class Block_9005043562124e556a9bc0_18788672 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_list_header' => 
  array (
    0 => 'Block_9005043562124e556a9bc0_18788672',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="block-category card card-block hidden-sm-down">
      <h1 class="h1 bh"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8');?>
</h1>
      <div class="row">
        <div class="col-sm-4 col-md-3 col-xl-2">
          <?php if ($_smarty_tpl->tpl_vars['category']->value['image']['large']['url']) {?>
        <div class="category-cover">
          <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['image']['medium']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['image']['legend'], ENT_QUOTES, 'UTF-8');?>
" class="img-responsive center-block">
        </div>
        <?php }?>
      
    </div>
    <div class="col-sm-8 col-md-9 col-xl-10 col-xs-12">
       <?php if ($_smarty_tpl->tpl_vars['category']->value['description']) {?>
        <div id="category-description" class="text-muted"><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</div>
      <?php }?>
      </div>
     </div>
  </div>
    <div class="text-sm-center hidden-md-up">
      <h1 class="h1 bh"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8');?>
</h1>
    </div>
<?php
}
}
/* {/block 'product_list_header'} */
}
