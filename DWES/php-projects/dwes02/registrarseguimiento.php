<?php

// REQUIRE de ARCHIVOS necesarios

// PROCESADO y VALIDACIÓN DE DATOS RECIBIDO Vía POST con filter_input:
// - id de empleado (entero mayor de cero)
// - id de usuario (entero mayor de cero)
// - fecha (cadena con datos del estilo a DD/MM/AAAA), usar expresión regular
// - fecha, verificar con checkdate que es una fecha válida
// - hora (cadena con datos del estilo a a HH:MM), usar expresión regular
// - medio de contacto (uno de los medios posibles del listado, se debe verificar que no se introduzca algo no esperado)
// - otro (solo si en medio de contacto se puso OTRO, donde no debe estar vacío)

// SI HAY ERRORES en los datos SE MUESTRAN LOS ERRORES y se termina

// SI NO HAY ERRORES:
// - Conectar a la base de datos
// - Ejecutar la función
// - Modificar la fecha de formato dd/mm/aaaa a formato aaaa-mm-dd 
// - Mostrar si se pudo realizar la operación o no (puede que el id de empleado no exista o el id de usuario tampoco, con lo que la inserción puede retornar "0" o generar una excepción).
