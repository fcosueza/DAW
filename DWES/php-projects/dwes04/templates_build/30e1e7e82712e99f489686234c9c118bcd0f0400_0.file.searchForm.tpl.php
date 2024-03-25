<?php
/* Smarty version 4.3.1, created on 2024-03-25 12:35:27
  from '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/components/searchForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6601617f99eff9_76876290',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30e1e7e82712e99f489686234c9c118bcd0f0400' => 
    array (
      0 => '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/components/searchForm.tpl',
      1 => 1711366523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/errorMsg.tpl' => 1,
  ),
),false)) {
function content_6601617f99eff9_76876290 (Smarty_Internal_Template $_smarty_tpl) {
?><form class="form" action="http://php-projects/dwes04/index.php"  method="post">
    <input class="form__input" id="day" name="day" type="text" placeholder="Introduce el dia de la semana..">
    <button class="form__button" type="submit">Buscar</button>

    <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
        <?php $_smarty_tpl->_subTemplateRender("file:components/errorMsg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('errorMsg'=>$_smarty_tpl->tpl_vars['error']->value), 0, false);
?>
    <?php }?>
</form>
<?php }
}
