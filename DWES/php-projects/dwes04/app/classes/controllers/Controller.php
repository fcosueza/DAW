<?php

  namespace app\classes\controllers;

  use app\classes\model\Talleres;

  class Controller {

      /**
       * Controlador por defecto que procesa la peticiones para mostrar la listas
       * de talleres, ya sea filtrados por día o sin aplicar ningún filtro.
       *
       * @param \PDO $pdo Conexión a la base de datos
       * @param \Smarty $smarty Instancia de Smarty
       * @return int Devuelve 0 si se ha producido algún error o -1 en caso contrario
       */
      public static function defaultController(\PDO $pdo, \Smarty $smarty): int {
          $day = "";
          $errorMsg = "El día introducido no es correcto.";

          if (isset($_POST['day'])) {
              $day = filter_input(INPUT_POST, 'day');

              if (in_array($day, DIAS_SEMANA)) {
                  $talleres = Talleres::listarPorDia($pdo, $day);
              } else {
                  $talleres = Talleres::listar($pdo);
              }
          }

          $smarty->assign("talleres", $talleres);
          $smarty->display("defaultView.tpl");

          return 0;
      }
  }
