<?php

  namespace app\classes\model;

  /**
   * Interface que define un conjunto de métodos que deberán implementar las
   * clases del modelo.
   */
  interface IGuardable {

      public function guardar(\PDO $pdo): int;

      public static function rescatar(\PDO $pdo, int $id): object|int;

      public static function borrar(\PDO $pdo, int $id): int;
  }
