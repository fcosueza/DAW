<?php
/* Smarty version 4.3.1, created on 2023-04-21 18:41:57
  from 'G:\onedrive\OneDrive - iesaguadulce.es\Mejoras DWES\UT04\proyecto_mvc\templates\bloques\remove_from_fav_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6442d8f56496d2_68249010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01c906934947ad585bfe1807ec7cc98872c59ddd' => 
    array (
      0 => 'G:\\onedrive\\OneDrive - iesaguadulce.es\\Mejoras DWES\\UT04\\proyecto_mvc\\templates\\bloques\\remove_from_fav_form.tpl',
      1 => 1682005892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6442d8f56496d2_68249010 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="?accion=removefromfav" method="post">
    <input type="hidden" name="idprod" value="<?php echo $_smarty_tpl->tpl_vars['idprod']->value;?>
">
    <input type="submit" value="Borrar de favoritos">
</form><?php }
}
