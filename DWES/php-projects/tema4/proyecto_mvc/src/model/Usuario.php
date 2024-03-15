<?php

  namespace DWES04\model;

  use \DWES04\DB;

  class Usuario {

      private $id;
      private $username;

      private function __construct($id, $username) {
          $this->id = $id;
          $this->username = $username;
      }

      public function getUsername() {
          return $this->username;
      }

      public function getId() {
          return $this->id;
      }

      public static function verificarUsuario($username, $password): ?Usuario {
          $sql = "SELECT id,username from usuarios where username=:username and password=SHA2(CONCAT(:username,:password),256)";
          $res = DB::doSql($sql, [':username' => $username, ':password' => $password]);
          if (is_array($res) && count($res) === 1) {
              return new Usuario($res[0]['id'], $res[0]['username']);
          } else
              return null;
      }

      public function modificarPassword($currentpassword, $newpassword) {
          $sql = "UPDATE usuarios SET password=SHA2(CONCAT(:username,:newpassword),256) WHERE username=:username and password=SHA2(CONCAT(:username,:currentpassword),256)";
          return DB::doSql($sql, [':username' => $this->username, ':currentpassword' => $currentpassword, ':newpassword' => $newpassword]);
      }

      public static function crearUsuario($username, $password): ?Usuario {
          $sql = "INSERT INTO usuarios (username, password) VALUES (:username, SHA2(CONCAT(:username,:password),256))";
          if (DB::doSql($sql, [':username' => $username, ':password' => $password]) === 1) {
              return new Usuario(DB::getConn()->lastInsertId(), $username);
          } else
              return null;
      }
  }
