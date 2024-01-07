<?php

  function doSQL(PDO $pdo, string $sql, array $data = [], bool $fetchFirst = false) {
      $ret = false;

      try {
          $stmt = $pdo->prepare($sql);
          foreach ($data as $key => $value) {
              if (is_array($value) && count($value) === 2) {
                  $stmt->bindValue($key, $value[0], $value[1]);
              } elseif (!is_array($value)) {
                  $stmt->bindValue($key, $value);
              }
          }

          if ($stmt->execute()) {
              if (preg_match('/^\s*SELECT\s/i', $sql)) {
                  if ($fetchFirst)
                      $ret = $stmt->fetch(PDO::FETCH_ASSOC);
                  else
                      $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
              } else
                  $ret = $stmt->rowCount();
          }
      } catch (PDOException $ex) {
          var_dump($ex);
          $ret = -1;
      }

      return $ret;
  }

  function usuarios(PDO $pdo, $activos = true, $filtro = ""): array|int {
      $sql = <<<ENDSQL
        SELECT id, dni,
            fnacim, nombre, apellidos, telefono, email,
            nombre_tutor, apellidos_tutor, telefono_tutor, email_tutor
        FROM usuarios where activo = :activo and LOWER(CONCAT (nombre,' ', apellidos)) like LOWER(:filtro);
    ENDSQL;
      return doSQL($pdo, $sql, ['activo' => [$activos ? 1 : 0, PDO::PARAM_BOOL], 'filtro' => "%$filtro%"]);
  }

  function detalle(PDO $pdo, $id) {
      $sql = <<<ENDSQL
        SELECT id, dni,
            fnacim, nombre, apellidos, telefono, email,
            nombre_tutor, apellidos_tutor, telefono_tutor, email_tutor
        FROM usuarios WHERE id=:id;
    ENDSQL;
      return doSQL($pdo, $sql, data: ['id' => [$id, PDO::PARAM_INT]], fetchFirst: true);
  }

  function listarSeguimientos(PDO $pdo, $dni) {
      $sql = <<<ENDSQL
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
      return doSQL($pdo, $sql, data: ['dni' => $dni]);
  }

  function listarEmpleadosSeguimiento(PDO $pdo) {
      $sql = <<<ENDSQL
        SELECT * from empleados where
            find_in_set('coord',roles)>0 or
            find_in_set('trasoc',roles)>0
    ENDSQL;
      return doSQL($pdo, $sql);
  }

  function insertarSeguimiento(PDO $pdo, array $datos) {
      //Eliminamos datos proporcionados no necesarios
      $keys = array_flip(['fechahora', 'empleado_id', 'usuario_id', 'medio', 'otro']);
      $datos = array_intersect_key($datos, $keys);
      if (count($datos) < 5)
          return -100;
      $sql = <<<ENDSQL
        INSERT INTO seguimiento (fechahora,empleados_id,usuarios_id,medio,otro,contactado,informe)
        VALUES (:fechahora,:empleado_id,:usuario_id,:medio,:otro,false,null)
    ENDSQL;
      return doSQL($pdo, $sql, data: $datos);
  }

  function registrarcontactoseguimiento(PDO $pdo, int $idseguimiento, string $informe) {
      $sql = <<<ENDSQL
        UPDATE seguimiento
        SET contactado=true, informe=:informe
        WHERE contactado=false and id=:id
    ENDSQL;
      return doSQL($pdo, $sql, data: ['id' => $idseguimiento, 'informe' => $informe]);
  }

  function archivarseguimiento(PDO $pdo, int $idseguimiento) {
      $sql1 = <<<ENDSQL
        insert into seguimiento_archivado (id, fechahora,medio, otro,contactado,informe,empleados_id,usuarios_id)
        select id, fechahora,medio, otro,contactado,informe,empleados_id,usuarios_id from seguimiento WHERE id=:id;
    ENDSQL;
      $sql2 = <<<ENDSQL
        delete from seguimiento WHERE id=:id;
    ENDSQL;
      $pdo->beginTransaction();
      $resultado = doSQL($pdo, $sql1, ['id' => $idseguimiento]);
      if ($resultado <= 0) {
          $pdo->rollBack();
          return $resultado;
      }
      $resultado = doSQL($pdo, $sql2, ['id' => $idseguimiento]);
      if ($resultado <= 0)
          $pdo->rollBack();
      else
          $pdo->commit();
      return $resultado;
  }
