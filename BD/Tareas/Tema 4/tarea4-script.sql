SELECT * FROM cliente;

SELECT nombre, stock FROM productos WHERE stock<50 ORDER BY stock ASC;

SELECT nombre, apellidos, CONCAT(hora_inicio, " - ", hora_fin) AS horario FROM profesionales WHERE hora_inicio > "15:00";

SELECT * FROM cliente WHERE baja = "si" AND descuento > 40;

SELECT ci.fecha, ci.hora, ci.numero_fisio, cl.nombre, cl.apellidos FROM cita ci, cliente cl WHERE ci.DNI_cliente = cl.DNI AND ci.a_domicilio = "si" ORDER BY ci.fecha, ci.hora ASC;

SELECT MAX(precio) AS ProductoMasCaro, MIN(precio) AS ProductoMasBarato FROM productos;

SELECT 	pr.estado, COUNT(pi.numero_trabajador_pilates) AS profesores_pilates FROM profesionales pr LEFT JOIN profesor_pilates pi ON pi.numero_trabajador_pilates = pr.numero_trabajador GROUP BY pr.estado;

SELECT MONTHNAME(fecha) AS Mes, COUNT(*) AS NumeroDeCitas FROM cita WHERE YEAR(fecha) = "2022" GROUP BY MONTHNAME(fecha) ORDER BY COUNT(*) DESC;

SELECT DNI_cliente, numero_fisio, fecha, precio FROM cita WHERE DNI_cliente = "27256987J";

SELECT ci.numero_fisio, DATE_FORMAT(ci.fecha, "%d/%m/%y") FROM profesionales pr, cita ci WHERE pr.numero_trabajador = ci.numero_fisio AND ci.hora NOT BETWEEN pr.hora_inicio AND pr.hora_fin;

SELECT ci.fecha, cl.nombre, cl.apellidos FROM cita ci, cliente cl WHERE ci.DNI_cliente = cl.DNI AND ci.fecha=(SELECT MAX(fecha) FROM cita);

SELECT pr.nombre, pr.apellidos FROM profesionales pr, profesor_pilates pl WHERE pl.numero_trabajador_pilates = pr.numero_trabajador AND pr.estado NOT IN ("Despedido", "Ausente");

SELECT pro.nombre, SUM(ve.cantidad) AS UnidadesVendidas FROM productos pro, venden ve WHERE pro.id = ve.id_producto GROUP BY pro.nombre ORDER BY UnidadesVendidas;

SELECT pro.nombre, pro.apellidos, pro.telefono FROM profesionales pro, fisioterapeuta fi WHERE pro.numero_trabajador = fi.numero_trabajador_fisio 
AND (HOUR(pro.hora_fin) - HOUR(pro.hora_inicio)) < 5 AND pro.estado = "Trabajando"; 