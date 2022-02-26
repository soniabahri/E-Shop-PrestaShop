<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:23
  from 'module:pscustomeraccountlinkspsc' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c83e01317_36141178',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42f9461127ce7396a601c2484841253ea5ba658f' => 
    array (
      0 => 'module:pscustomeraccountlinkspsc',
      1 => 1645355121,
      2 => 'module',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_62124c83e01317_36141178 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="block_myaccount_infos" class="col-sm-3 col-md-2 col-xs-12 links wrapper">
  <h3 class="myaccount-title hidden-sm-down">
    <a href="http://localhost/prestashop/fr/mon-compte" rel="nofollow">
      Votre compte
    </a>
  </h3>
  <div class="title clearfix hidden-md-up" data-target="#footer_account_list" data-toggle="collapse">
    <span class="h3">Votre compte</span>
    <span class="float-xs-right">
      <span class="navbar-toggler collapse-icons">
        <i class="fa fa-plus add"></i>
        <i class="fa fa-minus remove"></i>
      </span>
    </span>
  </div>
  <ul class="account-list collapse" id="footer_account_list">
            <li><i class="fa fa-angle-right"></i>
          <a href="http://localhost/prestashop/fr/identite" title="Informations personnelles" rel="nofollow">
            Informations personnelles
          </a>
        </li>
            <li><i class="fa fa-angle-right"></i>
          <a href="http://localhost/prestashop/fr/historique-commandes" title="Commandes" rel="nofollow">
            Commandes
          </a>
        </li>
            <li><i class="fa fa-angle-right"></i>
          <a href="http://localhost/prestashop/fr/avoirs" title="Avoirs" rel="nofollow">
            Avoirs
          </a>
        </li>
            <li><i class="fa fa-angle-right"></i>
          <a href="http://localhost/prestashop/fr/adresses" title="Adresses" rel="nofollow">
            Adresses
          </a>
        </li>
        <!-- MODULE WishList -->
<li class="footer-div">
<i class="fa fa-angle-right"></i>
	<a class="lnk_wishlist" href="http://localhost/prestashop/fr/module/blockwishlist/mywishlist" title="My wishlists">
		<span class="link-item">
            <!-- <i class="fa fa-heart-o"></i> -->
    		My wishlists
        </span>
	</a>
</li>
	<a class="lnk_wishlist1 col-lg-4 col-md-6 col-sm-6 col-xs-12" href="http://localhost/prestashop/fr/module/blockwishlist/mywishlist" title="My wishlists">
		<span class="link-item">
            <i class="fa fa-heart-o"></i>
    		My wishlists
        </span>
	</a>
<!-- END : MODULE WishList -->
  </ul>
</div><?php }
}
