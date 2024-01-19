<?php

  /* TODO: 1.- Crea una función para autenticar al usuario  */

  /**
   * Funcion que comprueba los credenciales del usuario en la base de datos y devuelve
   * los datos del usuario o false en caso de que no se pueda acceder.
   *
   * @param PDO $pdo Conexión a la base de datos
   * @param string $dni  DNI del usuario
   * @param string $password Contraseña del usuario
   *
   * @return bool false en caso de que falle la autenticación
   * @return array Array con los datos del usuario
   */
  function authUser(PDO $pdo, $dni, $password) {
      $hashPass = hash('sha256', $dni . $password . strrev($dni . $password) . '495k5ndikakzFSKZssd');
      $sql = 'select id, dni, nombre, apellidos, roles from empleados where dni=:dni and password=:password';
      $user = false;

      try {
          $query = $pdo->prepare($sql);
          $query->bindValue(":dni", $dni);
          $query->bindValue(":password", $hashPass);

          if ($query->execute()) {
              $user = $query->fetch();
          }
      } catch (PDOException $ex) {
          var_dump($ex);
          exit;
      }

      return $user;
  }

  /**
   * Función que verifica si un usuario tiene un rol o roles asociados. La función
   * acepta tanto un string con un solo rol como un array de tipo string con varios roles.
   *
   * @param string $userID Identificador de Usuario
   * @param string|array $roles Un string o un array de strings con los roles que se quieren verificar
   *
   * @return bool Devuelve false si el usuario no tiene asociado los roles y true en caso contrario.
   */
  function checkRole($userID, $roles) {
      $result = false;

      if ($_SESSION['id'] == $userID) {
          if (is_string($roles) && ($_SESSION['roles'] == $roles)) {
              $result = true;
          } else if (is_array($roles)) {
              foreach ($roles as $role) {
                  if ($_SESSION['roles'] == $role) {
                      $result = true;
                  }
              }
          }
      }

      return $result;
  }

  /* TODO: 3.- Crea una función para comprobar si un seguimiento pertenece a un empleado

        function ... nombre función ... (PDO $pdo, $idseguimiento, $idempleado)
        {
        $sql="...";
        }

       */