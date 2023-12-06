<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Francisco Javier Sueza Rodríguez" />
        <meta name="description" content="Tratamiento de archivos CSV" />

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/estilo.css" />

        <title>Asociación Respira: Ficheros CSV</title>
    </head>

    <body class="flex flex__columns">
        <main class="content">
            <h1 class="content__title"> Procesamiento del Archivo CSV </h1>

            <?php
              require('utils/cargar_archivo.php');
              require('utils/filtrar_por.php');
              require('utils/resumen.php');

              /*
               * Mostramos los datos el archivo
               */

              print '<h2 class="content__subtitle">Datos del Archivo: </h2>';
              print '<div class="content__data">';

              $archivo = cargar_archivo("datos.csv");

              print '<ul class="list">';
              foreach ($archivo as $registro => $fila) {
                  print '<br>';
                  print '<li>';

                  foreach ($fila as $nombre => $valor) {
                      if ($nombre == "asgs" || $nombre == "tiempolibre") {
                          print '<span class="list__name">' . $nombre . "</span>: " . implode("-", $valor) . " ";
                      } else {
                          print '<span class="list__name">' . $nombre . "</span>: " . $valor . " ";
                      }
                  }

                  print '</li>';
              }

              print '</ul>';

              /*
               * Filtrado del archivo
               */

              print '<h2 class="content__subtitle">Registros con el curso de 2ESO: </h2>';
              print '<div class="content__data">';

              $archivo = cargar_archivo("datos.csv");
              $resultado = filtrar_por_curso("2ESO", $archivo);

              print '<ul class="list">';
              foreach ($resultado as $registro => $fila) {
                  print '<br>';
                  print '<li>';

                  foreach ($fila as $nombre => $valor) {
                      if ($nombre == "asgs" || $nombre == "tiempolibre") {
                          print '<span class="list__name">' . $nombre . "</span>: " . implode("-", $valor) . " ";
                      } else {
                          print '<span class="list__name">' . $nombre . "</span>: " . $valor . " ";
                      }
                  }

                  print '</li>';
              }

              print '</ul>';

              /*
               * Resumen de las asignaturas
               */

              print '<h2 class="content__subtitle">Resumen de Asignaturas en los registros: </h2>';
              print '<div class="content__data">';

              $archivo = cargar_archivo("datos.csv");
              $asignaturas = resumen($archivo);

              print '<ul class="list">';
              foreach ($asignaturas as $asignatura => $cantidad) {
                  print '<br>';
                  print '<li>';

                  print '<span class="list__name">' . $asignatura . "</span>: " . $cantidad . " ";
                  print '</li>';
              }

              print '</ul>';
              print '</div>';
            ?>
        </main>
    </body>
</html>


