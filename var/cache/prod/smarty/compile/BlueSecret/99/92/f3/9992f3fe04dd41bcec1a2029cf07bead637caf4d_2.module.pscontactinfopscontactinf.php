<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:23
  from 'module:pscontactinfopscontactinf' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c838a92f7_61083314',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9992f3fe04dd41bcec1a2029cf07bead637caf4d' => 
    array (
      0 => 'module:pscontactinfopscontactinf',
      1 => 1645355121,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c838a92f7_61083314 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="block-contact col-md-3 col-sm-4 col-lg-3 col-xs-12 links wrapper">
<h4 class="hidden-sm-down c-info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Store information','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</h4>

<div class="title clearfix hidden-md-up" data-toggle="collapse" data-target="#footer_contact">
    <span class="h3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'contact information','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
   <span class="float-xs-right">
          <span class="navbar-toggler collapse-icons">
            <i class="fa fa-plus add"></i>
            <i class="fa fa-minus remove"></i>
          </span>
  </span>
  </div>
  <ul id="footer_contact" class="fthr collapse">
  <li class="block">
    <div class="icon float-xs-left"><svg width="20px" height="20px"><use xlink:href="#add"></use></svg></div>
    <div class="data ad"><?php echo $_smarty_tpl->tpl_vars['contact_infos']->value['address']['formatted'];?>
</div>
  </li>

  <?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['phone']) {?>
    <li class="block">
      <div class="icon float-xs-left"><svg width="20px" height="20px"><use xlink:href="#phone"></use></svg></div>
      <div class="data">
        <a href="tel:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['phone'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['phone'], ENT_QUOTES, 'UTF-8');?>
</a>
       </div>
    </li>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['fax']) {?>
    <li class="block">
      <div class="icon float-xs-left"><svg width="21px" height="20px"><use xlink:href="#fax"></use></svg></div>
      <div class="data">
             <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['fax'], ENT_QUOTES, 'UTF-8');?>

      </div>
    </li>
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['email']) {?>
    <li class="block">
      <div class="icon float-xs-left"><svg width="22px" height="22px"><use xlink:href="#mail"></use></svg></div>
      <div class="data email">
      <a href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['email'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['email'], ENT_QUOTES, 'UTF-8');?>
</a>
       </div>
    </li>
  <?php }?>
<!-- <div class="pay-connect text-md-left pull-right">
<h3 class="pay d-inline-block">download this app :</h3>
<ul class="list-inline-pay list-unstyled d-inline-block">
<li><a href="#"><img class="fb1"></a></li>
<li><a href="#"><img class="fb2"></a></li>
</ul>
</div> -->
</ul>
</div><?php }
}
