<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:19
  from 'C:\wamp\www\prestashop\themes\BlueSecret\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c7f256513_67846702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31adc23c71cb6844d4c15698498cb1c7933d0d70' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\themes\\BlueSecret\\templates\\page.tpl',
      1 => 1645355121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c7f256513_67846702 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_94708643162124c7f22ac76_60482072', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_108224323862124c7f22fb49_58928004 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1 class="heading1 text-xs-left"><span><span><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</span></span></h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_133044540962124c7f22c7d0_52439827 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_108224323862124c7f22fb49_58928004', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_20948313862124c7f23fdd0_56474872 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_105684493362124c7f243f83_46687100 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_43156854162124c7f23cfe7_55063057 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20948313862124c7f23fdd0_56474872', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_105684493362124c7f243f83_46687100', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_20599117962124c7f24f060_12382966 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_163811977862124c7f24c3a3_69048830 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20599117962124c7f24f060_12382966', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_94708643162124c7f22ac76_60482072 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_94708643162124c7f22ac76_60482072',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_133044540962124c7f22c7d0_52439827',
  ),
  'page_title' => 
  array (
    0 => 'Block_108224323862124c7f22fb49_58928004',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_43156854162124c7f23cfe7_55063057',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_20948313862124c7f23fdd0_56474872',
  ),
  'page_content' => 
  array (
    0 => 'Block_105684493362124c7f243f83_46687100',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_163811977862124c7f24c3a3_69048830',
  ),
  'page_footer' => 
  array (
    0 => 'Block_20599117962124c7f24f060_12382966',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_133044540962124c7f22c7d0_52439827', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_43156854162124c7f23cfe7_55063057', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163811977862124c7f24c3a3_69048830', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
