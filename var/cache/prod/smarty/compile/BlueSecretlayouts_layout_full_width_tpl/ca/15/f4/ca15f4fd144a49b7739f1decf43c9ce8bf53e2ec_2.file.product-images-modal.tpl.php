<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:15:58
  from 'C:\wamp\www\prestashop\themes\BlueSecret\templates\catalog\_partials\product-images-modal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124d1ed06a80_98840021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca15f4fd144a49b7739f1decf43c9ce8bf53e2ec' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\themes\\BlueSecret\\templates\\catalog\\_partials\\product-images-modal.tpl',
      1 => 1645355121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124d1ed06a80_98840021 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<div class="modal fade js-product-images-modal" id="product-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <?php $_smarty_tpl->_assignInScope('imagesCount', count($_smarty_tpl->tpl_vars['product']->value['images']));?>
        <aside id="thumbnails" class="thumbnails js-thumbnails text-sm-center">
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11178296862124d1ecee333_08563738', 'product_images');
?>

        </aside>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }
/* {block 'product_images'} */
class Block_11178296862124d1ecee333_08563738 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_images' => 
  array (
    0 => 'Block_11178296862124d1ecee333_08563738',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <div id="xs-zoom" class="owl-carousel owl-theme">
             
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                  <div class="thumb-container">
                    <img data-image-large-src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['large']['url'], ENT_QUOTES, 'UTF-8');?>
" class="thumb js-modal-thumb center-block img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['large']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['large']['width'], ENT_QUOTES, 'UTF-8');?>
" itemprop="image">
                  </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            
            </div>
          <?php
}
}
/* {/block 'product_images'} */
}
