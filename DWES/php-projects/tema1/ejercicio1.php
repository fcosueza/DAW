<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Fco Sueza" />
        <meta name="description" content="Web para desarrollar las actividades en PHP del tema 1 de DWEC" />

        <title>DWEC - Tema 1 - Ejercicio 1</title>
    </head>

    <body>
        <header>
            <h1>Desarrollo Web en el Entorno Servidor: Tema 1 - Ejercicio 1</h1>
            <p>Haz una página web que muestre la fecha actual en castellano, incluyendo el día de la semana,
                con un formato similar al siguiente: "Miércoles, 14 de Octubre de 2015".
            </p>

            <?php
              $diaSemana = date("l");
              $diaNumero = date("j");
              $mes = date("F");
              $ano = date("Y");

              echo "<h4>Fecha: $diaSemana, $diaNumero of $mes of $ano</h4>";
            ?>
        </header>
    </body>
</html>
