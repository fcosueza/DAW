<?php
  include_once __DIR__ . '/etc/conf.php';
  include_once __DIR__ . '/src/conn.php';
  include_once __DIR__ . '/src/userauth.php';

  /*
   * Iniciamos la sesion y comprobamos si el usuario ya estaba autenticado.
   * Si lo esta, solo cambiamos el valor de la variable $authenticated. Si no
   * estaba autentificado comprobamos si hay datos en el $_POST, los filtramos,
   * y si estos son correctos, se establece la información en la variable $_SESSION.
   *
   * En caso de que los datos no sean correctos, se muestrará la página de login de nuevo.
   */
  session_start();

  $authenticated = false;

  if (isset($_SESSION['id'])) {
      $authenticated = true;
  } else if ($_POST) {
      $user = filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $password = filter_input(INPUT_POST, 'password');

      if (isset($user) && isset($password) && is_string($user) && is_string($password)) {
          $dbConnection = connect();
          $authUser = authUser($dbConnection, $user, $password);

          if ($authUser) {
              $_SESSION['id'] = $authUser['id'];
              $_SESSION['nombre'] = $authUser['nombre'];
              $_SESSION['apellidos'] = $authUser['apellidos'];
              $_SESSION['roles'] = $authUser['roles'];
              $_SESSION['actividad'] = time();

              $authenticated = true;
          }
      }
  }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Empleados Asociación Respira</title>
    </head>
    <body>
        <?php if (!$authenticated): ?>
              <H1> Formulario de login </H1>
              <form action="" method="post">
                  <label for="dni">DNI: <input type="text" name="dni" id="dni"></label><br>
                  <label for="password">Password: <input type="password" name="password" id="password"></label><br>
                  <input type='submit' value='¡Entrar!'>
              </form>
          <?php else: ?>
              <h2>Bienvenido!! Para continuar, puedes visitar es enlace: <a href="usuarios.php">Usuarios</a></h2>
        <?php endif; ?>
    </body>
</html>