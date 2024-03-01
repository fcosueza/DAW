<?php

  define('DB_DSN', 'mysql:host=localhost;dbname=examen_dwes_bbdd');
  define('DB_USER', 'root');
  define('DB_PASSWD', 'H0l0caust0');

  function connect() {
      try {
          $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      } catch (PDOException $e) {
          die("Error al conectar con la base de datos: " . $e);
      }

      return $pdo;
  }

?>
