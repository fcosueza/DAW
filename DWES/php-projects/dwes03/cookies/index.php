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
       * En primer lugar creamos un array con la lista actualizada de visitas. Esta entrada
       * siempre se va a enviar, independientemente de que estén o no creadas las cookies o
       * de que coincida el hash, ya que en cualquier caso, se va a crear una cookie con la
       * entrada de la página que se esta visitando actualmente.
       */

      $nombre_ultima = $seccion['nombre'];
      $enlace_ultima = $seccion['link'];

      $lista_actualizada = [];
      $lista_actualizada[] = [
          "nombre" => $nombre_ultima,
          "link" => $enlace_ultima,
          "hora" => date("d/m/Y H:i", time())
      ];

      /*
       * Comprobamos que hay cookies existentes y que el hash coincide. En ese caso,
       * agreamos la información de dichas cookies a la lista actualizada.
       */

      if (isset($_COOKIE['lista_sitios_visitados']) && isset($_COOKIE['hash_lista_sitios_visitados'])) {
          if (hash('sha256', $_COOKIE['lista_sitios_visitados'] . SALT) == $_COOKIE['hash_lista_sitios_visitados']) {

              $lista_visitados = unserialize($_COOKIE['lista_sitios_visitados']);

              if (is_array($lista_visitados)) {
                  foreach ($lista_visitados as $elemento => $registro)
                      if ($registro['nombre'] != $nombre_ultima) {
                          $lista_actualizada[] = [
                              "nombre" => $registro['nombre'],
                              "link" => $registro['link'],
                              "hora" => $registro['hora']
                          ];
                      }
              }
          }
      }

      /*
       * Comprobamos que el array no tenga más de 5 elementos, en ese caso,
       * se eliminar el último.
       */

      if (count($lista_actualizada) > 5)
          array_pop($lista_actualizada);

      /*
       * Creamos las cookies y las enviamos al navegador.
       */

      setcookie("lista_sitios_visitados", serialize($lista_actualizada));
      setcookie("hash_lista_sitios_visitados", hash('sha256', serialize($lista_actualizada) . SALT));
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