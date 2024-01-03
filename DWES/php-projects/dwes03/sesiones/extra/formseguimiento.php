<?php

if (!defined('MEDIOS_CONTACTO') || !is_array(MEDIOS_CONTACTO)){
    echo "<H1>ERROR: Intentando acceder dicectamente a script no permitido.</H1>";
    exit;
}
?>

<form action="registrarseguimiento.php" method="post">
    <h3>Crear nuevo seguimiento</h3>
    <label for="fecha">Fecha:
        <input type="text" id="fecha" name="fecha" value="<?php if (isset($datos) && $datos['fecha_espanol']) echo $datos['fecha_espanol']; ?>"> (formato dd/mm/AAAA)</label><br>
    <label for="hora">Hora:
        <input type="text" id="hora" name="hora" value="<?php if (isset($datos) && $datos['hora']) echo $datos['hora']; ?>">(formato HH:mm)</label><br>
    <?php 
    if (isset($empleados)) : ?>
        <label for="empleado">Empleado:
            <select id="idempleado" name="empleado">
                <?php                 
                foreach ($empleados as $datosEmpleado) : ?>
                    <option value="<?= $datosEmpleado['id'] ?>" <?php if (isset($datos) && $datosEmpleado['id'] === $datos['empleado_id']) echo "selected"; ?>>
                        <?= htmlspecialchars($datosEmpleado['nombre'] . ' ' . $datosEmpleado['apellidos']) ?>
                    </option>
                <?php endforeach; ?>
                <!-- Agrega más opciones según tus necesidades -->
            </select></label><br>
    <?php endif; ?>
    <label for="medio_contacto">Medio de Contacto:
        <select id="medio" name="medio_contacto">
            <?php foreach (MEDIOS_CONTACTO as $medio => $descMedio) : ?>
                <option value="<?= $medio ?>" <?php if (isset($datos) && $datos['medio'] === $medio) echo "selected"; ?>><?= htmlspecialchars($descMedio) ?></option>
            <?php endforeach; ?>
        </select></label><br>
    <label for="otro">Otro medio de contacto:
        <input type="text" name="otro" id="otro" value="<?= htmlspecialchars($datos['otro'] ?? ''); ?>"></label>
    <input type="hidden" name="idusuario" value="<?= $detalle_usuario['id'] ?>">
    <br>
    <input type="submit" value="Registrar seguimiento">
</form>