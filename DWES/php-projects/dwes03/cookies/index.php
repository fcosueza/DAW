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
      /*
       * Comprobamos que existen las cookies, en caso de que existan y no se hayan modificado, creamos
       * un nuevo array con la lista de sitios vistados y lo poblamos con las secciones visitadas.
       */

      if (isset($_COOKIE['lista_sitios_visitados']) && isset($_COOKIE['hash_lista_sitios_visitados'])) {
          if (hash('sha256', $_COOKIE['lista_sitios_visitados']) == $_COOKIE['hash_lista_sitios_visitados']) {

              $lista_visitados = unserialize($_COOKIE['lista_sitios_visitados']);

              if (is_array($lista_visitados)) {
                  $nombre_ultima = $seccion['nombre'];
                  $enlace_ultima = $seccion['link'];

                  $lista_actualizada = [];
                  $lista_actualizada[] = [
                      "nombre" => $nombre_ultima,
                      "link" => $enlace_ultima,
                      "hora" => date("d/m/Y H:i", time())
                  ];

                  foreach ($lista_visitados as $elemento => $registro)
                      if ($registro['nombre'] != $nombre_ultima) {
                          $lista_actualizada[] = [
                              "nombre" => $registro['nombre'],
                              "link" => $registro['link'],
                              "hora" => $registro['hora']
                          ];
                      }

                  if (count($lista_actualizada) > 5)
                      array_pop($lista_actualizada);

                  setcookie("lista_sitios_visitados", serialize($lista_actualizada));
                  setcookie("hash_lista_sitios_visitados", hash('sha256', serialize($lista_actualizada)));
              }
          } else {
              $nombre_ultima = $seccion['nombre'];
              $enlace_ultima = $seccion['link'];

              $lista_actualizada = [];
              $lista_actualizada[] = [
                  "nombre" => $nombre_ultima,
                  "link" => $enlace_ultima,
                  "hora" => date("d/m/Y H:i", time())
              ];

              setcookie("lista_sitios_visitados", serialize($lista_actualizada));
              setcookie("hash_lista_sitios_visitados", hash('sha256', serialize($lista_actualizada)));
          }
      } else {
          $nombre_ultima = $seccion['nombre'];
          $enlace_ultima = $seccion['link'];

          $lista_actualizada = [];
          $lista_actualizada[] = [
              "nombre" => $nombre_ultima,
              "link" => $enlace_ultima,
              "hora" => date("d/m/Y H:i", time())
          ];

          setcookie("lista_sitios_visitados", serialize($lista_actualizada));
          setcookie("hash_lista_sitios_visitados", hash('sha256', serialize($lista_actualizada)));
      }
  }
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