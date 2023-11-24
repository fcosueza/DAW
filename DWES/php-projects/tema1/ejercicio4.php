<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Fco Sueza" />
        <meta name="description" content="Web para desarrollar las actividades en PHP del tema 1 de DWEC" />

        <title>DWEC - Tema 1 - Ejercicio 4</title>
    </head>

    <body>
        <header>
            <h1>Desarrollo Web en el Entorno Servidor: Tema 1 - Ejercicio 4</h1>
            <p>
                Modifica el ejercicio que mostraba la fecha en castellano, para que obtenga lo mismo a partir de un día, mes y año
                introducido por el usuario. Antes de mostrar la fecha, se debe comprobar que es correcta. Utilizar la misma página PHP para
                el formulario de introducción de datos y para mostrar la fecha obtenida en castellano.
            </p>
        </header>

        <main>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div>
                    <label for="dia">Introduzca el día del mes: </label>
                    <input id="dia" name="dia" type="number" min="1"  max="31" />

                    <?php
                      if (isset($_POST['enviar']) && empty($_POST['dia'])) {
                          echo "<p style=\"color:red\">Debe introducir un valor para el día.</p>";
                      }
                    ?>
                </div>

                <div>
                    <label for="mes">Introduzca numero del mes: </label>
                    <input id="mes" name="mes" type="number" min="1" max="12" />

                    <?php
                      if (isset($_POST['enviar']) && empty($_POST['mes'])) {
                          echo "<p style=\"color:red\">Debe introducir un valor para el mes.</p>";
                      }
                    ?>
                </div>

                <div>
                    <label for="ano">Introduzca el año: </label>
                    <input id="ano" name="ano" type="number" min="1979" max="2023" />

                    <?php
                      if (isset($_POST['enviar']) && empty($_POST['ano'])) {
                          echo "<p style=\"color:red\">Debe introducir un valor para el año.</p>";
                      }
                    ?>
                </div>

                <input name="enviar" type="submit" value="Enviar" />
            </form>

            <?php
              require("fecha.php");

              date_default_timezone_set("Europe/Madrid");

              if (!empty($_POST['dia']) || !empty($_POST['mes']) || !empty($_POST['ano'])) {

                  $dia = $_POST['dia'];
                  $mes = $_POST['mes'];
                  $ano = $_POST['ano'];

                  if (checkdate($dia, $mes, $ano)) {
                      $fecha = mktime(0, 0, 0, $dia, $mes, $ano);
                      print "<h3>" . fecha($dia, $mes, $ano) . "</h3>";
                  } else {
                      print "<h4 style = \"color: red\">La fecha introducida es errónea.</h4>";
                  }
              }
            ?>

        </main>
    </body>
</html>

