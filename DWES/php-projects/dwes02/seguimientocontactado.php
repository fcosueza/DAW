<?php
// REQUIRE de ARCHIVOS necesarios

// PROCESADO y VALIDACIÓN DE DATOS RECIBIDO Vía POST con filter_input:
// - id de seguimiento (entero mayor de cero)
// - informe (cadena de texto no vacía)

// SI SOLO SE RECIBE EL ID DE SEGUIMIENTO PERO NO EL INFORME
// - Mostrar formulario para rellenar el informe

// SI SE RECIBEN TODOS LOS DATOS POST y SON CORRECTOS:
// - NO MOSTRAR FORMULARIO PARA RELLENAR INFORME OTRA VEZ
// - Conectar a la base de datos
// - Ejecutar función para rellenar informe
// - Mostrar resultado de la operación (puede que no se realice si el id de seguimiento no existe)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/dwes02.css">
</head>
<body>

<form action="" method="post"> <!-- ACTION A ESTE MISMO SCRIPT -->

<label for="informe">Introduzca el informe de seguimiento:</label>
<textarea name="informe" id="informe" cols="80" rows="10"></textarea>
<br>
<input type="hidden" name="" value=""> <!-- ENCAPSULAR AQUÍ ID DE SEGUIMIENTO -->
<input type="hidden" name="" value=""> <!-- OPCIONAL: puedes usar más hidden si lo estimas oportuno -->
<input type="submit" value="Confirmar contacto y añadir informe">
</form>

</body>
</html>