<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:19
  from 'C:\wamp\www\prestashop\themes\BlueSecret\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c7f1078e6_48604694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e9d2a93d1e8c231adb0fdd64e36604aecfa0481' => 
    array (
      0 => 'C:\\wamp\\www\\prestashop\\themes\\BlueSecret\\templates\\index.tpl',
      1 => 1645355121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c7f1078e6_48604694 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_27750561662124c7f0f1ef8_09995879', 'page_content_container');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_183961805262124c7f0f4c92_61711911 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_145273789162124c7f0fc403_08319074 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_59603359062124c7f0f9043_05994827 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_145273789162124c7f0fc403_08319074', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_27750561662124c7f0f1ef8_09995879 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_27750561662124c7f0f1ef8_09995879',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_183961805262124c7f0f4c92_61711911',
  ),
  'page_content' => 
  array (
    0 => 'Block_59603359062124c7f0f9043_05994827',
  ),
  'hook_home' => 
  array (
    0 => 'Block_145273789162124c7f0fc403_08319074',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_183961805262124c7f0f4c92_61711911', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_59603359062124c7f0f9043_05994827', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
}
