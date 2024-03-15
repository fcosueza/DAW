<?php

include_once __DIR__.'/vendor/autoload.php';
include_once __DIR__.'/conf/conf.php';

use DWES04\model\Usuario;
use DWES04\exceptions\AppException;


try{
    Usuario::crearUsuario('usuario1','usuario1');
    echo "Usuario1 creado<BR>".PHP_EOL;    
    Usuario::crearUsuario('usuario2','usuario2');
    echo "Usuario2 creado<BR>".PHP_EOL;    
} catch (AppException $ae) {
    if ($ae->getCode() === AppException::DB_CONSTRAINT_VIOLATION_IN_QUERY)
    {
        echo "Usuarios existentes<BR>".PHP_EOL;
    }
    else
        echo $ae->getMessage();
}
