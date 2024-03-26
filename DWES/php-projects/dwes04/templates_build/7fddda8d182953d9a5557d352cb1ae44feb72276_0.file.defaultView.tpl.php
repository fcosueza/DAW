<?php
/* Smarty version 4.3.1, created on 2024-03-26 10:03:15
  from '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/defaultView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66028f533d8e47_12257283',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fddda8d182953d9a5557d352cb1ae44feb72276' => 
    array (
      0 => '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/defaultView.tpl',
      1 => 1711443789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:components/searchForm.tpl' => 1,
    'file:components/resultTable.tpl' => 1,
    'file:components/addTallerButton.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_66028f533d8e47_12257283 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Talleres Asociación Respira"), 0, false);
$_smarty_tpl->_subTemplateRender("file:components/searchForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('errorMsg'=>(($tmp = $_smarty_tpl->tpl_vars['errorMsg']->value ?? null)===null||$tmp==='' ? null ?? null : $tmp)), 0, false);
$_smarty_tpl->_subTemplateRender("file:components/resultTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('talleres'=>$_smarty_tpl->tpl_vars['talleres']->value), 0, false);
$_smarty_tpl->_subTemplateRender("file:components/addTallerButton.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
