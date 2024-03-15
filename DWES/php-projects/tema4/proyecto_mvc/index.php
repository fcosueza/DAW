<?php

include_once __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/conf/conf.php';

use DWES04\controllers\Controladores;
use DWES04\controllers\ErrorController;
use DWES04\exceptions\AppException;

session_start();

//Configuramos Smarty:
$smarty = new Smarty();
$smarty->template_dir = __DIR__ . TEMPLATE_DIR;
$smarty->compile_dir = __DIR__ . TEMPLATE_C_DIR;
$smarty->cache_dir = __DIR__ . CACHE_DIR;

$accion = filter_input(INPUT_GET, 'accion', FILTER_SANITIZE_SPECIAL_CHARS);

try {
    switch ($accion) {
        case "logout":
            Controladores::logout();
            Controladores::default($smarty);
            break;
        case "autenticar":
            Controladores::autenticar($smarty);            
            break;
        case "addtofav":
            Controladores::addtofav($smarty);
            break;
        case "listfavs":
            Controladores::listfavs($smarty);
            break;
        case "removefromfav":
            Controladores::removefromfav($smarty);
            break;
        default:
            Controladores::default($smarty);
            break;
    }
} catch (AppException $e) {
    ErrorController::handleException($e, $smarty);
}
