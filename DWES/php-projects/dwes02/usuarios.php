<?php
  require 'src/conn.php';
  require 'src/dbfuncs.php';

  /* Comprobamos los parametros del POST y los procesamos */

  if (isset($_POST['activos']) && $_POST['activos'] == 1)
      $activos = false;

  if (isset($_POST['filtrar']) && is_string($_POST['filtrar']))
      $filtro = filter_input(INPUT_POST, 'filtrar', FILTER_SANITIZE_STRING);

  /* Realizamos la conexión a la base de datos */
  $conexion = connect();

  /*
   * Si la conexión se ha realizado correctamente, vamos a crear un array donde
   * iremos añadiendo los parametros que vamos a pasarle a la función usuarios.
   *
   * El problema con el que me he encontrado es que no hay forma de omitir
   * parametros intermedios en la llamada a las funciones en PHP, por lo que si
   * quisieramos filtrar por nombre, pero no por si están activos o no, el filtro
   * se pasaría como segundo parametro, no como el tercero. Así que no podemos
   * omitir el segundo parametro.
   *
   * En cambio, si omitimos el último, no tendremos ningun problema. Por eso
   * el parametro activos, lo introduzco por defecto como true.
   *
   * Si hay otra forma de solucionar esta situación, agradecería mucho el feedback.
   */

  if ($conexion) {
      $args = [$conexion];
      $args[] = isset($activos) ? $activos : true;

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
            <label>Mostrar usuarios inactivos: <input type="checkbox" name="activos" value="1" >(si no se marca, se mostrarán los usuarios activos)</label><br>
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
            <?php
              if (isset($usuarios)) {
                  foreach ($usuarios as $row => $usuario) {
                      print '<tr>';
                      print '<td>' . $usuario['id'] . '</td>';
                      print '<td>' . $usuario['dni'] . '</td>';
                      print '<td>' . $usuario['fnacim'] . '</td>';
                      print '<td>' . $usuario['nombre'] . '</td>';
                      print '<td>' . $usuario['apellidos'] . '</td>';
                      print '<td>';
                      print '<form action = "detalleusuario.php" method = "post">';
                      print '<input type = "submit" value = "Ver detalle">';
                      print '<input type = "hidden" name = "id" value = "' . $usuario["id"] . '">';
                      print '</form>';
                      print '</td>';
                      print '</tr>';
                  }
              }
            ?>
        </table>
    </body>
</html>