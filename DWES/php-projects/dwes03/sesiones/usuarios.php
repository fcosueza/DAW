<?php
  require_once 'session_control.php';

  require_once __DIR__ . '/etc/conf.php';
  require_once __DIR__ . '/src/conn.php';
  require_once __DIR__ . '/src/dbfuncs.php';
  require_once __DIR__ . '/src/userauth.php';

  $inactivos = filter_input(INPUT_POST, 'inactivos', FILTER_SANITIZE_SPECIAL_CHARS);
  $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);

//TODO: implementar la función de recordar el último "nombre" usado para filtrar almacenandolo en la sesión

  $pdo = connect();
  $usuarios = usuarios($pdo, activos: ($inactivos === "si" ? false : true), filtro: ($nombre ?? ''));

  // Almacenamos el id de usuario en una variable para trabajar de forma más cómoda
  $userID = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de usuarios</title>
        <link rel="stylesheet" href="styles/dwes02.css">

    </head>
    <body>
        <?php
          include __DIR__ . '/extra/header.php';
        ?>

        <?php if (checkRole($userID, ALLOW_SEE_USERS)): ?>
              <form action="" method="post">
                  <H2>Filtrar datos</H2>
                  <label>Mostrar usuarios inactivos:
                      <input type="checkbox" name="inactivos" value="si" <?= $inactivos === "si" ? "checked" : "" ?>>(si no se marca, se mostrarán los usuarios activos)
                  </label>
                  <br>

                  <label>Filtrar usuarios:
                      <input type="text" name="nombre" value="<?= $nombre ?? "" ?>" >
                  </label>
                  <br>

                  <input type="submit" value="¡Filtrar!">
              </form>

              <?php if (is_array($usuarios) && count($usuarios) > 0): ?>
                  <h1>Usuarios asociación Respira</h1>
                  <table>
                      <tr>
                          <th>ID</th>
                          <th>DNI</th>
                          <th>Fecha de Nacimiento</th>
                          <th>Nombre</th>
                          <th>Apellidos</th>
                          <th>Acciones</th>
                      </tr>

                      <?php foreach ($usuarios as $u): ?>
                          <tr>
                              <td><?= $u['id'] ?></td>
                              <td><?= $u['dni'] ?></td>
                              <td><?= date('d/m/Y', strtotime($u['fnacim'])) ?></td>
                              <td><?= $u['nombre'] ?></td>
                              <td><?= $u['apellidos'] ?></td>
                              <td>
                                  <form action="detalleusuario.php" method="post">
                                      <input type="submit" value="Ver detalle">
                                      <input type="hidden" name="idusuario" value="<?= htmlspecialchars($u['id']) ?>">
                                  </form>
                              </td>
                          </tr>
                      <?php endforeach; ?>

                  </table>
              <?php else: ?>
                  La búsqueda no genero resultados.
              <?php endif; ?>
          <?php else: ?>
              <h2>Contenido restringido.</h2>
        <?php endif; ?>
    </body>
</html>