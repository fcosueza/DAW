<?php
/* Smarty version 4.3.1, created on 2023-04-21 18:17:42
  from 'G:\onedrive\OneDrive - iesaguadulce.es\Mejoras DWES\UT04\proyecto_mvc\templates\bloques\auth_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6442d34602d0b2_35433483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61423173b9288db25e945dadb53f295a37443547' => 
    array (
      0 => 'G:\\onedrive\\OneDrive - iesaguadulce.es\\Mejoras DWES\\UT04\\proyecto_mvc\\templates\\bloques\\auth_form.tpl',
      1 => 1682003690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6442d34602d0b2_35433483 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="?accion=autenticar" method="post">
    <label>Usuario:<input type="text" name="username"></label>
    <label>Password:<input type="password" name="password"></label>
    <input type="submit" value="Autenticar">
</form><?php }
}
