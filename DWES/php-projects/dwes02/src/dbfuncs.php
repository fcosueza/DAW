<?php


function usuarios(PDO $pdo, $activos=true, $filtro=""): array|int
{
 // RELLENAR FUNCIÓN (NO SE PUEDE HACER ECHO NI SIMILAR)
 return -1;
}

/*
function --- función detalle de usuario --- ( ... )
{
    //....
    return null;
}
*/

/*
function --- función para listar seguimientos --- ( ... )
{
    $sql=<<<ENDSQL
            SELECT empleados.nombre as nombre_empleado,
                   empleados.apellidos as apellidos_empleado,
                   seguimiento.id as id_seguimiento,
                   seguimiento.fechahora as fechahora_seguimiento,
                   seguimiento.medio as medio_seguimiento,
                   seguimiento.otro as otro_seguimiento,
                   seguimiento.contactado as contactado_seguimiento,
                   seguimiento.informe as informe_seguimiento,
                   usuarios.id as id_usuario,
                   usuarios.dni as dni_usuario
            FROM empleados 
                 JOIN seguimiento ON seguimiento.empleados_id=empleados.id 
                 JOIN usuarios ON seguimiento.usuarios_id=usuarios.id 
            WHERE usuarios.dni=:dni 
    ENDSQL;
    return null;    
}
*/

/*
function --- para listar los empleados --- (PDO $pdo)
{
    $sql=<<<ENDSQL
        SELECT * from empleados where 
            find_in_set('coord',roles)>0 or
            find_in_set('trasoc',roles)>0
    ENDSQL;
    return null;
}
*/

/*
function --- función para insertar seguimiento --- (...)
{
    $sql="INSERT INTO ...";
    //No olvides usar rowCount para saber si se ha insertado
    return null;
}
*/

/*
function --- función para marcar como contactado y rellenar informe --- (...)
{
    $sql="UPDATE ...";
    //No olvides usar rowCount para saber si se ha insertado
    return null;
}
*/

/*
function --- función para archivar seguimiento --- ()
{
    $sql1=<<<ENDSQL
        insert into seguimiento_archivado (id, fechahora,medio, otro,contactado,informe,empleados_id,usuarios_id)
        select id, fechahora,medio, otro,contactado,informe,empleados_id,usuarios_id from seguimiento WHERE id=:id;
    ENDSQL;
    $sql2='DELETE FROM ...';
    
    //INICIAR TRANSACCIÓN

    // EJECUTAR COPIA ($sql1)

    // SI LA OPERACIÓN SE HACE (verificar con rowCount), se continua, sino ROLLBACK Y SALIR
    
    // SI SE HIZO LA OPERACIÓN ANTERIOR ejecutar $sql2

    // SI $sql2 exitoso (verificar con rowCount), COMMIT, si no, ROLLBACK.
    
    return null;
}

*/