<?php
/* Smarty version 4.3.1, created on 2023-04-20 15:15:00
  from 'G:\onedrive\OneDrive - iesaguadulce.es\Mejoras DWES\UT04\proyecto_mvc\templates\add_to_fav_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_644156f4d17cf9_77868337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be94826c8b497f5b408eda4f84f1edd5d88c9b48' => 
    array (
      0 => 'G:\\onedrive\\OneDrive - iesaguadulce.es\\Mejoras DWES\\UT04\\proyecto_mvc\\templates\\add_to_fav_form.tpl',
      1 => 1682003686,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_644156f4d17cf9_77868337 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="?accion=addtofav" method="post">
    <input type="hidden" name="idprod" value="<?php echo $_smarty_tpl->tpl_vars['idprod']->value;?>
">
    <input type="submit" value="Añadir a favoritos">
</form><?php }
}
