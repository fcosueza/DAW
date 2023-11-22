<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Fco Sueza" />
        <meta name="description" content="Web para desarrollar las actividades en PHP del tema 1 de DWEC" />

        <title>DWEC - Tema 1 - Ejercicio 3</title>
    </head>

    <body>
        <header>
            <h1>Desarrollo Web en el Entorno Servidor: Tema 1 - Ejercicio 3</h1>
            <p>
                Haz una página PHP que utilice foreach para mostrar todos los valores del array $_SERVER en una tabla con dos columnas.
                La primera columna debe contener el nombre de la variable, y la segunda su valor.
            </p>
        </header>
        <main>
            <table style="border: 1px solid; border-collapse: collapse">
                <thead style="border: 1px solid">
                    <tr>
                        <td style="font-weight: bold; border: 1px solid; padding: 5px">Variable</td>
                        <td style="font-weight: bold; border: 1px solid; padding: 5px">Valor</td>
                    </tr>
                </thead>
                <tbody style="border: 1px solid">
                    <?php
                      foreach ($_SERVER as $variable => $valor) {
                          echo "<tr style=\"border: 1px solid\"><td style=\"border: 1px solid; padding: 5px\">$variable</td><td>$valor</td></tr>";
                      }
                    ?>
                </tbody>
            </table>
        </main>
    </body>
</html>

