SELECT * FROM cliente;

SELECT nombre, stock FROM productos WHERE stock<50 ORDER BY stock ASC;

SELECT nombre, apellidos, CONCAT(hora_inicio, " - ", hora_fin) AS horario FROM profesionales WHERE hora_inicio > "15:00";

SELECT * FROM cliente WHERE baja = "si" AND descuento > 40;

SELECT ci.fecha, ci.hora, cl.nombre, cl.apellidos, ci.numero_fisio FROM cita ci, cliente cl WHERE ci.a_domicilio = "si" ORDER BY ci.fecha, ci.hora ASC;

SELECT MAX(precio) AS ProductoMasCaro, MIN(precio) AS ProductoMasBarato FROM productos;

SELECT 	pr.estado, COUNT(pi.numero_trabajador_pilates) AS profesores_pilates FROM profesionales pr LEFT JOIN profesor_pilates pi ON pi.numero_trabajador_pilates = pr.numero_trabajador GROUP BY pr.estado;

SELECT MONTHNAME(fecha) AS Mes, COUNT(*) AS NumeroDeCitas FROM cita WHERE YEAR(fecha) = "2022" GROUP BY MONTHNAME(fecha) ORDER BY COUNT(*) DESC;