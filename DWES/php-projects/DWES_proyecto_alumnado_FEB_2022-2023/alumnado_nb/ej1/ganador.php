<?php
  require_once('./vars.php');
  require_once('./funciones.php');

  global $participantes;

  if (isset($_POST["seleccionar"])) {
      $nombre = array_search("Seleccionar", $_POST["seleccionar"]);

      print_r($nombre);

      foreach ($participantes as $participante) {
          print_r($participante["imagen_url"]);

          if ($participante["nombre"] == $nombre) {
              $imagen = $participante["imagen_url"];
          }
      }
  } else {
      header("Location: index.php");
  }
  //Debes modificar este script para que se muestre el ganador, seleccionado (que es recibido por $_POST). Si no hay datos en $_POST debes mandar al usuario de vuelta a index.php
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1: Candidatos finalistas</title>
        <style>

        </style>
    </head>
    <body>
        <h1>¡Enhorabuena a <?= $nombre ?>!</h1>
        <p><img src="<?= $imagen ?>" alt="Imagen del ganador"></p>

    </body>
</html>