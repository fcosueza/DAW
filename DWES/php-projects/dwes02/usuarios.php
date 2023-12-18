<?php
  require 'src/conn.php';
  require 'src/dbfuncs.php';

  /* Comprobamos los parametros del POST y los procesamos */

  if (isset($_POST['activos']))
      $activos = false;

  if (isset($_POST['filtrar']))
      $filtro = filter_input(INPUT_POST, 'filtrar', FILTER_SANITIZE_STRING);

  /* Realizamos la conexión a la base de datos */
  $conexion = connect();

  /*
   * Si la conexión se ha realizado correctamente, vamos a crear un array donde
   * iremos añadiendo los parametros que vamos a pasarle a la función usuarios.
   * Cuando la llamemos, desempaquetaremos el array.
   */

  if ($conexion) {
      $args = [$conexion];

      if (isset($activos))
          $args[] = $activos;

      if (isset($filtro))
          $args[] = $filtro;

      $usuarios = usuarios(...$args);
  }
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

        <form action="" method="post">
            <H2>Filtrar datos</H2>
            <label>Mostrar usuarios inactivos: <input type="checkbox" name="inactivos" value="1" >(si no se marca, se mostrarán los usuarios activos)</label><br>
            <label>Filtrar usuarios: <input type="text" name="filtrar" value="" ></label><br>
            <input type="submit" value="¡Filtrar!">
        </form>
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
            <tr>

                <?php
                  <td>1</td>
                  <td>12345678A</td>
                  <td>15/05/2010</td>
                  <td>Juan</td>
                  <td>Pérez García</td>
                  <td>
                  <form action = "detalleusuario.php" method = "post">
                  <input type = "submit" value = "Ver detalle">
                  <input type = "hidden" name = "id" value = ""> <!--ENCAPSULAR AQUÍ ID DE USUARIO-->
                  </form>
                  </td>
                ?>
            </tr>
        </table>
    </body>
</html>