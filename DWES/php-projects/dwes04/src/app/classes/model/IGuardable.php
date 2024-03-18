<?php

  namespace app\classes\model;

  /**
   * Interface que define un conjunto de métodos que deberán implementar las
   * clases del modelo.
   */
  interface IGuardable {

      public function guardar(PDO $pdo): int;

      public function rescatar(PDO $pdo, int $id): ?array;

      public function borrar(PDO $pdo, int $id): int;
  }
