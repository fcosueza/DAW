<?php
if (!isset($datos)) {
    echo 'No está la variable $datos';
    return;
}
if (empty($datos)) {
    echo '<H2>No hay ficheros subidos</H2>';
    return;
}
?>
<br><br>
<H2>Gestión de archivos</H2>
<table border='1'>
    <tr>
        <th>Nombre del archivo</th>
        <th>Tipo</th>
        <th>Tamaño (en bytes)</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($datos as $fila) : ?>
        <tr>
            <td><?= $fila['name'] ?></td>
            <td><?= $fila['type'] ?></td>
            <td><?= $fila['size'] ?></td>
            <td><?= $fila['estado'] ?></td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="delete" value="<?= $fila['HASH256'] ?>">
                    <input type="submit" value="Eliminar">
                </form>
                <form action="" method="POST">
                    <input type="hidden" name="subirarchivo" value="<?= $fila['HASH256'] ?>">
                    <input type="submit" value="Escanear">
                </form>
                <form action="" method="POST">
                    <input type="hidden" name="resultadosEscaneo" value="<?= $fila['HASH256'] ?>">
                    <input type="submit" value="Ver Resultados Escaneo">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>