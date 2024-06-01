<?php

  /*
    DNI:
    NOMBRE y APELLIDOS:
   */

  /**
   *
   */
  function dbConnect() {
      $DB_DSN = "mysql:host=";
      $DB_HOST = "localhost";
      $DB_NAME = "examen_dwes_bbdd";
      $DB_USER = "root";
      $DB_PASS = "H0l0caust0";

      try {
          $conn = new PDO($DB_DSN . $DB_HOST . ";dbname=" . $DB_NAME, $DB_USER, $DB_PASS);
      } catch (Exception $ex) {
          print "Error: " . $ex->getMessage();
      }

      return $conn;
  }
