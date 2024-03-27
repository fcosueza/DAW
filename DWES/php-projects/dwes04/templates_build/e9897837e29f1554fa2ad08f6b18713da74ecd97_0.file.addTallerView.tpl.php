<?php
/* Smarty version 4.3.1, created on 2024-03-26 11:19:49
  from '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/addTallerView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6602a14594e824_42209518',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9897837e29f1554fa2ad08f6b18713da74ecd97' => 
    array (
      0 => '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/addTallerView.tpl',
      1 => 1711448366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:components/addTallerForm.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6602a14594e824_42209518 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Talleres Asociación Respira"), 0, false);
$_smarty_tpl->_subTemplateRender("file:components/addTallerForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('options'=>$_smarty_tpl->tpl_vars['days']->value,'selected'=>$_smarty_tpl->tpl_vars['selected']->value), 0, false);
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
