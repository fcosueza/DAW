<?php
/* Smarty version 4.3.1, created on 2024-03-15 11:17:21
  from '/home/fcosueza/Source/DAW/DWES/php-projects/tema4/proyecto_mvc/templates/bloques/auth_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65f420317cbc00_64505511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a113a7b17f05abddb05fd514d08f3f88d554992f' => 
    array (
      0 => '/home/fcosueza/Source/DAW/DWES/php-projects/tema4/proyecto_mvc/templates/bloques/auth_form.tpl',
      1 => 1682000092,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f420317cbc00_64505511 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="?accion=autenticar" method="post">
    <label>Usuario:<input type="text" name="username"></label>
    <label>Password:<input type="password" name="password"></label>
    <input type="submit" value="Autenticar">
</form><?php }
}
