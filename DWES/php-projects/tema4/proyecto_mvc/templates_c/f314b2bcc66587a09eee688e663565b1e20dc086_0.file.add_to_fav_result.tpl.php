<?php
/* Smarty version 4.3.1, created on 2023-04-20 16:19:22
  from 'G:\onedrive\OneDrive - iesaguadulce.es\Mejoras DWES\UT04\proyecto_mvc\templates\add_to_fav_result.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6441660ad22d01_40630062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f314b2bcc66587a09eee688e663565b1e20dc086' => 
    array (
      0 => 'G:\\onedrive\\OneDrive - iesaguadulce.es\\Mejoras DWES\\UT04\\proyecto_mvc\\templates\\add_to_fav_result.tpl',
      1 => 1682007509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6441660ad22d01_40630062 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Resultado de añadir a favoritos"), 0, false);
echo $_smarty_tpl->tpl_vars['resultado']->value;?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
