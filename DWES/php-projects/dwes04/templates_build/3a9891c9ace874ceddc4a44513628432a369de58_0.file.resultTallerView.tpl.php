<?php
/* Smarty version 4.3.1, created on 2024-03-28 10:17:15
  from '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/resultTallerView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6605359b8d25f0_84269430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a9891c9ace874ceddc4a44513628432a369de58' => 
    array (
      0 => '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/resultTallerView.tpl',
      1 => 1711617426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:components/createTallerResult.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6605359b8d25f0_84269430 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Talleres Asociación Respira"), 0, false);
$_smarty_tpl->_subTemplateRender("file:components/createTallerResult.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('errors'=>(($tmp = $_smarty_tpl->tpl_vars['errors']->value ?? null)===null||$tmp==='' ? null ?? null : $tmp),'id'=>(($tmp = $_smarty_tpl->tpl_vars['id']->value ?? null)===null||$tmp==='' ? null ?? null : $tmp)), 0, false);
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
