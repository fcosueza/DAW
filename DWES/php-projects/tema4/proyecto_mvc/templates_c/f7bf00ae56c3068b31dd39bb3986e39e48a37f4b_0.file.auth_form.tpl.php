<?php
/* Smarty version 4.3.1, created on 2024-02-06 13:10:33
  from 'C:\xampp\htdocs\DWES04_proyecto_mvc_productos_favoritos\proyecto_mvc\templates\bloques\auth_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65c221b91669b7_48030267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7bf00ae56c3068b31dd39bb3986e39e48a37f4b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04_proyecto_mvc_productos_favoritos\\proyecto_mvc\\templates\\bloques\\auth_form.tpl',
      1 => 1682003690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c221b91669b7_48030267 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="?accion=autenticar" method="post">
    <label>Usuario:<input type="text" name="username"></label>
    <label>Password:<input type="password" name="password"></label>
    <input type="submit" value="Autenticar">
</form><?php }
}
