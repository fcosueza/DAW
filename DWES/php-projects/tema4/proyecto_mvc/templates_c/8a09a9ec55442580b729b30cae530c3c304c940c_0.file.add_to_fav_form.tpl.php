<?php
/* Smarty version 4.3.1, created on 2024-02-06 13:10:45
  from 'C:\xampp\htdocs\DWES04_proyecto_mvc_productos_favoritos\proyecto_mvc\templates\bloques\add_to_fav_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65c221c5bb0f39_81917329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a09a9ec55442580b729b30cae530c3c304c940c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04_proyecto_mvc_productos_favoritos\\proyecto_mvc\\templates\\bloques\\add_to_fav_form.tpl',
      1 => 1682003686,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c221c5bb0f39_81917329 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="?accion=addtofav" method="post">
    <input type="hidden" name="idprod" value="<?php echo $_smarty_tpl->tpl_vars['idprod']->value;?>
">
    <input type="submit" value="Añadir a favoritos">
</form><?php }
}
