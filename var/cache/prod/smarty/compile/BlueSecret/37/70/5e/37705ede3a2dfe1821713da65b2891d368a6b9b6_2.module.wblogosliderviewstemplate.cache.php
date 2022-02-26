<?php
/* Smarty version 3.1.39, created on 2022-02-20 15:13:18
  from 'module:wblogosliderviewstemplate' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62124c7ebd92c2_69949398',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37705ede3a2dfe1821713da65b2891d368a6b9b6' => 
    array (
      0 => 'module:wblogosliderviewstemplate',
      1 => 1645355119,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62124c7ebd92c2_69949398 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '103875708262124c7eb86ff1_77109938';
?>

<div class="logos col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="">
    <?php if ($_smarty_tpl->tpl_vars['logoslider']->value['slides']) {?>
      <div id="owl-logo" class="owl-carousel logo-slider" data-interval="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logoslider']->value['speed'], ENT_QUOTES, 'UTF-8');?>
" data-wrap="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logoslider']->value['wrap'], ENT_QUOTES, 'UTF-8');?>
" data-pause="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logoslider']->value['pause'], ENT_QUOTES, 'UTF-8');?>
">
          <?php $_smarty_tpl->_assignInScope('num_row', 2);?> <!-- Number of Row Ex 2,3,4,5....etc-->
          <?php $_smarty_tpl->_assignInScope('i', 0);?>
          <?php if (count($_smarty_tpl->tpl_vars['logoslider']->value['slides']) <= 2) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['logoslider']->value['slides'], 'slide');
$_smarty_tpl->tpl_vars['slide']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->do_else = false;
?>
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
                  <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"  class="img-responsive center-block"/>
                </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
             <?php } else { ?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['logoslider']->value['slides'], 'slide');
$_smarty_tpl->tpl_vars['slide']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->do_else = false;
?>
              <?php if ($_smarty_tpl->tpl_vars['i']->value == 0) {?>
                <ul>
                  <li>
              <?php }?>
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
                  <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"  class="img-responsive center-block"/>
                </a>
                <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
              <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['num_row']->value) {?>
                  </li>
                </ul>
                <?php $_smarty_tpl->_assignInScope('i', 0);?>
              <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
        </div>
    <?php }?>
    </div>
</div>
</div>
</div><?php }
}
