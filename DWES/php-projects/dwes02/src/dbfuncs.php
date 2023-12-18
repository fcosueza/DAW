<?php

  /**
   * Función usuario()
   *
   * Realiza una consulta mediante la conexión a la base de datos indicada
   * devolviendo un array bidimensional con el resultado, realizando un filtrado
   * del resultado según si los usuarios están activos o por nombre y apellidos,
   * si se especifica
   *
   * @param PDO $pdo Objeto PDO con la conexión abierta a la base de datos.
   * @param boolean $activos Booleano que indica si los usuarios filtrados están activos o no.
   * @param string $filtro Cadena con el nombre y apellidos (o alguno de los dos) del usuario.
   *
   * @return array|int Array bidimensional con el resultado de la consutla. En caso de error devuelve -1.
   */
  function usuarios(PDO $pdo, $activos = true, $filtro = ""): array|int {

      /* Añadimos el símbolo % al filtro para que funcione bien con el like */
      $nombreApellidos = '%' . $filtro . '%';

      /* Almacenamos la consulta con los parámetros */
      $sql = <<<SQL
                select id, dni, fnacim, nombre, apellidos
                from usuarios
                where activo = :activo and concat(nombre, apellidos) like :filtro
              SQL;

      /* Preparamos la consulta, enlazamos los parametros  y la ejecutamos */

      $consulta = $pdo->prepare($sql);
      $consulta->bindParam(":activo", $activos);
      $consulta->bindParam(":filtro", $nombreApellidos);
      $consulta->execute();

      /* Si la consulta se ha realizado con éxito, devolvemos el array con el resultado */
      if ($consulta)
          return $consulta->fetchAll();

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