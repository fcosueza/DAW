<?php

// REQUIRE de ARCHIVOS necesarios

// PROCESADO y VALIDACIÓN E DATOS RECIBIDO Vía POST con filter_input (se puede recibir, o no, el valor del checkbox y el filtro de nombre de usuario).

// CONECTAR A LA BASE DE DATOS

// INVOCAR LA FUNCIÓN USUARIOS para obtener los usuarios.
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
        <label>Mostrar usuarios inactivos: <input type="checkbox" name="" value="" >(si no se marca, se mostrarán los usuarios activos)</label><br>
        <label>Filtrar usuarios: <input type="text" name="" value="" ></label><br>
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
                <td>1</td>
                <td>12345678A</td>
                <td>15/05/2010</td>
                <td>Juan</td>
                <td>Pérez García</td>
                <td>
                    <form action="detalleusuario.php" method="post">
                        <input type="submit" value="Ver detalle">
                        <input type="hidden" name="" value=""> <!-- ENCAPSULAR AQUÍ ID DE USUARIO -->
                    </form>
                </td>
            </tr>
        </table>
</body>
</html>