<?php

  namespace app\classes\model;

  /**
   * Interface que define un conjunto de métodos que deberán implementar las
   * clases del modelo.
   */
  interface IGuardable {

      public function guardar(PDO $connection);

      public function rescatar(PDO $connection, Taller $id);

      public function borrar(PDO $connection, Taller $id);
  }
