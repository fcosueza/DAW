<?php

  namespace DWES04\model;

  use \DWES04\DB;
  use \DWES04\exceptions\AppException;

  class Producto {

      private $id = null;
      private $cod;
      private $descripcion;
      private $precio;
      private $stock;

      public function getId() {
          return $this->id;
      }

      public function getPrecio() {
          return $this->precio;
      }

      public function setPrecio($precio): bool {
          if (!is_numeric($precio) || $precio <= 0)
              return false;
          $this->precio = (float) $precio;
          return true;
      }

      public function getStock() {
          return $this->stock;
      }

      public function setStock($stock): bool {
          if (!is_numeric($stock) || $stock <= 0)
              return false;
          $this->stock = (int) $stock;
          return true;
      }

      public function getCod() {
          return $this->cod;
      }

      public function setCod($cod): bool {
          if (!preg_match('/^[0-9A-Za-z]+$/', $cod))
              return false;
          $this->cod = $cod;
          return true;
      }

      public function getDescripcion() {
          return $this->descripcion;
      }

      public function setDescripcion($desc): bool {
          $desc = strip_tags(trim($desc));
          if (strlen($desc) == 0)
              return false;
          $this->descripcion = $desc;
          return true;
      }

      public function guardar(): bool|int {
          $pdo = DB::getConn();
          $data = get_object_vars($this);
          if ($this->id == null) {
              unset($data['id']);
              $sql = "INSERT INTO productos (cod,descripcion,precio,stock) VALUES (:cod,:descripcion,:precio,:stock)";
          } else {
              $sql = "UPDATE productos set cod=:cod, descripcion=:descripcion, precio=:precio, stock=:stock WHERE id=:id";
          }
          try {
              $stmt = $pdo->prepare($sql);
              if ($stmt->execute($data)) {
                  $ret = $stmt->rowCount();
                  if ($ret > 0 && !isset($data['id'])) {
                      $this->id = $pdo->lastInsertId();
                  }
                  return $ret;
              }
              throw new AppException('Error DB: Fallo al ejecutar la consulta SQL.',
                              AppException::DB_QUERY_EXECUTION_FAILURE
              );
          } catch (\PDOException $e) {
              if ($e->getCode() === '23000') {
                  throw new AppException('Error DB: la consulta realizada incumple las restricciones de la base de datos.',
                                  AppException::DB_CONSTRAINT_VIOLATION_IN_QUERY);
              }
              throw new AppException('Error DB: error en la consulta.',
                              AppException::DB_ERROR_IN_QUERY);
          }
      }

      public static function rescatar(int|string $idOrCod): object|null|false {
          $pdo = DB::getConn();
          $sql = "SELECT id, cod, descripcion, precio, stock from productos WHERE id=:idOrCod OR cod=:idOrCod";
          try {
              $stmt = $pdo->prepare($sql);
              $stmt->setFetchMode(\PDO::FETCH_CLASS, Producto::class);
              $stmt->bindParam('idOrCod', $idOrCod);
              if ($stmt->execute()) {
                  return $stmt->fetch();
              } else
                  throw new AppException('Error DB: Fallo al ejecutar la consulta SQL.',
                                  AppException::DB_QUERY_EXECUTION_FAILURE
                  );
          } catch (\PDOException $e) {
              throw new AppException('Error DB: error en la consulta.',
                              AppException::DB_ERROR_IN_QUERY);
          }
      }

      public static function listar(): ?array {
          $pdo = DB::getConn();
          $sql = "SELECT id, cod, descripcion, precio, stock from productos";
          try {
              $stmt = $pdo->prepare($sql);
              if ($stmt->execute()) {
                  return $stmt->fetchAll(\PDO::FETCH_CLASS, Producto::class);
              } else
                  throw new AppException('Error DB: Fallo al ejecutar la consulta SQL.',
                                  AppException::DB_QUERY_EXECUTION_FAILURE
                  );
          } catch (\PDOException $e) {
              throw new AppException('Error DB: error en la consulta.',
                              AppException::DB_ERROR_IN_QUERY);
          }
      }
  }
