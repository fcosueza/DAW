<?php

  namespace app\classes\controllers;

  use app\classes\model\Talleres;

  class Controller {

      public static function defaultController(\PDO $pdo, \Smarty $smarty): int {
          $day = "";

          if (isset($_POST['day'])) {
              $day = filter_input(INPUT_POST, 'day');
          }

          if (in_array($day, DIAS_SEMANA)) {
              $talleres = Talleres::listarPorDia($pdo, $day);
          } else {
              $talleres = Talleres::listar($pdo);
          }

          $smarty->assign("talleres", $talleres);
          $smarty->display("defaultView.tpl");

          return 0;
      }
  }
