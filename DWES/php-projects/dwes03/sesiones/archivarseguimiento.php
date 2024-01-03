<?php
//TODO: INCLUYE el archivo de control de sesión
//TODO: INCLUYE userauth.php

require_once __DIR__.'/etc/conf.php';
require_once __DIR__.'/src/conn.php';
require_once __DIR__.'/src/dbfuncs.php';
require_once __DIR__.'/extra/utils.php';
$idseguimiento=filter_input(INPUT_POST,'idseguimiento',FILTER_VALIDATE_INT);
$idusuario = filter_input(INPUT_POST, 'idusuario', FILTER_VALIDATE_INT);
$confirmado = filter_input(INPUT_POST, 'confirmado',FILTER_SANITIZE_SPECIAL_CHARS);
$enviado = filter_input(INPUT_POST, 'enviado',FILTER_SANITIZE_SPECIAL_CHARS);
//Salvaguarda - Si no es un entero, salimos.
if (!is_int($idseguimiento) || $idseguimiento <= 0) exit();

//TODO: verificar si el usuario es coordinador. Solo coordinador puede archivar --> usar función creada para ello en userauth.php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivar seguimiento</title>
    <link rel="stylesheet" href="styles/dwes02.css">
</head>
<body>
    <?php
        include __DIR__.'/extra/header.php';
    ?>
    <?php if(!isset($enviado)): ?>
        <form action="" method="post">
            <label>Marca la siguiente casilla para confirmar la operación de archivado 
            <input type="checkbox" name="confirmado" value="SI"></label>
            <input type="hidden" name="enviado" value="SI"></label>
            <input type="submit" value="ARCHIVAR">            
            <input type="hidden" name="idseguimiento" value="<?= $idseguimiento ?>">
            <input type="hidden" name="idusuario" value="<?=$idusuario?>">

        </form>
    <?php elseif($confirmado==='SI' && $enviado==='SI'):?>

            <?php
            //TODO: verificar si el usuario es coordinador. Solo coordinador puede archivar --> usar función creada para ello en userauth.php

            if (is_int($idseguimiento) && $idseguimiento>0):
                    $pdo=connect();
                    $r=archivarseguimiento($pdo,$idseguimiento);                    
                    if($r>0)
                    {
                        echo '<H3 style="text-align:center">Seguimiento archivado</H3>';
                    }        
                    else
                    {
                        echo '<H3 style="text-align:center">No se ha podido archivar el seguimiento. Posiblemente ya estaba archivado.</H3>';
                    }
            else: ?>
                <H3 style="text-align:center">Datos necesarios no recibidos.</H3>
            <?php endif; ?>
    <?php else: ?>
        <H3 style="text-align:center">Archivado NO realizado.</H3> 
    <?php endif; ?>
            <?php if(is_int($idusuario) && $idusuario>0):?>
            <form action="detalleusuario.php" method="post">
                <input type="hidden" name="idusuario" value="<?=$idusuario?>">
                <input type="submit" value="Volver a detalles del usuario">
            </form>
            <?php endif;?>
            <form action="usuarios.php" method="post">                    
                <input type="submit" value="Volver a lista de usuarios">
            </form>
    
</body>
</html>