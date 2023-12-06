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
        <main>

            <?php
              require('utils/cargar_archivo.php');
              require('utils/filtrar_por.php');
              require('utils/resumen.php');

              $archivo = cargar_archivo("data.csv");

              $resultado = resumen($archivo);

              print_r($resultado);
            ?>
        </main>
    </body>
</html>


