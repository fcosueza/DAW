<?php
/* Smarty version 4.3.1, created on 2024-03-23 12:10:36
  from '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/components/searchForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65feb8ac943970_95810199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30e1e7e82712e99f489686234c9c118bcd0f0400' => 
    array (
      0 => '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/components/searchForm.tpl',
      1 => 1711192232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65feb8ac943970_95810199 (Smarty_Internal_Template $_smarty_tpl) {
?><form class="form" action="http://php-projects/dwes04/index.php"  method="post">
    <input class="form__input" id="day" name="day" type="text" placeholder="Introduce el dia de la semana..">
    <button class="form__button" type="submit">Buscar</button>
</form>
<?php }
}
