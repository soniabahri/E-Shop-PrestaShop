<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:21
  from 'module:wbmegamenuviewstemplatesh' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c81487983_37228392',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4e24db0f4028ba1e13114d6b69cd13ce3940c22' => 
    array (
      0 => 'module:wbmegamenuviewstemplatesh',
      1 => 1645355119,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c81487983_37228392 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '116494146662124c81195dc3_78992834';
?>

<!-- Module Megamenu-->
<div id="_desktop_top_menu" class="container_wb_megamenu hidden-md-down text-xs-left col-xl-10 col-lg-9 col-md-9">
<div class="wb-menu-vertical clearfix">
<?php $_smarty_tpl->_assignInScope('id_lang', Context::getContext()->language->id);?>
	<div class="menu-vertical">
	<a href="javascript:void(0);" class="close-menu-content"><span><i class="fa fa-times" aria-hidden="true"></i></span></a>
	<ul class="menu-content">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menus']->value, 'menu', false, NULL, 'menus', array (
));
$_smarty_tpl->tpl_vars['menu']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->do_else = false;
?>
			<?php if ((isset($_smarty_tpl->tpl_vars['menu']->value['type'])) && $_smarty_tpl->tpl_vars['menu']->value['type'] == 'CAT' && $_smarty_tpl->tpl_vars['menu']->value['dropdown'] == 1) {?>
				<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value['sub_menu'],'quotes','UTF-8' ));?>

			<?php } else { ?>
				<li class="level-1 <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value['class'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
if (count($_smarty_tpl->tpl_vars['menu']->value['sub_menu']) > 0) {?> parent<?php }?>">
					
					<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="<?php if ($_smarty_tpl->tpl_vars['menu']->value['icon']) {?>wbIcon<?php }?>"
					>
					<?php if ($_smarty_tpl->tpl_vars['menu']->value['type_icon'] == 0 && $_smarty_tpl->tpl_vars['menu']->value['icon'] != '') {?>
						<img class="img-icon" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['icon_path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value['icon'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt=""/>
					<?php } elseif ($_smarty_tpl->tpl_vars['menu']->value['type_icon'] == 1 && $_smarty_tpl->tpl_vars['menu']->value['icon'] != '') {?>
						<i class="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value['icon'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"></i>
					<?php }?>
					<span>
						<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

						<?php if ($_smarty_tpl->tpl_vars['menu']->value['subtitle'] != '') {?><strong><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value['subtitle'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</strong><?php }?>
					</span>
										</a>
					<span class="icon-drop-mobile"></span>
					<?php if ((isset($_smarty_tpl->tpl_vars['menu']->value['sub_menu'])) && count($_smarty_tpl->tpl_vars['menu']->value['sub_menu']) > 0) {?>
						<div class="wb-sub-menu menu-dropdown col-xs-12 <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value['width_sub'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value['align_sub'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value['sub_menu'], 'menu_row', false, NULL, 'menu_row', array (
));
$_smarty_tpl->tpl_vars['menu_row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu_row']->value) {
$_smarty_tpl->tpl_vars['menu_row']->do_else = false;
?>
								<div class="wb-menu-row row <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu_row']->value['class'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
									<?php if ((isset($_smarty_tpl->tpl_vars['menu_row']->value['list_col'])) && count($_smarty_tpl->tpl_vars['menu_row']->value['list_col']) > 0) {?>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu_row']->value['list_col'], 'menu_col', false, NULL, 'menu_col', array (
));
$_smarty_tpl->tpl_vars['menu_col']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu_col']->value) {
$_smarty_tpl->tpl_vars['menu_col']->do_else = false;
?>
											<div class="wb-menu-col col-xs-12 <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu_col']->value['width'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu_col']->value['class'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu']->value['type'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
												<?php if (count($_smarty_tpl->tpl_vars['menu_col']->value['list_menu_item']) > 0) {?>
													<ul class="ul-column ">
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu_col']->value['list_menu_item'], 'sub_menu_item', false, NULL, 'sub_menu_item', array (
));
$_smarty_tpl->tpl_vars['sub_menu_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sub_menu_item']->value) {
$_smarty_tpl->tpl_vars['sub_menu_item']->do_else = false;
?>
														<li class="menu-item <?php if ($_smarty_tpl->tpl_vars['sub_menu_item']->value['type_item'] == 1) {?> item-header<?php } else { ?> item-line<?php }?> <?php if ($_smarty_tpl->tpl_vars['sub_menu_item']->value['type_link'] == 4) {?>product-block<?php }?>">
															<?php if ($_smarty_tpl->tpl_vars['sub_menu_item']->value['type_link'] == 4) {?>
																<?php $_smarty_tpl->_assignInScope('id_lang', Context::getContext()->language->id);?>
																<?php $_smarty_tpl->_assignInScope('id_lang', Context::getContext()->language->id);?>
																<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sub_menu_item']->value['product'], 'product', false, NULL, 'product', array (
));
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
																<div class="product-container clearfix">
																	
																	<div class="product-image-container float-xs-left">
																		<a class="product_img_link" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" itemprop="url">
																																						<img class="img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['pro_image'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
																		</a>
																	</div>
																	<div class="name-price">
																		<h3 class="product-name">
																			<a class="product-name" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" itemprop="url" >
																				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>

																			</a>
																		</h3>

																        <div class="content_price product-price-and-shipping">
																			<?php if ((isset($_smarty_tpl->tpl_vars['product']->value['show_price'])) && $_smarty_tpl->tpl_vars['product']->value['show_price'] && !(isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value))) {?>
																				<span itemprop="price" class="price <?php if ((isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])) && $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'] > 0) {?> special-price<?php }?>">												
																						<?php echo htmlspecialchars(Product::convertAndFormatPrice($_smarty_tpl->tpl_vars['product']->value['price']), ENT_QUOTES, 'UTF-8');?>


																						</span>
																				<?php if ((isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])) && $_smarty_tpl->tpl_vars['product']->value['specific_prices'] && (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])) && $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'] > 0) {?>
																						<span class="old-price regular-price">
																						<?php echo htmlspecialchars(Product::convertAndFormatPrice($_smarty_tpl->tpl_vars['product']->value['price_without_reduction']), ENT_QUOTES, 'UTF-8');?>

																						</span>
																				<?php }?>
																					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"price"),$_smarty_tpl ) );?>

																					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl ) );?>

																			<?php }?>
																		</div>
																		<div class="megamenu-review">
																		 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_46154610462124c8139e689_32853400', 'product_reviews');
