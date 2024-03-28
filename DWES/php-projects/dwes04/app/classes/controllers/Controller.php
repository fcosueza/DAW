<?php

  namespace app\classes\controllers;

  use app\classes\model\Talleres;
  use app\classes\model\Taller;

  class Controller {

      /**
       * Controlador por defecto que procesa la peticiones para mostrar la listas
       * de talleres, ya sea filtrados por día o sin aplicar ningún filtro.
       *
       * @param \PDO $pdo Conexión a la base de datos
       * @param \Smarty $smarty Instancia de Smarty
       * @return int Devuelve 0 si se ha producido algún error o -1 en caso contrario
       */
      public static function defaultController(\PDO $pdo, \Smarty $smarty): void {
          $day = "";
          $errorMsg = "Error: El día introducido no es correcto";

          // Comprobamos si se ha realizado la búsqueda por día
          if (isset($_POST['day']) && $_POST['day'] != "") {
              $day = filter_input(INPUT_POST, 'day');

              if (in_array($day, DIAS_SEMANA)) {
                  $talleres = Talleres::listarPorDia($pdo, $day);
              } else {
                  $talleres = Talleres::listar($pdo);
                  $smarty->assign("error", $errorMsg);
              }
          } else {
              $talleres = Talleres::listar($pdo);
          }

          $smarty->assign("talleres", $talleres);
          $smarty->display("defaultView.tpl");
      }

      /**
       * Controlador que se encarga de gestionar una petición para añadir
       * un nuevo taller. Carga la vista oportuna y además determina la opción
       * que vendrá seleccionada por defecto en el select de dicha plantilla.
       *
       * @param \Smarty $smarty Instancia de smarty
       */
      public static function addTallerController(\Smarty $smarty): void {
          $selected = "Lunes";
          $actualDay = date("w");

          // Variable para mapear el día de la semana devuelto por la función date
          $dayOfWeek = array(
              1 => "Lunes",
              2 => "Martes",
              3 => "Miércoles",
              4 => "Jueves",
              5 => "Viernes"
          );

          // Comprobamos el día de la semana y actulizamos la opción selecionada por defecto
          if (isset($dayOfWeek[$actualDay])) {
              $selected = $dayOfWeek[$actualDay];
          }


          $smarty->assign("days", DIAS_SEMANA);
          $smarty->assign("selected", $selected);
          $smarty->display("addTallerView.tpl");
      }

      public static function createTallerController(\PDO $pdo, \Smarty $smarty): void {
          $errorMsgs = array();
          $taller = new Taller;

          // Variable donde mapeamos los atributos y sus métodos set
          $attriMap = array(
              "nombre" => "setNombre",
              "descripcion" => "setDescripcion",
              "ubicacion" => "setUbicacion",
              "dia" => "setDia",
              "hora_inicio" => "setHoraInicio",
              "hora_final" => "setHoraFinal",
              "cupo" => "setCupo");

          // Comprobamos cada atributo e intentamos crear el taller
          foreach ($attriMap as $attri => $method) {
              if (isset($_POST[$attri])) {
                  $value = filter_input(INPUT_POST, $attri, FILTER_SANITIZE_SPECIAL_CHARS);

                  if (!$taller->$method($value)) {
                      $errorMsgs[$attri] = "Error: El campo " . $attri . " es incorrecto";
                  }
              }
          }

          // Comprobamos si ha habido errores y guardamos el taller
          if (count($errorMsgs) == 0) {
              $taller->guardar($pdo);
              $smarty->assign("id", $taller->getId());
          } else {
              $smarty->assign("errors", $errorMsgs);
          }

          $smarty->display("createTallerResult.tpl");
      }
  }
