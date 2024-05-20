<?php

  class Database {

      private $host = "localhost";
      private $db_name = "canciones_db";
      private $username = "root";
      private $password = "H0l0caust0";
      private $conn;

      public function getConection() {
          $this->conn = null;

          try {
              $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
          } catch (Exception $ex) {
              echo "Error en la conexión:" . $ex . getMessage();
          }

          return $this->conn;
      }
  }
