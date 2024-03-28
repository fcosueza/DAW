<?php
/* Smarty version 4.3.1, created on 2024-03-28 10:29:11
  from '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/components/createTallerResult.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660538672fc196_92906075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72e1f89e7064f990f248f00b521c696f4a1efee0' => 
    array (
      0 => '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/components/createTallerResult.tpl',
      1 => 1711618146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/errorMsg.tpl' => 1,
  ),
),false)) {
function content_660538672fc196_92906075 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="result">
    <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value))) {?>
        <h2 class="result__title">Formulario con Errores!!</h2>
        <p class="result__text">
            El formulario no se ha podido enviar correctamente debido a que hay
            errores en los campos. En la siguiente lista, se muestran todos los
            errores que se han encontrado:
        </p>
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
        <h2 class="result__title">Formulario Enviado!!</h2>
        <p class="result__text">
            El formulario se ha enviado correctamente y el nuevo taller se ha
            añadido a la base de datos. El ID asignado a dicho taller es:
        </p>
        <h3 class="result__id">Taller ID: <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</h3>
    <?php }?>
</div><?php }
}
