<?php

  namespace DWES04\controllers;

  use DWES04\exceptions\AppException;
  use Smarty;

  class ErrorController {

      public static function handleException(AppException $ae, Smarty $s) {
          $notificaciones = [$ae->getMessage()];
          $s->assign('notificaciones', $notificaciones);
          $s->display("error.tpl");
      }
  }
