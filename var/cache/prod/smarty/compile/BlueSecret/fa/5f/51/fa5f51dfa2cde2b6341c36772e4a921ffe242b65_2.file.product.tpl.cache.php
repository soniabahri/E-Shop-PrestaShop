<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:17
  from 'C:\wamp\www\prestashop\themes\BlueSecret\templates\catalog\_partials\miniatures\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c7d5c1631_60720442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa5f51dfa2cde2b6341c36772e4a921ffe242b65' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\themes\\BlueSecret\\templates\\catalog\\_partials\\miniatures\\product.tpl',
      1 => 1645355121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/variant-links.tpl' => 1,
  ),
),false)) {
function content_62124c7d5c1631_60720442 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '47045621162124c7d39c7a5_22360064';
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_112788218862124c7d3ee7d3_32804054', 'product_miniature_item');
?>

<?php }
/* {block 'product_thumbnail'} */
class Block_185865501562124c7d3ff454_55804897 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php if ($_smarty_tpl->tpl_vars['product']->value['cover']) {?>
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="thumbnail product-thumbnail">
            <img
              class = "center-block img-responsive"
              src = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
              alt = "<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['cover']['legend'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],30,'...' )), ENT_QUOTES, 'UTF-8');
}?>"
              data-full-size-image-url = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['large']['url'], ENT_QUOTES, 'UTF-8');?>
"
            >
           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
           <?php if ((isset($_smarty_tpl->tpl_vars['product']->value['images'][1]))) {?>
              <img class="second-img img-responsive center-block"  
                src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['images'][1]['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
                alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
                title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
                itemprop="image"
              >
          <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </a>
        <?php } else { ?>
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="thumbnail product-thumbnail">
            <img
              src = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['no_picture_image']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
            >
          </a>
        <?php }?>
      <?php
}
}
/* {/block 'product_thumbnail'} */
/* {block 'product_flags'} */
class Block_21601038562124c7d48ccd8_01821453 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <ul class="product-flags">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
$_smarty_tpl->tpl_vars['flag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
$_smarty_tpl->tpl_vars['flag']->do_else = false;
?>
            <li class="product-flag <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span></li>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
      <?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_variants'} */
class Block_182704163662124c7d4b2e66_78698387 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php if ($_smarty_tpl->tpl_vars['product']->value['main_variants']) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/variant-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('variants'=>$_smarty_tpl->tpl_vars['product']->value['main_variants']), 0, false);
?>
          <?php }?>
        <?php
}
}
/* {/block 'product_variants'} */
/* {block 'product_name'} */
class Block_4061915162124c7d4cb204_08322243 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name'] == 'index') {?>
            <h3 class="h3 product-title" itemprop="name"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></h3>
          <?php } else { ?>
            <h2 class="h3 product-title" itemprop="name"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></h2>
          <?php }?>
        <?php
}
}
/* {/block 'product_name'} */
/* {block 'product_reviews'} */
class Block_153123892262124c7d4e9761_69056722 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

      <?php
}
}
/* {/block 'product_reviews'} */
/* {block 'product_description_short'} */
class Block_7472868362124c7d4f3b76_78018554 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <div id="product-description-short-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" itemprop="description" class="listds"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
        <?php
}
}
/* {/block 'product_description_short'} */
/* {block 'product_price_and_shipping'} */
class Block_72607995262124c7d4ffe31_99510158 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
            <div class="product-price-and-shipping">
              <span itemprop="price" class="price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
              <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl ) );?>

                <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Regular price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
                <span class="regular-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['regular_price'], ENT_QUOTES, 'UTF-8');?>
</span>
              <?php }?>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"before_price"),$_smarty_tpl ) );?>

              <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'unit_price'),$_smarty_tpl ) );?>

            </div>
          <?php }?>
        <?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'quick_view'} */
class Block_66692028262124c7d570735_13153571 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                            <button type="button" data-toggle="tooltip" title="Quickview" data-link-action="quickview"  class="quick-view quick">
                              <h5 class="pquick"><svg width="18px" height="17px" class=""><use xlink:href="#bquick"/></svg></h5>
                              <span class="pquick hidden-sm-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'quick view','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
                            </button>
                          <?php
}
}
/* {/block 'quick_view'} */
/* {block 'quick_view'} */
class Block_144127855662124c7d5b22b2_52410553 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                            <button type="button" data-toggle="tooltip" title="Quickview" data-link-action="quickview"  class="quick-view quick">
                              <h5 class="pquick"><svg width="18px" height="17px" class=""><use xlink:href="#bquick"/></svg></h5>
                              <!-- <span class="pquick hidden-sm-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'quick view','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span> -->
                            </button>
                          <?php
}
}
/* {/block 'quick_view'} */
/* {block 'product_miniature_item'} */
class Block_112788218862124c7d3ee7d3_32804054 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_miniature_item' => 
  array (
    0 => 'Block_112788218862124c7d3ee7d3_32804054',
  ),
  'product_thumbnail' => 
  array (
    0 => 'Block_185865501562124c7d3ff454_55804897',
  ),
  'product_flags' => 
  array (
    0 => 'Block_21601038562124c7d48ccd8_01821453',
  ),
  'product_variants' => 
  array (
    0 => 'Block_182704163662124c7d4b2e66_78698387',
  ),
  'product_name' => 
  array (
    0 => 'Block_4061915162124c7d4cb204_08322243',
  ),
  'product_reviews' => 
  array (
    0 => 'Block_153123892262124c7d4e9761_69056722',
  ),
  'product_description_short' => 
  array (
    0 => 'Block_7472868362124c7d4f3b76_78018554',
  ),
  'product_price_and_shipping' => 
  array (
    0 => 'Block_72607995262124c7d4ffe31_99510158',
  ),
  'quick_view' => 
  array (
    0 => 'Block_66692028262124c7d570735_13153571',
    1 => 'Block_144127855662124c7d5b22b2_52410553',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <article class="product-miniature js-product-miniature  cless" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" itemscope itemtype="http://schema.org/Product">
    <div class="thumbnail-container">
     <div class="wb-image-block">
   
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_185865501562124c7d3ff454_55804897', 'product_thumbnail', $this->tplIndex);
?>


      <?php if ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'percentage') {?>
        <div class="sale"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_percentage'], ENT_QUOTES, 'UTF-8');?>
</span></div>
      <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'amount') {?>
        <div class="sale"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_amount_to_display'], ENT_QUOTES, 'UTF-8');?>
</span></div>
      <?php }?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21601038562124c7d48ccd8_01821453', 'product_flags', $this->tplIndex);
