<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Francisco Javier Sueza Rodríguez" />
        <meta name="description" content="Formulario de Asociación Respira" />

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/estilo.css" />

        <title>Asociación Respira: Formulario</title>
    </head>

    <body class="flex flex__columns">
        <main class="flex contenido">
            <form class="form flex flex__columns" action="save.php" method="POST">
                <?php
                  /*
                   * Creamos variables para almacenar los datos del POST anterior, y hacer el
                   * código más legible y fácil de modificar.
                   */

                  $codigoPostal = "";
                  $sexo = "";
                  $curso = "";
                  $rama = "";

                  // Expresión regular para comprobar el codigo postal

                  $regexpCP = '/^\d{5}$/';

                  // Comprobamos el código postal y su formato

                  if (isset($_POST['codigo_postal']) && preg_match($regexpCP, $_POST['codigo_postal'])) {
                      $codigoPostal = htmlspecialchars($_POST['codigo_postal']);
                  }

                  /*
                   * Comprobamos el sexo y el curso. En los select no vamos a comprobar
                   * si estan inicializados porque al tener una opción por defecto siempre
                   * van a estar inicializados. Solo vamos a comprobar que contienen un valor correcto.
                   */

                  if ($_POST['sexo'] == 'M' || $_POST['sexo'] == 'F' || $_POST['sexo'] == 'O' || $_POST['sexo'] == 'N') {
                      $sexo = htmlspecialchars($_POST['sexo']);
                  }

                  if ($_POST['curso'] == "1ESO" || $_POST['curso'] == "2ESO" || $_POST['curso'] == "3ESO") {
                      $curso = htmlspecialchars($_POST['curso']);
                  }

                  // Por último comprobamos la rama

                  if (isset($_POST['rama']) && ($_POST['rama'] == "BCH" || $_POST['rama'] == "FP")) {
                      $rama = htmlspecialchars($_POST['rama']);
                  }
                ?>

                <!-- Creamos los input ocultos para pasar los datos con POST -->

                <input type="hidden" name="codigo_postal" value="<?php echo $codigoPostal ?>" />
                <input type="hidden" name="sexo" value="<?php echo $sexo ?>" />
                <input type="hidden" name="curso" value="<?php echo $curso ?>" />
                <input type="hidden" name="rama" value="<?php echo $rama ?>" />


                <div class="form__control">
                    Señala las asignaturas que te resulten más complicadas:<BR><BR>

                    <label><input type="checkbox" name="asgs[]" value="LCL"> Lengua Castellana y Literatura. </label><BR>
                    <label><input type="checkbox" name="asgs[]" value="M"> Matemáticas. </label><BR>

                    <!-- Si el curso elegido no es 2ESO, se muestra la asignatura Biología y Geología  -->

                    <?php
                      if ($curso != "2ESO")
                          print '<label><input type="checkbox" name="asgs[]" value="BG"> Biología y Geología.</label><BR>';
                    ?>

                    <label><input type="checkbox" name="asgs[]" value="GH"> Geografía e Historia. </label><BR>
                    <label><input type="checkbox" name="asgs[]" value="FQ"> Física y Química. </label><BR>
                    <label><input type="checkbox" name="asgs[]" value="I"> Inglés. </label><BR>
                </div>

                <br>
                <div class="form__control">
                    <label for="tiempolibre">Selecciona aquellas opciones a las que que dedicas tu tiempo libre (3 horas o más a la
                        semana):</label><BR>
                    <select id="tiempolibre" name="tiempolibre[]" multiple size="8">
                        <option value="deportes">Práctico deportes</option>
                        <option value="musica">Toco instrumentos musicales</option>
                        <option value="danza">Práctico danza</option>
                        <option value="art">Práctico actividades artísticas: teatro, pintura, etc.</option>
                        <option value="vjuegos">Juego a video juegos </option>
                        <option value="television">Veo la televisión</option>
                        <option value="dom">Realizo tareas domésticas: limpiar, cocinar, etc. </option>
                        <option value="lectura">Leo libros, cómics, revistas, etc. (sin contar los libros del instituto)</option>
                    </select><BR>
                </div>
                <small class="note">Nota: pulsa Ctrl+click para seleccionar más de una opción</small>
                <BR>
                <input type="submit" value="Terminar">
            </form>
        </main>
    </body>
</html>

