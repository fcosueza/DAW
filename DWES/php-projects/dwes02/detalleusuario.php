<?php

// REQUIRE de ARCHIVOS necesarios

// PROCESADO y VALIDACIÓN DE DATOS RECIBIDO Vía POST con filter_input (se debe recibir el id de usuario tipo entero)

// CONECTAR A LA BASE DE DATOS

// INVOCAR LA FUNCIÓN para obtener el detalle de usuario (se necesita pdo e id de usuario)

// INVOCAR LA FUNCIÓN para obtener la lista de seguimientos (se necesita pdo y DNI de usuario)
// Nota: el DNI lo puedes obetner del detalle de usuario anterior

// INVOCAR LA FUNCIÓN PARA OBTENER la lista de empleados (la consulta SQL se facilita  en la tarea)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del usuario</title>
    <link rel="stylesheet" href="styles/dwes02.css">
</head>
<body>    
<h1>Detalle del Usuario</h1>
<table>
        <tr><th style="width:300px">Identificador de usuario</th><td>1</td></tr>
        <tr><th style="width:300px">DNI o NIE</th><td>12345678A</td></tr>
        <tr><th style="width:300px">Fecha de nacimiento</th><td>2010-05-15</td></tr>
        <tr><th style="width:300px">Nombre</th><td>Juan</td></tr>
        <tr><th style="width:300px">Apellidos</th><td>Pérez García</td></tr>
        <tr><th style="width:300px">Teléfono personal del usuario</th><td>123456789</td></tr>
        <tr><th style="width:300px">Email personal del usuario</th><td>juan@example.com</td></tr>
        <tr><th style="width:300px">Nombre del tutor o tutora legal</th><td>María</td></tr>
        <tr><th style="width:300px">Apellidos del tutor o tutora legal</th><td>García López</td></tr>
        <tr><th style="width:300px">Teléfono del tutor o tutora legal</th><td>987654321</td></tr>
        <tr><th style="width:300px">Email del tutor o tutora legal</th><td>maria@example.com</td></tr>                
    </table>
<h1>Tabla de Seguimientos</h1>
    <table>
        <tr>
            <th>Nombre del Empleado</th>
            <th>Apellidos del Empleado</th>
            <th>ID de Seguimiento</th>
            <th>Fecha y Hora del Seguimiento</th>
            <th>Medio de Seguimiento</th>
            <th>Contactado</th>
            <th>Informe de Seguimiento</th>
            <th>Acciones</th>
        </tr>
             <tr>
                <td>Carlos</td>
                <td>López Martínez</td>
                <td>11</td>
                <td>24/10/2023 15:30</td>
                <td>
                PRESENCIAL                                    
                </td>
                </td>
                <td>Sí</td>
                <td><p>Durante la reunión presencial, se discutió el progreso del usuario en el programa. Se identificaron áreas de mejora y se establecieron objetivos realistas para las próximas semanas.</p></td>
                <td>                    
                    <form action="archivarseguimiento.php" method="post">
                        <input type="submit" value="Archivar seguimiento">
                        <input type="hidden" name="" value=""> <!-- ENCAPSULAR ID DE SEGUIMIENTO -->  
                    </form>                                        
                </td>
            </tr>
            <tr>
                <td>María</td>
                <td>González Pérez</td>
                <td>25</td>
                <td>12/11/2023 12:43</td>
                <td>
                OTRO (Whatsapp)</td>
                </td>
                <td>No</td>
                <td></td>
                <td>                    
                    <form action="archivarseguimiento.php" method="post">
                        <input type="submit" value="Archivar seguimiento">
                        <input type="hidden" name="" value=""> <!-- ENCAPSULAR ID DE SEGUIMIENTO -->                        
                    </form>                                        
                    <BR>
                    <form action="seguimientocontactado.php" method="post">
                        <input type="submit" value="Contactado">
                        <input type="hidden" name="" value=""> <!-- ENCAPSULAR ID DE SEGUIMIENTO -->                            
                    </form>
                </td>
            </tr>
    </table>
    <form action="registrarseguimiento.php" method="post">        
    <h3>Crear nuevo seguimiento</h3>
    <label for="fecha">Fecha:
    <input type="text" id="fecha" name="fecha" value=""> (formato dd/mm/AAAA)</label><br>
    <label for="hora">Hora:
    <input type="text" id="hora" name="hora" value="">(formato HH:mm)</label><br>
    <label for="empleado">Empleado:
    <select id="idempleado" name="empleado"> <!-- HAY QUE RELLENARLO CON DATOS DE LA BASE DE DATOS -->
                    <option value="ID EMPLEADO EXTRAIDO DE LA BASE DE DATOS" >NOMBRE EMPLEADO EXTRAIDO DE LA BASE DE DATOS</option>                    
    </select></label><br>
    <label for="medio_contacto">Medio de Contacto:
    <select id="medio" name="medio_contacto">
                    <option value="TLF"
                        >Teléfono</option>
                    <option value="EMAIL"
                        >Correo electrónico</option>
                    <option value="MAIL"
                        >Correo ordinario</option>
                    <option value="PRESENCIAL"
                        >Reunión presencial</option>
                    <option value="VIDEOCONF"
                        >Reunión por videoconfencia</option>
                    <option value="OTRO"
                        >Otro medio (indicar)</option>
            </select></label><br>
    <label for="otro">Otro medio de contacto:
    <input type="text" name="otro" id="otro" value=""></label>
    <input type="hidden" name="" value=""> <!-- ENCAPSULAR ID DE USUARIO -->
    <br>
    <input type="submit" value="Registrar seguimiento">
</form> 

</body>
</html>