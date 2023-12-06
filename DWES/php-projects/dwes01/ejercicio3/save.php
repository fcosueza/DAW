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
          $msgExito = "<h1>Los datos se han guardado correctamente.</h1>";

          $datos = [];
          $datosCorrectos = true;

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


          $valoresAsignatura = ["LCL", "M", "BG", "GH", "FQ", "I"];

          if (isset($_POST['asgs']) && count($_POST['asgs']) > 0) {

              foreach ($_POST['asgs'] as $asignatura => $asig) {
                  if (in_array($asig, $valoresAsignatura) && !($asig == 'BG' && $datos['curso'] == '2ESO'))
                      $asignaturas[] = $asig;
              }
          }

          $datos['asignaturas'] = implode('-', $asignaturas);

          /*
           * A continuación comprobamos el array tiempolibre, añadiendo solo los elementos
           * que sean correctos al array de salida.
           */


          $valoresTiempoLibre = ["deportes", "musica", "danza", "art", "vjuegos", "television", "dom", "lectura"];

          if (isset($_POST['tiempolibre']) && count($_POST['tiempolibre']) > 0) {

              foreach ($_POST['tiempolibre'] as $tiempo => $libre) {
                  if (in_array($libre, $valoresTiempoLibre))
                      $tiempoLibre[] = $libre;
              }
          }

          $datos['tiempoLibre'] = implode('-', $tiempoLibre);

          /*
           * Por último, recorremos el array de datos. Si algún dato falta, no se almacenará
           * y se guardará un mensaje de error correspondiente al dato. Si todo esta correcto,
           * se almacenará en un archivo csv.
           */

          foreach ($datos as $dato => $valor) {
              if (empty($valor)) {
                  $datosCorrectos = false;
                  $msgError .= ' <li class="list__item"> El dato <span class="error">' . $dato . '</span> no se ha introducido correctamente. <br> </li>';
              }
          }

          /*
           * Imprimimos los mensajes correspondientes. En caso de que los datos sean correctos,
           * los escribimos en el archivo CSV, almacenando primero el nombre de las cabeceras.
           */


          print '<div class="flex flex__columns contenido message">';

          if ($datosCorrectos) {

              /*
               * Comprobamos si el archivo ya estaba creado. Si no esta creado, se
               * crea y se le añade la cabecera.
               */

              if (!file_exists('datos.csv')) {
                  $archivoCSV = fopen('datos.csv', 'a');
                  $cabeceraCVS = ["codigo_postal", "sexo", "curso", "rama", "asgs", "tiempolibre"];

                  fputcsv($archivoCSV, $cabeceraCVS);
                  fclose($archivoCSV);
              }

              // Escribimos el resto de datos

              $archivoCSV = fopen('datos.csv', 'a');

              fputcsv($archivoCSV, $datos);
              fclose($archivoCSV);

              print $msgExito;
          } else {
              print '<h1 class="message__title"> Los datos introducidos no son correctos </h1>';
              print '<h2 class="message__subtitle"> Los errores son: </h2>';
              print '<ul>';
              print $msgError;
              print '</ul>';
          }

          print '</div';
        ?>

    </body>
</html>



