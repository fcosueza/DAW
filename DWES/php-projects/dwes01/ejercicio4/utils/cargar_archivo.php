<?php

  /**
   * Carga un archivo CSV
   *
   * Función que devuelve un array multiple con todos los datos almacenados en
   * un archivo CSV.
   *
   * @param $nombreArchivo Cadena de caractéres con el nombre del archivo que se quiere cargar.
   *
   * @return array[] Array formado de arrays asociativos con los datos del fichero.
   * @return false En caso de que el fichero no se encuentre.
   */
  function cargar_archivo($nombreArchivo) {
      $archivo = fopen($nombreArchivo, 'r');

      // Añadimos una guard clause para devolver false en caso de que no se pueda abrir el archivo

      if ($archivo == false)
          return false;

      /*
       * Si el archivo se ha podido abrir correctamente, extraeremos los datos
       * y lo almacenaremos en un array bidimensional.
       *
       * Para realizar la copia de datos vamos a usar la función array_combine(),
       * que nos permitirá crear un array con las claves y valores especificados.
       *
       * En primer lugar almacenaremos la cabecera del fichero, que usaremos como
       * claves en cada elemento del array datos y haremos lo mismo con el array
       * fila, que contendrá los datos de cada fila del fichero.
       */

      $cabecera = array_values(fgetcsv($archivo));
      $datos = [];
      $count = 0;

      while (($fila = fgetcsv($archivo)) !== false) {
          $fila = array_values($fila);
          $datos[$count] = array_combine($cabecera, $fila);

          // Una vez guardados los datos, parseamos los elementos asgs y tiempolibre con explode()

          $datos[$count]['asgs'] = explode("-", $datos[$count]['asgs']);
          $datos[$count]['tiempolibre'] = explode("-", $datos[$count]['tiempolibre']);

          $count++;
      }

      fclose($archivo);

      return $datos;
  }
