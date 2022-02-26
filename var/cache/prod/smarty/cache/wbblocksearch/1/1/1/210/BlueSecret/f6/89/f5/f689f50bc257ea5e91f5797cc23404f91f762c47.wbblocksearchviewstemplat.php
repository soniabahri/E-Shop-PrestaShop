<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:21
  from 'module:wbblocksearchviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c81e96613_93666953',
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
  'cache_lifetime' => 31536000,
),true)) {
function content_62124c81e96613_93666953 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
				<option value="all">All Categories</option>
				<option value="2">Accueil</option><option value="3">--Maillots de Femme</option><option value="4">----Hommes</option><option value="5">----Femmes</option><option value="10">----Eline</option><option value="11">----Rosa</option><option value="12">----Sofia</option><option value="13">----Sonia</option>
			</select>
		<form id="searchbox" class="input-group" method="get" action="http://localhost/prestashop/fr/recherche">
		   
			<input type="hidden" name="controller" value="search">
			
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			
			<input class="search_query form-control float-xs-left text-capitalize" type="text" id="search_query_top" name="s" placeholder="Search entire store..." value="" />
			
			<div id="wb_url_ajax_search" style="display:none">
			<input type="hidden" value="http://localhost/prestashop/modules/wbblocksearch/controller_ajax_search.php" class="url_ajax" />
			</div>
			<div class="input-group-btn">
			<!-- <button type="submit" name="submit_search" class="btn btn-default button-search">
				<span class="f1 text-capitalize">Search</span>
			</button> -->
			<a href="javascript:void(0)" class="closebtn close-nav" onclick="closeSearch()"><i class="fa fa-close"></i></a>
			</div>
		</form>
		
	</div>
</div>
</div><script type="text/javascript">
var limit_character = "<p class='limit'>Number of characters at least are 3</p>";
var close_text = "close";
</script>
<!-- /Block search module TOP --><?php }
}