?>


      <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
        <span class="reducep"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'reduced price','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
      <?php }?>
       <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_182704163662124c7d4b2e66_78698387', 'product_variants', $this->tplIndex);
?>

     
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'weight'),$_smarty_tpl ) );?>


</div>
      <div class="wb-product-desc text-xs-center">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4061915162124c7d4cb204_08322243', 'product_name', $this->tplIndex);
?>

         <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_153123892262124c7d4e9761_69056722', 'product_reviews', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7472868362124c7d4f3b76_78018554', 'product_description_short', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_72607995262124c7d4ffe31_99510158', 'product_price_and_shipping', $this->tplIndex);
?>

           
            <div class="button-group highlighted-informations<?php if (!$_smarty_tpl->tpl_vars['product']->value['main_variants']) {?> no-variants<?php }?>">
                      <div class="btn-pro">
                        <div class="absbtn">
                          <div class="add-cart">
                            <form action="<?php echo htmlspecialchars(Context::getContext()->link->getPageLink('cart'), ENT_QUOTES, 'UTF-8');?>
" method="post">
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars(Tools::getToken(false), ENT_QUOTES, 'UTF-8');?>
">
                            <input type="hidden" name="id_product" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
                            <button class="cartb add-to-cart" data-button-action="add-to-cart" type="submit" <?php if (!$_smarty_tpl->tpl_vars['product']->value['quantity']) {?>disabled<?php }?>>
                              <svg width="17px" height="17px" class=""><use xlink:href="#pcart" /></svg><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'add to cart','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span><!-- <i class="material-icons">keyboard_backspace</i> -->
                            </button>
                            </form>
                          </div>
                             <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayCompareButton','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
 
                             <button data-toggle="tooltip" title="Wishlist" class="wish" id="wishlist_button" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
, 1); return false;">
                             <h5 class="pwish"><svg width="18px" height="17px"> <use xlink:href="#heart"></use></svg></h5>
                             <span class="pquick hidden-sm-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'wishlist','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
                          </button>
                          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_66692028262124c7d570735_13153571', 'quick_view', $this->tplIndex);
?>

                          
                      </div>
                          
                      </div>      
                    </div>
        
            <div class="button-group1 highlighted-informations<?php if (!$_smarty_tpl->tpl_vars['product']->value['main_variants']) {?> no-variants<?php }?>">
                      <div class="btn-pro">
                        <div class="absbtn">
                          <div class="add-cart">
                            <form action="<?php echo htmlspecialchars(Context::getContext()->link->getPageLink('cart'), ENT_QUOTES, 'UTF-8');?>
" method="post">
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars(Tools::getToken(false), ENT_QUOTES, 'UTF-8');?>
">
                            <input type="hidden" name="id_product" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
                            <button class="cartb add-to-cart" data-button-action="add-to-cart" type="submit" <?php if (!$_smarty_tpl->tpl_vars['product']->value['quantity']) {?>disabled<?php }?>>
                              <svg width="17px" height="17px" class=""><use xlink:href="#pcart" /></svg><!-- <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'add to cart','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span><i class="material-icons">keyboard_backspace</i> -->
                            </button>
                            </form>
                          </div>
                             <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayCompareButton','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>
 
                             <button data-toggle="tooltip" title="Wishlist" class="wish" id="wishlist_button" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
, 1); return false;">
                             <h5 class="pwish"><svg width="18px" height="17px"> <use xlink:href="#heart"></use></svg></h5>
                             <!-- <span class="pquick hidden-sm-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'wishlist','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span> -->
                          </button>
                          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_144127855662124c7d5b22b2_52410553', 'quick_view', $this->tplIndex);
?>

                          
                      </div>
                          
                      </div>      
                    </div>
      </div>
    </div>
  </article>
<?php
}
}
/* {/block 'product_miniature_item'} */
}
