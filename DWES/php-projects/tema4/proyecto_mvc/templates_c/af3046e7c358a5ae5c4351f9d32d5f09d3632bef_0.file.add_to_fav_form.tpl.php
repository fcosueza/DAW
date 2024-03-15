<?php
/* Smarty version 4.3.1, created on 2023-04-21 18:26:34
  from 'G:\onedrive\OneDrive - iesaguadulce.es\Mejoras DWES\UT04\proyecto_mvc\templates\bloques\add_to_fav_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6442d55a885e15_76670408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af3046e7c358a5ae5c4351f9d32d5f09d3632bef' => 
    array (
      0 => 'G:\\onedrive\\OneDrive - iesaguadulce.es\\Mejoras DWES\\UT04\\proyecto_mvc\\templates\\bloques\\add_to_fav_form.tpl',
      1 => 1682003686,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6442d55a885e15_76670408 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="?accion=addtofav" method="post">
    <input type="hidden" name="idprod" value="<?php echo $_smarty_tpl->tpl_vars['idprod']->value;?>
">
    <input type="submit" value="Añadir a favoritos">
</form><?php }
}
