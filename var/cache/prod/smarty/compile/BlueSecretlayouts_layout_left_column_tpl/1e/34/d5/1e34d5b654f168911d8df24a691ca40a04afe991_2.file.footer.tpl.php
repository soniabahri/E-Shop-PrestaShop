<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:21:12
  from 'C:\wamp\www\prestashop\themes\BlueSecret\templates\_partials\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124e587a9469_56018919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e34d5b654f168911d8df24a691ca40a04afe991' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\themes\\BlueSecret\\templates\\_partials\\footer.tpl',
      1 => 1645355121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124e587a9469_56018919 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<div class="container">
  <div class="row">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21737342462124e58783596_61507913', 'hook_footer_before');
?>

</div>
</div>
<div class="fleftapp"></div>
<div class="footer-container">
  <div class="container">
      <div class="row">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_101840191262124e58787e27_25716705', 'hook_footer');
?>

    </div>
  </div>
</div>

<div class="copy text-xs-center">
<div class="container">
    <div class="row">
      <div class="">
        
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_105312562462124e587948c5_88364081', 'copyright_link');
?>

        </div>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterDown'),$_smarty_tpl ) );?>

    </div>
</div>
</div>
<a href="" id="scroll" title="Scroll to Top" style="display: block;"><i class="fa fa-angle-double-up"></i></a><?php }
/* {block 'hook_footer_before'} */
class Block_21737342462124e58783596_61507913 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_before' => 
  array (
    0 => 'Block_21737342462124e58783596_61507913',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterBefore'),$_smarty_tpl ) );?>

<?php
}
}
/* {/block 'hook_footer_before'} */
/* {block 'hook_footer'} */
class Block_101840191262124e58787e27_25716705 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer' => 
  array (
    0 => 'Block_101840191262124e58787e27_25716705',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooter'),$_smarty_tpl ) );?>

      <?php
}
}
/* {/block 'hook_footer'} */
/* {block 'copyright_link'} */
class Block_105312562462124e587948c5_88364081 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'copyright_link' => 
  array (
    0 => 'Block_105312562462124e587948c5_88364081',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <a class="_blank pull-left" href="http://www.prestashop.com" target="_blank">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%copyright% %year% - Ecommerce software by %prestashop%','sprintf'=>array('%prestashop%'=>'PrestaShop™','%year%'=>date('Y'),'%copyright%'=>'©'),'d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>

            </a>
          <?php
}
}
/* {/block 'copyright_link'} */
}
