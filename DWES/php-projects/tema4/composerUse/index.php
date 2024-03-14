<?php

require_once __DIR__.'/vendor/autoload.php';

// Creamos un Logger con el nombre de canal "Eventos de usuario"
$log = new Monolog\Logger('Eventos de usuario');

/* Indicamos que los logs se van a guardar en un archivo llamado eventos.log en el
   mismo directorio de la aplicación (lo normal es que esté en otro directorio, pero
   como estamos aprendiendo lo vamos a dejar aquí) */
$log->pushHandler(new Monolog\Handler\StreamHandler(__DIR__.'/eventos.log', Monolog\Logger::DEBUG));

// Añadimos un mensaje de warning
$log->info('Iniciado el script');
$log->warning('Registramos un warning');
$log->error('Registramos un error');

?>

Los eventos del log se guardarán en : <?=__DIR__.'/eventos.log'?>
