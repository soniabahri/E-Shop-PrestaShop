<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:21
  from 'module:wbmegamenuviewstemplatesh' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c81baf9f1_09718686',
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
  'cache_lifetime' => 31536000,
),true)) {
function content_62124c81baf9f1_09718686 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Module Megamenu-->
<div id="_desktop_top_menu" class="container_wb_megamenu hidden-md-down text-xs-left col-xl-10 col-lg-9 col-md-9">
<div class="wb-menu-vertical clearfix">
	<div class="menu-vertical">
	<a href="javascript:void(0);" class="close-menu-content"><span><i class="fa fa-times" aria-hidden="true"></i></span></a>
	<ul class="menu-content">
									<li class="level-1 ">
					
					<a href="http://localhost/prestashop/fr/" class=""
					>
										<span>
						Accueil
											</span>
										</a>
					<span class="icon-drop-mobile"></span>
									</li>
												<li class="wbCart level-1 parent "><a href="http://localhost/prestashop/fr/3-maillots-de-femme" class=""><span>Maillots de Femme</span></a><span class="icon-drop-mobile"></span><ul class="menu-dropdown cat-drop-menu "><li class="wbCart level-2 "><a href="http://localhost/prestashop/fr/4-hommes" class=""><span>Hommes</span></a></li><li class="wbCart level-2 "><a href="http://localhost/prestashop/fr/5-femmes" class=""><span>Femmes</span></a></li><li class="wbCart level-2 "><a href="http://localhost/prestashop/fr/10-eline" class=""><span>Eline</span></a></li><li class="wbCart level-2 "><a href="http://localhost/prestashop/fr/11-rosa" class=""><span>Rosa</span></a></li><li class="wbCart level-2 "><a href="http://localhost/prestashop/fr/12-sofia" class=""><span>Sofia</span></a></li><li class="wbCart level-2 "><a href="http://localhost/prestashop/fr/13-sonia" class=""><span>Sonia</span></a></li></ul></li>
												<li class="level-1 ">
					
					<a href="http://localhost/prestashop/fr/nous-contacter" class=""
					>
										<span>
						Contactez-nous
											</span>
										</a>
					<span class="icon-drop-mobile"></span>
									</li>
						</ul>
	</div>
	<!-- <script type="text/javascript">
		text_more = "More";
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
	</script> -->
</div>
</div>
<!-- /Module Megamenu --><?php }
}
