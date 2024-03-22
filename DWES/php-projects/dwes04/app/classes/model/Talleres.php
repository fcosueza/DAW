<?php

  namespace app\classes\model;

  use app\classes\model\Taller as Taller;

/*
   * Clase que se encarga de gestionar una colección de talleres
   */

  class Talleres {

      private static $talleres = array();

      /**
       * Método que genera una lista de talleres, creando un array con
       * instancias de la clase taller.
       *
       * Se ha obtado por la opción de
       * usar solo un select, ya que como comentó en el foro lo estaba dando
       * por valido. Esta opción simplifica mucho más el código que si se
       * obtuvieran los ids y se usara el método estático Taller::rescatar()
       *
       * @param \PDO $pdo Conexión a la base de datos
       * @return array|int Array con instancias de Taller o -1 si ha ocurrido un error.
       */
      public static function listar(\PDO $pdo): array|int {
          if ($pdo == null) return -1;

          $sql = "SELECT * FROM talleres";

          try {
              $query = $pdo->query($sql, \PDO::FETCH_CLASS, Taller::class);
              static::$talleres = $query->fetchAll();
          } catch (Exception $ex) {
              error_log("Error " . $ex->getMessage());
              return -1;
          }

          return static::$talleres;
      }

      /**
       * Método que genera un lista de talleres con los talleres que se realizan en
       * un día determinado.
       *
       * @param \PDO $pdo Coneción a la base de datos
       * @param string $dia Día de la semana, debe ser valido
       *
       * @return array|int array con las instancias de Taller o -1 si ha ocurrido un error.
       */
      public static function listarPorDia(\PDO $pdo, string $dia): array|int {
          if (!in_array($dia, \DIAS_SEMANA)) return -1;
          if ($pdo == null) return -1;

          $sql = "SELECT * from talleres WHERE dia_semana=:dia_semana";

          try {
              $query = $pdo->prepare($sql);
              $query->bindParam("dia_semana", $dia);
              $query->setFetchMode(\PDO::FETCH_CLASS, Taller::class);

              if ($query->execute()) {
                  static::$talleres = $query->fetchAll();
              }
          } catch (Exception $ex) {
              error_log("Error: " . $ex->getMessage());
              return -1;
          }

          return static::$talleres;
      }
  }
