<?php
/* Smarty version 4.3.1, created on 2024-02-06 13:10:55
  from 'C:\xampp\htdocs\DWES04_proyecto_mvc_productos_favoritos\proyecto_mvc\templates\bloques\remove_from_fav_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65c221cf51da79_32330744',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a721d2789e6e47107eba1bb475b72416f6f6569' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04_proyecto_mvc_productos_favoritos\\proyecto_mvc\\templates\\bloques\\remove_from_fav_form.tpl',
      1 => 1682005892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c221cf51da79_32330744 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="?accion=removefromfav" method="post">
    <input type="hidden" name="idprod" value="<?php echo $_smarty_tpl->tpl_vars['idprod']->value;?>
">
    <input type="submit" value="Borrar de favoritos">
</form><?php }
}
