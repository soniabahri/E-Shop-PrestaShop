<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:21
  from 'module:wbblocksearchviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c81d664d6_18754096',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8de0f71efbe158c813f6cf11de131ef8ab551fc' => 
    array (
      0 => 'module:wbblocksearchviewstemplat',
      1 => 1645355119,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c81d664d6_18754096 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '157295092662124c81d1fbd4_43363640';
?>

<?php if ((isset($_smarty_tpl->tpl_vars['hook_mobile']->value))) {?>
	<div class="input_search" data-role="fieldcontain">
		<form method="get" action="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" id="searchbox">
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query" type="search" id="search_query_top" name="search_query" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search entire store...','mod'=>'wbblocksearch'),$_smarty_tpl ) );?>
" value="<?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['search_query']->value,'html','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
" />
		</form>
	</div>
<?php } else { ?>
<!-- Block search module TOP -->
<div class="desktop-search d-inline-block">
<div class="d-search">
	<button id="search_toggle" class="search-toggle" data-toggle="collapse" onclick="openSearch()">
           <svg width="21px" height="20px"><use xlink:href="#hsearch" /></svg>
	</button>
</div>
<div class="wbSearch" id="search_toggle_desc">
	<div id="search_block_top">
		<select id="search_category" name="search_category" class="form-control float-xs-left text-capitalize">
				<option value="all"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All Categories','mod'=>'wbblocksearch'),$_smarty_tpl ) );?>
</option>
				<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['search_category']->value,'quotes','UTF-8' ));?>

			</select>
		<form id="searchbox" class="input-group" method="get" action="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['search_controller_url']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
		   
			<input type="hidden" name="controller" value="search">
			
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			
			<input class="search_query form-control float-xs-left text-capitalize" type="text" id="search_query_top" name="s" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search entire store...','mod'=>'wbblocksearch'),$_smarty_tpl ) );?>
" value="<?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['search_query']->value,'htmlall','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
" />
			
			<div id="wb_url_ajax_search" style="display:none">
			<input type="hidden" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['base_ssl']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
/controller_ajax_search.php" class="url_ajax" />
			</div>
			<div class="input-group-btn">
			<!-- <button type="submit" name="submit_search" class="btn btn-default button-search">
				<span class="f1 text-capitalize"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search','mod'=>'wbblocksearch'),$_smarty_tpl ) );?>
</span>
			</button> -->
			<a href="javascript:void(0)" class="closebtn close-nav" onclick="closeSearch()"><i class="fa fa-close"></i></a>
			</div>
		</form>
		
	</div>
</div>
<?php }?>
</div><?php echo '<script'; ?>
 type="text/javascript">
var limit_character = "<p class='limit'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Number of characters at least are 3','mod'=>'wbblocksearch'),$_smarty_tpl ) );?>
</p>";
var close_text = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'close','mod'=>'wbblocksearch'),$_smarty_tpl ) );?>
";
<?php echo '</script'; ?>
>
<!-- /Block search module TOP --><?php }
}
