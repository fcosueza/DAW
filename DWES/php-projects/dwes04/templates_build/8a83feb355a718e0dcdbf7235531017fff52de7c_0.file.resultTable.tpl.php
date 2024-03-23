<?php
/* Smarty version 4.3.1, created on 2024-03-23 11:38:45
  from '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/components/resultTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65feb135d062c3_89120952',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a83feb355a718e0dcdbf7235531017fff52de7c' => 
    array (
      0 => '/home/fcosueza/Source/DAW/DWES/php-projects/dwes04/templates/components/resultTable.tpl',
      1 => 1711190321,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65feb135d062c3_89120952 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table">
    <thead class="table__head">
        <tr>
            <th class="table__cell">Id</th>
            <th class="table__cell">Nombre</th>
            <th class="table__cell">Descripción</th>
            <th class="table__cell">Ubicacion</th>
            <th class="table__cell">Dia Semana</th>
            <th class="table__cell">Hora Inicio</th>
            <th class="table__cell">Hora Fin</th>
            <th class="table__cell">Cupo Máximo</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['talleres']->value, 'taller');
$_smarty_tpl->tpl_vars['taller']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['taller']->value) {
$_smarty_tpl->tpl_vars['taller']->do_else = false;
?>
            <tr>
                <td class="table__cell"><?php echo $_smarty_tpl->tpl_vars['taller']->value->getId();?>
</td>
                <td class="table__cell"><?php echo $_smarty_tpl->tpl_vars['taller']->value->getNombre();?>
</td>
                <td class="table__cell"><?php echo $_smarty_tpl->tpl_vars['taller']->value->getDescripcion();?>
</td>
                <td class="table__cell"><?php echo $_smarty_tpl->tpl_vars['taller']->value->getUbicacion();?>
</td>
                <td class="table__cell"><?php echo $_smarty_tpl->tpl_vars['taller']->value->getDia();?>
</td>
                <td class="table__cell"><?php echo $_smarty_tpl->tpl_vars['taller']->value->getHoraInicio();?>
</td>
                <td class="table__cell"><?php echo $_smarty_tpl->tpl_vars['taller']->value->getHoraFinal();?>
</td>
                <td class="table__cell"><?php echo $_smarty_tpl->tpl_vars['taller']->value->getCupo();?>
</td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php }
}
