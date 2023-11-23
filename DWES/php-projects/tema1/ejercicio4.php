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
            <?php
              date_default_timezone_set("Europe/Madrid");

              if (!empty($_POST['dia']) || !empty($_POST['mes']) || !empty($_POST['ano'])) {

                  $dia = $_POST['dia'];
                  $mes = $_POST['mes'];
                  $ano = $_POST['ano'];

                  if (checkdate($dia, $mes, $ano)) {
                      $fecha = mktime(0, 0, 0, $dia, $mes, $ano);
                      $diaSemana = date("N", $fecha);
                  }
              }
            ?>


            <form action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div>
                    <label for="dia">Introduzca el día del mes: </label>
                    <input id="dia" type="number" min="1"  max="31"/>
                </div>

                <div>
                    <label for="mes">Introduzca numero del mes: </label>
                    <input id="mes" type="number" min="1" max="12"/>
                </div>

                <div>
                    <label for="ano">Introduzca el año: </label>
                    <input id="ano" type="number" min="1979" max="2023"/>
                </div>

                <button type="submit">Enviar</button>
            </form>

        </main>
    </body>
</html>

