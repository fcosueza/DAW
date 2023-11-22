<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Fco Sueza" />
        <meta name="description" content="Web para desarrollar las actividades en PHP del tema 1 de DWEC" />

        <title>DWEC - Tema 1 - Ejercicio 2</title>
    </head>

    <body>
        <header>
            <h1>Desarrollo Web en el Entorno Servidor: Tema 1 - Ejercicio 2</h1>
            <p>
                Anteriormente hiciste un ejercicio que mostraba la fecha actual en castellano.
                Con el mismo objetivo (puedes utilizar el código ya hecho), crea una función que devuelva
                una cadena de texto con la fecha en castellano, e introduce la función en un fichero externo.
                Después crea una página en PHP que incluya ese fichero y utilice la función para mostrar en pantalla la fecha obtenida.
            </p>

            <?php
              require("fecha.php");

              echo "<h3>" . fecha() . "</h3>";
            ?>
        </header>
    </body>
</html>

