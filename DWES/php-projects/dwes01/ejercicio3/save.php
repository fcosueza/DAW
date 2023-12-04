<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Francisco Javier Sueza Rodríguez" />
        <meta name="description" content="Formulario de Asociación Respira" />

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/estilo.css" />

        <title>Asociación Respira: Formulario</title>
    </head>

    <body>

        <?php
          /*
           * En este archivo vamos a comprobar la corrección de los datos, en concreto
           * de los dos arrays de asignatura y tiempo libre, ya que los demas los comprobamos
           * en el formulario anterior.
           *
           * Una vez comprobados, iremos comprobando la existencia de todos los datos
           * que se han recabado y creando los mensajes de error, si fuera el caso. Sino
           * se almacenaran los datos y se mostrará un mensaje que lo indique.
           */

          $asignaturas = [];
          $tiempoLibre = [];

          $msgError = "";
          $msgExito = "Los datos se han guardado satisfactoriaamente";

          $datos = [];
          $datosCorrectos = "true";

          /*
           * Creamos el array de datos y comenzamos a rellenarlo. Despues comprobaremos
           * que los datos son correctos para mostar un mensaje de error o no.
           */

          $datos['codigo_postal'] = $_POST['codigo_postal'];
          $datos['sexo'] = $_POST['sexo'];
          $datos['curso'] = $_POST['curso'];
          $datos['rama'] = $_POST['rama'];

          /*
           * Primero guardamos los datos
           */

          /*
           * Primero comprobamos el array de asignaturas. Si la asignatura es correcta y
           * además no es BG con el curso 2 de Eso seleccionado, escribiremos la asignatura
           * en el array de salida y guardamos los datos en el array de datos.
           *
           * Vamos a crear arrays con los valores permitidos para consultar si el valor
           * pertenece a alguno de ellos. De esta forma el código estará más claro y
           * además, será mas sencillo añadir nuevas asignaturas o elementos de tiempo libre.
           *
           */


          $valoresAsignatura = ["LCL", "M", "BG", "BH", "FQ", "Q"];

          if (count($_POST['asgs']) > 0) {
              foreach ($_POST['asgs'] as $asig) {
                  if (array_key_exists($asig, $valoresAsignatura) && !($_POST['curso'] != "2ESO" && $asig != "BG"))
                      $asignaturas[] = $asig;
              }
          }

          $datos['asignaturas'] = empty($asignaturas) ? "" : implode('-', $asignaturas);

          /*
           * A continuación comprobamos el array tiempolibre, añadiendo solo los elementos
           * que sean correctos al array de salida.
           */


          $valoresTiempoLibre = ["deportes", "musica", "danza", "art", "videojuegos", "television", "dom", "lectura"];

          if (count($_POST['tiempolibre']) > 0) {
              foreach ($_POST['tiempolibre'] as $libre) {
                  if (array_key_exists($tiempo, $valoresTiempoLibre))
                      $tiempoLibre[] = $libre;
              }
          }

          $datos['tiempoLibre'] = empty($tiempoLibre) ? "" : implode('-', $asignaturas);

          /*
           * Por último, recorremos el array de datos. Si algún dato falta, no se almacenará
           * y se guardará un mensaje de error correspondiente al dato. Si todo esta correcto,
           * se almacenará en un archivo csv.
           *

            foreach ($datos as $dato) {
            if (!isset($dato)) {
            $datosCorrectos = "false";
            $msgError += " - " . $dato . " no se ha introduzido correctamente.\n";
            }
            }

            if ($datosCorrectos) {
            $archivoCSV = fopen("datos.csv");

            fputcsv($archivo, $datos);
            fclose($archivoCSV);

            print '<h1>' . $msgExito . '</h1>';
            } else {
            print '<h1>Los datos introducidos no son correctos</h1>';
            print '<p> Los datos erróneos son: ';
            print $msgError;
            print '</p>';
            } */
        ?>

    </body>
</html>



