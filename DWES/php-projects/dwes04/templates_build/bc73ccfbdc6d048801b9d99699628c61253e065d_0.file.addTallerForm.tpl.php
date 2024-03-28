<?php
/* Smarty version 4.3.1, created on 2024-03-28 10:38:02
  from '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/components/addTallerForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66053a7ac45660_80135746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc73ccfbdc6d048801b9d99699628c61253e065d' => 
    array (
      0 => '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/components/addTallerForm.tpl',
      1 => 1711618574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66053a7ac45660_80135746 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/vendor/smarty/smarty/libs/plugins/function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<form  class="form flex center" action="?accion=crear_taller" method="post">
    <div class="form__header">
        <h2 class="form__title">Taller Nuevo</h2>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="nombre">Nombre</label>
        <input class="form__input" id="nombre" name="nombre" type="text" required>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="descripcion">Descripción</label>
        <input class="form__input" id="descripcion" name="descripcion" type="text" required>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="ubicacion">Ubicación</label>
        <input class="form__input" id="ubicacion" name="ubicacion" type=ubicacion" required>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="dia">Dia de la Semana</label>
        <select class="form__select" id="dia" name="dia" required>
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'selected'=>$_smarty_tpl->tpl_vars['selected']->value),$_smarty_tpl);?>

        </select>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="hora_inicio">Hora de Inicio</label>
        <input class="form__input" id="hora_inicio" name="hora_inicio" type="time" required>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="hora_final">Hora de Final</label>
        <input class="form__input" id="hora_final" name="hora_final" type="time" required>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="cupo">Cupo</label>
        <input class="form__input" id="cupo" name="cupo" type="number"  min="5" max="30" required>
    </div>

    <button class="form__button" type="submit">Enviar</button>
</form><?php }
}
