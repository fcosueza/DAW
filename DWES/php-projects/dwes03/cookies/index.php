<?php
  require_once 'conf.php';

  $ver = $_GET['ver'] ?? null;

//Si no se ha especificado $_GET['ver'] hemos que $ver tenga el "link" de la sección por defecto
  if (is_null($ver) || empty($ver)) {
      //Buscamos la posición del array $secciones donde está el nombre de sección por defecto
      $posSeccionDefecto = array_search(SECCION_DEFECTO, array_column($secciones, 'nombre'));
      if ($posSeccionDefecto !== false)
          $ver = $secciones[$posSeccionDefecto]['link'];
  }
//$seccion = sección a mostrar
  if (is_string($ver) && ($pos = array_search($ver, array_column($secciones, 'link'))) !== false) {
      $seccion = $secciones[$pos];
  }

//TODO: 
// 1.- obtener las cookies y verificar que no ha sido modificada (calcular hash)
// 2.- deserializar la cookie con la listad e sitios visitados.
// 3.- añadir la seccion recien visitada sin duplicados (usa la función time() para el momento de acceso), insertando el primero en la cookie
// 4.- envia la cookie y el hash
// 5.- en footer.php, muestra la lista de sitios visitados y la fecha en orden cronológico.
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1. Tarea 1. </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php require 'header.php'; ?>
        <div>

            <?php
//Buscamos el texto de "link" almacenado en $ver en las secciones y extraemos el archivo o contenido
              if (isset($seccion)) {
                  if (isset($seccion['contenido'])) {
                      $longitud = strlen($seccion['contenido']);
                      echo $seccion['contenido'];
                  } else if (isset($seccion['archivo']) && file_exists($seccion['archivo'])) {
                      readfile($archivo = $seccion['archivo']);
                  }
              } elseif ($ver) {
                  echo 'Sección <em>"' . htmlentities($ver) . '"</em> no encontrada.';
              }
            ?>
        </div>
        <?php require 'footer.php'; ?>
    </body>
</html>