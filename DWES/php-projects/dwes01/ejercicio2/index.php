<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Francisco Javier Sueza Rodríguez" />
        <meta name="description" content="Web de la Asociación Respira" />

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/estilo.css" />

        <title>Asociación Respira</title>
    </head>

    <body class="flex flex__columns">
        <?php
          require_once 'conf.php';
          require 'header.php';
          require 'footer.php';

          // Establecemos la sección por defecto y el archivo que hay que cargar.

          $seccionActual = SECCION_DEFECTO;
          $archivo = $secciones[0]['archivo'];

          // Si el parametro ver de Get esta es correcto, cabiamos la seccion

          foreach ($secciones as $seccion) {
              if ($_GET['ver'] == $seccion['link']) {
                  $seccionActual = $seccion['link'];
                  $archivo = $seccion['archivo'];
              }
          }

          // Creamos la cabecera

          generarCabecera($seccionActual, $secciones);

          // Cargamos el archivo de la sección actual dentro de una etiqueta main

          print '<main class="content flex">';
          readfile($archivo);
          print '</main>';

          // Cargamos el píe de página

          generarPie();
        ?>
    </body>
</html>
