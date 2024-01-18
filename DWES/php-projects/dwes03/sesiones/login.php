<?php
  include_once __DIR__ . '/etc/conf.php';
  include_once __DIR__ . '/src/conn.php';
  include_once __DIR__ . '/src/userauth.php';
  /* TODO: 0.- Antes de nada, incluye los archivos necesarios para verificar el usuario (entre ellos, el archivo userauth.php) */
  /* TODO: 1.- Arranca el uso de sesiones */
  /* TODO: 2.- Verifica si hay información del usuario en la sesión, si es así,
    el usuario ya está autenticado y no tiene que mostrarse le formulario de dni y password. Saltamos al paso 5. */
  /* TODO: 3.- Si no hay información de usuario en la sesión, comprueba si se ha recibido los datos post del
    formulario, autentica al usuario usando la función creada en userauth.php e introduce los datos en la sesión si la autenticación
    ha sido satisfactoria */
  /* TODO: 4.- Si la autenticación ha sido satisfactoria, anota el momento en el que ha hecho login en la sesión para el control de inactividad (time()) */
  /* TODO: 5.- Si la autenticación ha sido satisfactoria o ya está autenticado, muestra un mensaje de bienvenida y un enlace a usuarios.php */
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
        <?php if (!isset($_SESSION['id'])): ?>
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