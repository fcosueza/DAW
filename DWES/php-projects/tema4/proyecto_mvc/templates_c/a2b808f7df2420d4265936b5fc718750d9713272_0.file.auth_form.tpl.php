<?php
/* Smarty version 4.3.1, created on 2023-04-20 15:14:54
  from 'G:\onedrive\OneDrive - iesaguadulce.es\Mejoras DWES\UT04\proyecto_mvc\templates\auth_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_644156eec5f986_33029521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2b808f7df2420d4265936b5fc718750d9713272' => 
    array (
      0 => 'G:\\onedrive\\OneDrive - iesaguadulce.es\\Mejoras DWES\\UT04\\proyecto_mvc\\templates\\auth_form.tpl',
      1 => 1682003690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_644156eec5f986_33029521 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="?accion=autenticar" method="post">
    <label>Usuario:<input type="text" name="username"></label>
    <label>Password:<input type="password" name="password"></label>
    <input type="submit" value="Autenticar">
</form><?php }
}