?>

																         </div>
																	</div>
																		<?php if ((isset($_smarty_tpl->tpl_vars['product']->value['show_price'])) && $_smarty_tpl->tpl_vars['product']->value['show_price'] && !(isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value))) {?>
																			<?php if ((isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])) && $_smarty_tpl->tpl_vars['product']->value['specific_prices'] && (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])) && $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'] > 0) {?>
																					<p class="sale-bkg animated" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
																								<span class="sale">
																								<?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices'] && $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type'] == 'percentage') {?>
																								-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'],'quotes','UTF-8' ))*100, ENT_QUOTES, 'UTF-8');?>
%
																								<?php } else { ?>
																								-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['price']), ENT_QUOTES, 'UTF-8');?>

																								<?php }?>
																								</span>
																							</p>
																			<?php }?>
																			<?php }?>
																	   
																	
																</div>
																<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
															<?php } elseif ($_smarty_tpl->tpl_vars['sub_menu_item']->value['type_link'] == 3) {?>
																<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_menu_item']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_menu_item']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</a>
																<div class="html-block">
																	<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_menu_item']->value['text'],'quotes','UTF-8' ));?>

																</div>
															<?php } else { ?>
																<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_menu_item']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_menu_item']->value['title'],'html','UTF-8' ));?>
</a>
															<?php }?>
														</li>
													<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</ul>
												<?php }?>
											</div>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									<?php }?>
								</div>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</div>
					<?php }?>
				</li>
			<?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
	</div>
	<!-- <?php echo '<script'; ?>
 type="text/javascript">
		text_more = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'More','d'=>'Modules.WBMegamenu'),$_smarty_tpl ) );?>
";
		vnumLiItem = $("#wb-menu-vertical .menu-content li.level-1").length;
		nIpadHorizontal = 6;
		nIpadVertical = 5;
		function getHtmlHide(nIpad,vnumLiItem) 
			 {
				var htmlLiHide="";
				if($("#more_megamenu").length==0)
					for(var i=(nIpad+1);i<=vnumLiItem;i++)
						htmlLiHide+='<li>'+$('#wb-menu-vertical ul.menu-content li.level-1:nth-child('+i+')').html()+'</li>';
				return htmlLiHide;
			}

		htmlLiH = getHtmlHide(nIpadHorizontal,vnumLiItem);
		htmlLiV = getHtmlHide(nIpadVertical,vnumLiItem);
		htmlMenu=$("#wb-menu-vertical").html();
		
		$(window).load(function(){
		addMoreResponsive(nIpadHorizontal,nIpadVertical,htmlLiH,htmlLiV,htmlMenu);
		});
		$(window).resize(function(){
		addMoreResponsive(nIpadHorizontal,nIpadVertical,htmlLiH,htmlLiV,htmlMenu);
		});
	<?php echo '</script'; ?>
> -->
</div>
</div>
<!-- /Module Megamenu --><?php }
/* {block 'product_reviews'} */
class Block_46154610462124c8139e689_32853400 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_reviews' => 
  array (
    0 => 'Block_46154610462124c8139e689_32853400',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

																            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

																          <?php
}
}
/* {/block 'product_reviews'} */
}
