<?php

  require_once 'session_control.php';

  require_once __DIR__ . '/etc/conf.php';
  require_once __DIR__ . '/src/conn.php';
  require_once __DIR__ . '/src/dbfuncs.php';
  require_once __DIR__ . '/extra/utils.php';
  require_once __DIR__ . '/src/userauth.php';

  /* Almacenamos el ID del usuario en una variable para trabajar más comodamente
   * y comprobamos si el usuario que esta accediendo tiene permisos para ejecutar el script.
   */
  $userID = $_SESSION['id'];

  if (!checkRole($userID, ALLOW_REG_TRACKING)) {
      header('Refresh: 3; url=usuarios.php');
      print '<B>Error: Solo un coordinador o un trabajador social puede rellenar los seguimientos.</B>';
      print '<p>Redireccionando a la página de usuario...</a></</p>';
      exit();
  }

  $pdo = connect();
//Obtenemos la lista de empleados
  $empleados = listarEmpleadosSeguimiento($pdo);

  $datos = [];

//Validación id empleado

  $datos['empleado_id'] = filter_input(INPUT_POST, 'empleado', FILTER_VALIDATE_INT);
  if (!is_int($datos['empleado_id']) || $datos['empleado_id'] <= 0 || (is_array($empleados) && !in_array($datos['empleado_id'], array_column($empleados, 'id')))
  ) {
      $errors[] = "El id de empleado no se ha proporcionado o no es correcto";
  }

  /*
   * TODO: si el rol es trasoc --> empleado_id debe ser el del usuario autenticado
   * si el rol es coord --> el empleado_id puede ser el de un empleado coord o trasoc
   *
   * NOTA: No me ha dado tiempo a realizar la comprobación para coord
   */

  if ($_SESSION['roles'] == "trasoc" && $datos['empleado_id'] != $userID) {
      print '<b>Los trabajadores sociales solo pueden registrar seguimientos a sí mismos.</b>';
      print '<p>Volver a la página de usuarios: <a href="usuarios.php">Usuarios</a></</p>';
  } else {

//Validación id usuario
      $datos['usuario_id'] = filter_input(INPUT_POST, 'idusuario', FILTER_VALIDATE_INT);
      if (!is_int($datos['usuario_id']) || $datos['usuario_id'] <= 0) {
          $errors[] = "El id de usuario no se ha proporcionado o no es correcto";
      }

//Validación fecha
      $datos['fecha_espanol'] = filter_input(INPUT_POST, 'fecha', FILTER_VALIDATE_REGEXP, REGEX_VALIDATE_FECHA);
      if ($datos['fecha_espanol'] && ($fecha_mysql = convertirFechaAMySQL($datos['fecha_espanol'])) != false) {
          $datos['fecha_mysql'] = $fecha_mysql;
      } else {
          $datos['fecha_espanol'] = '';
          $errors[] = "La fecha de seguimiento no es correcta (no sigue el formato dd/mm/aaaa o no es válida)";
      }

//Validación hora
      $datos['hora'] = filter_input(INPUT_POST, 'hora', FILTER_VALIDATE_REGEXP, REGEX_VALIDATE_HORA);
      if (!$datos['hora'])
          $errors[] = "La hora de seguimiento no es correcta (no sigue el formato hh:mm)";

//Validación medio
      $datos['medio'] = filter_input(INPUT_POST, 'medio_contacto', FILTER_VALIDATE_REGEXP, REGEX_VALIDATE_CONTACTO);
      if (!$datos['medio'])
          $errors[] = "El medio de contacto no es correcto no se ha especificado.";

      $datos['otro'] = ($datos['medio']) ? filter_input(INPUT_POST, 'otro', FILTER_SANITIZE_SPECIAL_CHARS) : null;
      if ($datos['medio'] === 'OTRO' && !$datos['otro'])
          $errors[] = "El medio de contacto es OTRO pero no se ha descrito.";
      ?>

      <?php

      include __DIR__ . '/extra/header.php';

      if (isset($errors)) {
          echo "<H1>Corrija los errores para continuar</H1>";
          include 'extra/mostrarerrores.php';
          $detalle_usuario = detalle($pdo, id: $datos['usuario_id']);
          if (isset($detalle_usuario) && is_array($detalle_usuario) && is_array($empleados)):
              include 'extra/formseguimiento.php';
          endif;
      } else {
          $datos['fechahora'] = $datos['fecha_mysql'] . ' ' . $datos['hora'];
          switch (insertarSeguimiento($pdo, $datos)) {
              case 1:
                  echo <<<ENDBLOCK
                <H1>Seguimiento insertado adecuadamente</H1>
            ENDBLOCK;
                  break;
              default:
                  echo <<<ENDBLOCK
            <H1>Seguimiento insertado no insertado.</H1>
        ENDBLOCK;
                  break;
          }
      }

      if (isset($datos['usuario_id'])) {
          echo <<<ENDBLOCK
            <form action="detalleusuario.php" method="post">
                <input type="hidden" name="idusuario" value="{$datos['usuario_id'] }">
                <input type="submit" value="Volver a detalles del usuario">
            </form>
    ENDBLOCK;
      }
      echo <<<ENDBLOCK
            <form action="usuarios.php" method="post">
                <input type="submit" value="Volver a lista de usuarios">
            </form>
    ENDBLOCK;
  }
?>
