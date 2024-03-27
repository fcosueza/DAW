<?php
/* Smarty version 4.3.1, created on 2024-03-27 12:53:57
  from '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/createTallerResult.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660408d5876ba0_21106820',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5678a5c74d724eeb756f5fc1dc32cf45ceb3ca7' => 
    array (
      0 => '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/createTallerResult.tpl',
      1 => 1711540431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:components/errorMsg.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_660408d5876ba0_21106820 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Talleres Asociación Respira"), 0, false);
?>

<div>
    <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value))) {?>
        <h2>El formulario no se ha enviado correctamente. Los errores son los siguientes:</h2>
        <ul class="errorList">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'msg', false, 'attr');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attr']->value => $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                <li><?php $_smarty_tpl->_subTemplateRender("file:components/errorMsg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('errorMsg'=>$_smarty_tpl->tpl_vars['msg']->value), 0, true);
?></li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    <?php } else { ?>
        <h1>El taller se ha guardado correctamente.</h1>
    <?php }?>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
