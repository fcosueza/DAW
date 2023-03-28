INSERT INTO cita (numero_fisio, DNI_cliente, a_domicilio, duracion, fecha, hora) VALUES ("00008", "78036851V", "no", "00:45", "2023-01-27", "20:15");

INSERT INTO cita (numero_fisio, DNI_cliente, a_domicilio, fecha, hora, precio) VALUES ("00006", "27569874M", "no", "2023-01-29", "16:00", "20.60");

INSERT INTO cita (numero_fisio, DNI_cliente, duracion, fecha, hora, precio) VALUES ("00003", "73256987D", "01:00", "2023-02-02", "12:00", "40"); 

UPDATE productos SET precio = precio + ROUND((precio*15)/100, 2) WHERE nombre LIKE "%Vendaje%";

DELETE FROM cita WHERE numero_fisio IN (SELECT  numero_trabajador FROM profesionales WHERE estado IN ("Ausente", "Despedido")) AND precio < 25;

UPDATE cliente SET descuento = descuento + 5 WHERE DNI IN (SELECT DNI_cliente FROM cita WHERE YEAR(fecha) = 2022 GROUP BY DNI_cliente HAVING COUNT(DNI_cliente) > 2) AND descuento < 60;

INSERT INTO profesionales_baja SELECT numero_trabajador, DNI, especialidad, nombre, apellidos, telefono, estado, hora_inicio, hora_fin, hora_fin - hora_inicio FROM profesionales WHERE estado = "Despedido";


