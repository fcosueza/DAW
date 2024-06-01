@echo off

SET mysqlcommand="c:\xampp\mysql\bin\mysql.exe"
SET sql="modelo.sql"
IF EXIST %sql% (

IF EXIST %mysqlcommand% (
     %mysqlcommand% -u root < %sql%
) ELSE (
     echo ERROR: No se encuentra el comando %mysqlcommand%
)

) ELSE (
     echo ERROR:No se encuentra el archivo %sql%
)

echo Pulsa una tecla para cerrar esta ventana.
pause