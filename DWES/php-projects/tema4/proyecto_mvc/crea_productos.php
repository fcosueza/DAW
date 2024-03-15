<?php

include_once __DIR__.'/vendor/autoload.php';
include_once __DIR__.'/conf/conf.php';

use DWES04\exceptions\AppException;
use DWES04\model\Producto;

try {
    for ($i = 1; $i < 10; $i++) {
        $p = new Producto();
        $p->setCod('B0' . $i);
        $p->setDescripcion('Desc B0' . $i);
        $p->setPrecio(random_int(0,100));
        $p->setStock(random_int(10, 20));
        $p->guardar();
    }
    echo "Operación realizada.";
} catch (AppException $ae) {
    if ($ae->getCode() === AppException::DB_CONSTRAINT_VIOLATION_IN_QUERY)
        echo 'Posiblemente ya existan los registros';
    else
        echo $ae->getMessage();
}

 