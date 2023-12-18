<?php

  require __DIR__ . '/../etc/conf.php';

  /**
   * Función connect()
   *
   * Función que realiza una conexión a la base de datos empleando los datos
   * almacenados en el fichero /etc/conf.php.
   *
   * @return conexion Un objeto de tipo PDO con la conexión a la base de datos.
   * @return false En caso de que no se pueda realizar la conexión.
   */
  function connect() {
      $opciones = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

      /* Podriamos haber métido la conexión dentro de un try-catch, pero si no se van
       * a usar para nada las excepciones ni mensajes de error, no tiene sentido.
       */

      $resultado = new PDO('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD, $opciones);

      if (!$resultado)
          $resultado = false;

      return $resultado;
  }
