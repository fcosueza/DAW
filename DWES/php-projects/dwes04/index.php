<?php

  include_once __DIR__ . "/vendor/autoload.php";
  include_once __DIR__ . "/conf/conf.php";

  use app\classes\controllers\Controller as Controller;
  use app\classes\database\DB as DB;

// Establecemos la conexión con la base de datos
  $pdo = DB::connect();

  // Creamos y configuramos la instancia de Smarty
  $smarty = new Smarty();
  $smarty->template_dir = __DIR__ . TEMPLATE_DIR;
  $smarty->compile_dir = __DIR__ . TEMPLATE_COMPILE_DIR;
  $smarty->cache_dir = __DIR__ . CACHE_DIR;

  $accion = filter_input(INPUT_GET, "accion", FILTER_SANITIZE_SPECIAL_CHARS);

  // Llamamos al controlar oportuno
  if (strcmp($accion, "nuevo_taller_form") == 0) {
      Controller::addTallerController($smarty);
  } elseif (strcmp($accion, "crear_taller") == 0) {
      Controller::createTallerController($pdo, $smarty);
  } else {
      Controller::defaultController($pdo, $smarty);
  }



