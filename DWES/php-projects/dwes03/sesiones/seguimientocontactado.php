<?php

//TODO: INCLUYE el archivo de control de sesión
//TODO: INCLUYE userauth.php

require_once __DIR__ . '/etc/conf.php';
require_once __DIR__ . '/src/conn.php';
require_once __DIR__ . '/src/dbfuncs.php';

//TODO: si no es el rol coord o trasoc no puede estar aquí --> usar función creada para ello

$idseguimiento = filter_input(INPUT_POST, 'id_seguimiento', FILTER_VALIDATE_INT);
$informe = filter_input(INPUT_POST, 'informe');
if (is_string($informe)) {
    $informe = strip_tags($informe, '<p><strong><b><i><em><u>');
    $informe = trim(addslashes($informe));
}
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
$usuario_id = filter_input(INPUT_POST, 'idusuario', FILTER_VALIDATE_INT);

//Salvaguarda - Si no es un entero, salimos.
if (!is_int($idseguimiento) || $idseguimiento <= 0) exit();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rellenar informe de seguimiento contactado</title>
        <link rel="stylesheet" href="styles/dwes02.css">
    </head>
    <body>
    <?php
        include __DIR__.'/extra/header.php';
    ?>
        <?php if ($action !== "registrarseguimiento" || is_null($informe) || strlen($informe) < 5): ?>
        
            <?php if (is_string($informe) && strlen($informe) < 5): ?>
                <h2>El informe tiene menos de 5 carácteres</h2>        
            <?php endif; ?>    
            
            <form action="" method="post">
                <label for="informe">Introduzca el informe de seguimiento:</label>
                <textarea name="informe" id="informe" cols="80" rows="10"><?= $informe ?? '' ?></textarea>
                <br>
                <input type="hidden" name="id_seguimiento" value="<?= $idseguimiento ?>">
                <input type="hidden" name="action" value="registrarseguimiento">
                <input type="hidden" name="idusuario" value="<?= $usuario_id ?>">
                <input type="submit" value="Confirmar contacto y añadir informe">
            </form>

        <?php else: ?>

            <?php
            $pdo = connect();
            
            /*TODO: antes de registrar contacto, hay que verificar que el $idseguimiento 
                es del usuario autenticado (función creada en userauth.php).*/

            $r = registrarcontactoseguimiento($pdo, $idseguimiento, $informe);
            if ($r === 1):
                ?>
                <h1>Informe registrado adecuadamente</h1>
                <?php if (isset($usuario_id)): ?>
                    <form action="detalleusuario.php" method="post">
                        <input type="hidden" name="idusuario" value="<?= $usuario_id ?>">
                        <input type="submit" value="Volver a detalles del usuario">
                    </form>            
            <?php endif; ?>
                <form action="usuarios.php" method="post">                    
                    <input type="submit" value="Volver a lista de usuarios">
                </form>
    <?php else: ?>
                <B>Error: posiblemente el informe ya se ha rellenado.</B>
            <?php endif; ?>
        <?php endif; ?>

    </body>
</html>