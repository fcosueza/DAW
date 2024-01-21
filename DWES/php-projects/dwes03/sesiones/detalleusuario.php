<?php
  require_once 'session_control.php';

  require_once __DIR__ . '/etc/conf.php';
  require_once __DIR__ . '/src/conn.php';
  require_once __DIR__ . '/src/dbfuncs.php';
  require_once __DIR__ . '/src/userauth.php';

  /*
   * Almacenamos el ID del usuario en una variable para trabajar más comodamente
   * y comprobamos si el usuario que esta accediendo tiene permisos para ejecutar el script.
   */
  $userID = $_SESSION['id'];

  if (!checkRole($userID, ALLOW_SEE_DETAILS)) {
      header('Refresh: 3; url=usuarios.php');
      print '<B>Error: Solo el administrador, un coordinador o un trabajador social puede ver los detalles de usuario.</B>';
      print '<p>Redireccionando a la página de usuario...</a></</p>';
      exit();
  }

  $idusuario = filter_input(INPUT_POST, 'idusuario', FILTER_VALIDATE_INT);
  $pdo = connect();

//TODO: si $idusaurio no contiene un entero o no se recibe vía POST intentar rescatarlo de $_SESSION

  if (is_int($idusuario) && $idusuario > 0) {
      $detalle_usuario = detalle($pdo, id: $idusuario);
      if (is_array($detalle_usuario) && isset($detalle_usuario['dni'])) {
          $seguimientos = listarSeguimientos($pdo, $detalle_usuario['dni']);
      }
  }

//TODO: almacenar el último $idusuario en $_SESSION para posterior rescate (aquí y en header.php)
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalle del usuario</title>
        <link rel="stylesheet" href="styles/dwes02.css">
    </head>
    <body>
        <?php
          include __DIR__ . '/extra/header.php';
        ?>
        <h1>Detalle del Usuario</h1>
        <?php if (isset($detalle_usuario) && is_array($detalle_usuario) && count($detalle_usuario) > 0): ?>
              <table>
                  <?php
                  $dataDesc = array(
                      'id' => 'Identificador de usuario',
                      'dni' => 'DNI o NIE',
                      'fnacim' => 'Fecha de nacimiento',
                      'nombre' => 'Nombre',
                      'apellidos' => 'Apellidos',
                      'telefono' => 'Teléfono personal del usuario',
                      'email' => 'Email personal del usuario',
                      'nombre_tutor' => 'Nombre del tutor o tutora legal',
                      'apellidos_tutor' => 'Apellidos del tutor o tutora legal',
                      'telefono_tutor' => 'Teléfono del tutor o tutora legal',
                      'email_tutor' => 'Email del tutor o tutora legal'
                  );

                  foreach ($detalle_usuario as $key => $value) {
                      echo "<tr>";
                      echo "<th style=\"width:300px\">{$dataDesc[$key]}</th>";
                      echo "<td>" . ($value ? $value : "<i>Dato no registrado</i>") . "</td>";
                      echo "</tr>";
                  }
                  ?>
              </table>
              <?php
              if (checkRole($userID, ALLOW_SEE_TRACKING)):
                  if (isset($seguimientos) && is_array($seguimientos) && count($seguimientos) > 0):
                      ?>
                      <h1>Tabla de Seguimientos</h1>
                      <table>
                          <tr>
                              <th>Nombre del Empleado</th>
                              <th>Apellidos del Empleado</th>
                              <th>ID de Seguimiento</th>
                              <th>Fecha y Hora del Seguimiento</th>
                              <th>Medio de Seguimiento</th>
                              <th>Contactado</th>
                              <th>Informe de Seguimiento</th>
                              <th>Acciones</th>
                          </tr>
                          <?php foreach ($seguimientos as $seguimiento): ?>
                              <tr>
                                  <td><?= $seguimiento['nombre_empleado'] ?></td>
                                  <td><?= $seguimiento['apellidos_empleado'] ?></td>
                                  <td><?= $seguimiento['id_seguimiento'] ?></td>
                                  <td><?= date('d/m/Y H:i', strtotime($seguimiento['fechahora_seguimiento'])) ?></td>
                                  <td>
                                      <?php if ($seguimiento['medio_seguimiento'] === 'OTRO'): ?>
                                          OTRO (<?= htmlspecialchars($seguimiento['otro_seguimiento']) ?>)
                                      <?php else: ?>
                                          <?= $seguimiento['medio_seguimiento'] ?>
                                      <?php endif; ?>
                                  </td>
                                  <td><?= $seguimiento['contactado_seguimiento'] == 1 ? 'Sí' : 'No' ?></td>
                                  <td><?= $seguimiento['informe_seguimiento'] ?></td>
                                  <td>
                                      <form action="archivarseguimiento.php" method="post">
                                          <input type="submit" value="Archivar seguimiento">
                                          <input type="hidden" name="idseguimiento" value="<?= $seguimiento['id_seguimiento'] ?>">
                                          <input type="hidden" name="idusuario" value="<?= $detalle_usuario['id'] ?>">
                                      </form>
                                      <?php if (!$seguimiento['contactado_seguimiento']): ?>
                                          <BR>
                                          <form action="seguimientocontactado.php" method="post">
                                              <input type="submit" value="Contactado">
                                              <input type="hidden" name="id_seguimiento" value="<?= $seguimiento['id_seguimiento'] ?>">
                                              <input type="hidden" name="idusuario" value="<?= $detalle_usuario['id'] ?>">
                                          </form>
                                      <?php endif; ?>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </table>
                  <?php else: ?>
                      <h2>No se han registrado seguimientos para el usuario.</h2>
                  <?php endif; ?>
              <?php endif; ?>

              <?php
              if (checkRole($userID, ALLOW_SEE_TRACKING)):
                  $empleados = listarEmpleadosSeguimiento($pdo);
                  if (isset($detalle_usuario) && is_array($detalle_usuario) && is_array($empleados)):
                      include ('extra/formseguimiento.php');
                  endif;
              endif;
              ?>
          <?php else: ?>
              <h2>No se ha encontrado el usuario o no se ha proporcionado un id de usuario.</h2>
        <?php endif; ?>
    </body>
</html>