<?php

  namespace app\classes\database;

  /**
   * Clase que se encarga de gestionar las conexiones a la base de datos y la
   * ejecución de las consultas SQL a ésta.
   */
  class DB {

      private static $connection = null;

      /**
       * Método que realiza una conexión a la base de datos, si esta no se ha
       * realizado ya.
       *
       * @return PDO Un objecto PDO con la conexión a la base de datos.
       *
       * @throws \Exception Si ha habido algún error al realizar la conexión.
       */
      public static function connect() {
          if (!static::$connection instanceof \PDO) {
              try {
                  static::$connection = new \PDO(DB_DNS, DB_USER, DB_PASS, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
              } catch (\PDOException $ex) {
                  static::$connection = false;
                  throw new \Exception("Error: " . $ex->getMessage());
              }
          }

          return static::$connection;
      }

      /**
       * Método que realiza una consulta a la base de datos. Dependiendo del
       * tipo de consulta devolverá el número de líneas afectadas, si es una consulta
       * de tipo INSERT, DELETE o UPDATE, o el resultado de la consulta si es de tipo
       * SELECT.
       *
       * @param type $sql Consulta SQL
       * @param type $data Array con los datos a sustituir.
       *
       * @return array|int Array con las filas de la consulta o un entero con las filas afectadas
       * @throws Exception Si la conexión no es correcta, la consulta no se ha podido
       *                   realizar o ha habido algún error en la ejecución de ésta.
       */
      public static function exeSQL($sql, $data = []) {
          $pdo = self::connect();
          $result = false;

          // Comprobamos que existe la conexión a la BD
          if (!$pdo)
              throw new \Exception("Error: No se puede conectar a la BD.");


          try {
              $query = $pdo->prepare($sql);

              if ($query->execute($data)) {
                  $result = preg_match('/^\s*SELECT\s/i', $sql) ?
                          $query->fetchAll(\PDO::FETCH_ASSOC) :
                          $query->rowCount();
              } else {
                  throw new Exception("Error: la consulta no se ha podido ejecutar correctamente.");
              }
          } catch (Exception $ex) {
              throw new Exception("Error: " . $ex->getMessage());
          }

          return $result;
      }

      /**
       * Método que elimina la conexión actual a la base de datos, estableciéndola
       * al valor null.
       */
      public function closeConnection() {
          static::$connection = null;
      }
  }
