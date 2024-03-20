<?php

  namespace app\classes\model;

  /**
   * Clase que define el modelo de cada taller, estableciendo los atributos
   * de cada taller y definiendo el conjunto de operaciones que se pueden realizar
   * con estos, como inserciones, borrados y actualizaciones en la base de datos.
   */
  class Taller implements IGuardable {

      // Atributos de la clase

      private $id = null;
      private $nombre = null;
      private $descripcion = null;
      private $ubicacion = null;
      private $dia_semana = null;
      private $hora_inicio = null;
      private $hora_fin = null;
      private $cupo_maximo = null;

      /**
       * Método que devuelve el id del taller
       *
       * @return string|null Id del taller o null si no esta establecido
       */
      public function getId(): ?int {
          return $this->id;
      }

      /**
       * Método que devuelve el nombre del taller
       *
       * @return string|null Nombre del taller o null si no esta establecido
       */
      public function getNombre(): ?string {
          return $this->nombre;
      }

      /**
       * Método que establece el nombre del taller.
       *
       * @param string $nombre Parametro con el nombre del taller.
       * @return bool false si el nombre esta vacío true en caso contrario
       */
      public function setNombre(string $nombre): bool {
          if ($nombre == "") return false;

          $this->nombre = $nombre;
          return true;
      }

      /**
       * Método que devuelve la descripción del taller.
       *
       * @return string|null Descripción del taller o null si no esta establecidad.
       */
      public function getDescripcion(): ?string {
          return $this->descripcion;
      }

      /**
       * Método que establece la descripción del taller.
       *
       * @param string $descripcion Descripción del taller.
       * @return bool false si la descripción esta vacía y true en caso contrario.
       */
      public function setDescription(string $descripcion): bool {
          if ($descripcion == "") return false;

          $this->descripcion = $descripcion;
          return true;
      }

      /**
       * Método que devuelve la ubicación del taller.
       *
       * @return string|null Ubicación del taller o null si no esta establecida.
       */
      public function getUbicacion(): ?string {
          return $this->ubicacion;
      }

      /**
       * Método que establece la ubicación del taller
       *
       * @param string $ubicacion Ubicación del taller.
       * @return bool false si la ubicacion esta vacía o true en caso contrario.
       */
      public function setUbicacion(string $ubicacion): bool {
          if ($ubicacion == "") return false;

          $this->ubicacion = $ubicacion;
          return true;
      }

      /**
       * Método que devuelve el día de realización del taller.
       *
       * @return string|null Dia de realización del taller o null si no esta establecido.
       */
      public function getDia(): ?string {
          return $this->dia_semana;
      }

      /**
       * Método que establece el día de realización del taller
       *
       * @param string $dia Día de realización del taller
       * @return bool false si el día esta vacío o true en caso contrario
       */
      public function setDia(string $dia): bool {
          if ($dia == "" || !in_array($dia, \DIAS_SEMANA)) return false;

          $this->dia = $dia;
          return true;
      }

      /**
       * Método que devuelve la hora de inicio del taller
       *
       * @return string Hora de inicio del taller con el formato HH:MM:SS
       */
      public function getHoraInicio(): ?string {
          return $this->hora_inicio;
      }

      /**
       * Método que establece la hora de inicio del taller. Comprueba que
       * la hora es correcta antes de almacenarla.
       *
       * @param string $hora Hora de inicio del taller
       * @return bool false si la hora es incorrecta y true en caso contrario
       */
      public function setHoraInicio(string $hora): bool {
          $arrayHora = explode(":", $hora);

          if ($hora == "") return false;
          if ($arrayHora[0] < 0 || $arrayHora[0] > 23) return false;
          if ($arrayHora[1] < 0 || $arrayHora[1] > 23) return false;

          $this->hora_inicio = date(strtotime($hora));
          return true;
      }

      /**
       * Método que devuelve la hora de inicio del taller
       *
       * @return string Hora de inicio del taller con el formato HH:MM:SS
       */
      public function getHoraFinal(): ?string {
          return $this->hora_fin;
      }

      /**
       * Método que establece la hora de inicio del taller. Comprueba que
       * la hora es correcta antes de almacenarla.
       *
       * @param string $hora Hora de inicio del taller
       * @return bool false si la hora es incorrecta y true en caso contrario
       */
      public function setHoraFin(string $hora): bool {
          $arrayHora = explode(":", $hora);

          if ($hora == "") return false;
          if ($arrayHora[0] < 0 || $arrayHora[0] > 23) return false;
          if ($arrayHora[1] < 0 || $arrayHora[1] > 23) return false;

          $this->hora_fin = date(strtotime($hora));
          return true;
      }

      /**
       * Método que devuelve el cupo máximo del taller
       *
       * @return int Cupo máximo del taller
       */
      public function getCupo(): ?int {
          return $this->cupo_maximo;
      }

      /**
       * Método que establece el cupo máximo del taller, comprobando que es un
       * valor entero entre 5 y 30 incluídos.
       *
       * @param int $cupo Cupo máximo del taller
       * @return bool false si el cupo no es correcto y true en caso contrario
       */
      public function setCupo(int $cupo): bool {
          if (!is_int($cupo) || $cupo < 5 || $cupo > 30) return false;

          $this->cupo_maximo = $cupo;
          return true;
      }

      /**
       * Método que crea o actializa un taller en la base de datos. Si la consulta
       * se ejecuta adecuadamente el método devuelve el número de filas afectadas en la
       * base de datos. El método devuelve -1, en caso de que se genere
       * una excepción en el proceso de ejecución de la consulta.
       *
       * @param PDO $pdo Conexión a la base de datos.
       * @return int El número de filas afectadas o -1 si la consulta falla
       */
      public function guardar(\PDO $pdo): int {
          $data = get_object_vars($this);
          $rowCount = 0;
          $error = -1;

          // Comprobamos que la conexión existe
          if ($pdo == null) return $error;

          // Creamos la consulta SQL
          if ($this->id == null) {
              unset($data['id']);
              $sql = 'INSERT INTO talleres (nombre, descripcion, ubicacion, dia_semana, hora_inicio, hora_fin, cupo_maximo) '
                      . 'VALUES (:nombre, :descripcion, :ubicacion, :dia_semana, :hora_inicio, :hora_fin, :cupo_maximo)';
          } else {
              $sql = 'UPDATE talleres set nombre=:nombre, descripcion=:descripcion, ubicacion=:ubicacion, dia_semana=:dia_semana, '
                      . 'hora_inicio=:hora_inicio, hora_final=:hora_final, cupo_maximo=:cupo_maximo '
                      . 'WHERE id=:id';
          }

          // Ejecutamos la consulta y devolvemos el resultado
          try {
              $query = $pdo->prepare($sql);

              if ($query->execute($data)) {
                  $rowCount = $query->rowCount();

                  if ($result > 0 && !isset($data['id'])) {
                      $this->id = $query->lastInsertId();
                  }

                  return $rowCount;
              }
          } catch (\PDOException $ex) {
              error_log("Error: " . $ex->getMessage(), 0);
              return $error;
          }
      }

      /**
       * Método de clase que buscar un taller en la base de datos y lo devuelve como un
       * objeto de la clase Taller. Si no se ha podido ejecutar la consutla, o si
       * no hay filas coincidentes, devuelve -1.
       *
       * @param PDO $pdo Conexión a la base de datos
       * @param int $id Id del taller que se quiere rescatar
       *
       * @return object|int Un objecto de tipo Taller si tiene éxito y -1 en caso contrario
       */
      public static function rescatar(\PDO $pdo, int $id): object|int {
          $error = -1;

          if ($pdo == null || !is_int($id)) return $error;

          $sql = "SELECT id, nombre, descripcion, ubicacion, dia_semana, hora_inicio, hora_fin, cupo_maximo "
                  . "FROM talleres WHERE id=:id";

          try {
              $query = $pdo->prepare($sql);
              $query->setFetchMode(\PDO::FETCH_CLASS, Taller::class);
              $query->bindParam("id", $id);

              if ($query->execute()) {
                  return $query->fetch() ? $query->fetch() : $error;
              }
          } catch (Exception $ex) {
              error_log("Error: " . $ex->getMessage());
              return $error;
          }
      }

      /**
       * Método de clase que elimina una fila de la base de datos con una id concreto.
       *
       * @param PDO $pdo Conexión a la base de datos
       * @param int $id Id de la fila que se quiere eliminar
       *
       * @return int El número de filas afectadas o -1 en caso de error
       */
      public static function borrar(\PDO $pdo, int $id): int {
          $error = -1;

          if ($pdo == null || !is_int($id)) return $error;

          $sql = "DELETE FROM talleres WHERE id=:id";

          try {
              $query = $pdo->prepare($sql);
              $query->bindParam("id", $id);

              if ($query->execute()) {
                  return $query->rowCount();
              } else {
                  return $error;
              }
          } catch (Exception $ex) {
              error_log("Error: " . $ex->getMessage());
              return $error;
          }
      }
  }
