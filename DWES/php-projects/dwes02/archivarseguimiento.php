<?php
// REQUIRE de ARCHIVOS necesarios

// PROCESADO y VALIDACIÓN DE DATOS RECIBIDO Vía POST con filter_input:
// - id de seguimiento (entero mayor de cero)
// - check de confirmación (cadena de texto no vacía)

// SI SOLO SE RECIBE EL ID DE SEGUIMIENTO PERO NO EL INFORME
// - Mostrar formulario para confirmar operación

// SI SE RECIBEN TODOS LOS DATOS POST y SON CORRECTOS:
// - NO MOSTRAR FORMULARIO de confirmación otra vez
// - Conectar a la base de datos
// - Ejecutar función para archivar
// - Mostrar resultado de la operación (puede que no se realice si el id de seguimiento no existe)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivar seguimiento</title>
    <link rel="stylesheet" href="styles/dwes02.css">
</head>
<body>
        
        <form action="" method="post"> <!-- FORMULARIO A ESTE MISMO SCRIPT-->
            <label>Marca la siguiente casilla para confirmar la operación de archivado 
            <input type="checkbox" name="" value=""></label>            
            <input type="submit" value="ARCHIVAR">            
            <input type="hidden" name="" value=""> <!-- REENCAPSULAR ID DE SEGUIMIENTO -->
            <input type="hidden" name="" value=""> <!-- OTROS CAMPOS HIDDEN QUE ESTIMES OPORTUNO -->
        </form>

</body>
</html>