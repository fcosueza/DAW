<?php
/* Smarty version 4.3.1, created on 2023-04-20 15:51:38
  from 'G:\onedrive\OneDrive - iesaguadulce.es\Mejoras DWES\UT04\proyecto_mvc\templates\remove_from_fav_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64415f8a1830b7_10903376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3def67cf26a1fb4c2cdcfbdad27a39c1287718d1' => 
    array (
      0 => 'G:\\onedrive\\OneDrive - iesaguadulce.es\\Mejoras DWES\\UT04\\proyecto_mvc\\templates\\remove_from_fav_form.tpl',
      1 => 1682005892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64415f8a1830b7_10903376 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="?accion=removefromfav" method="post">
    <input type="hidden" name="idprod" value="<?php echo $_smarty_tpl->tpl_vars['idprod']->value;?>
">
    <input type="submit" value="Borrar de favoritos">
</form><?php }
}
