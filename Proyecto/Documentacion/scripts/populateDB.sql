\c soluciones_vecinales

INSERT INTO comunidad VALUES (DEFAULT, 'Arrayanes6', 'Arrayanes', 6, 'Granada', 'Granada', 'España');

INSERT INTO usuario VALUES ('fran@gmail.com', 'administrador', 'fcosueza', 'Francisco', 'Sueza Rodriguez', 'Arrayanes', 6, 4, 'A', 'Granada');
INSERT INTO usuario VALUES ('juan@gmail.com', 'inquilino', 'juanjuan', 'Juan', 'Ponce Rodriguez', 'Arrayanes', 6, 2, 'B', 'Granada');
INSERT INTO usuario VALUES ('alberto@gmail.com', 'inquilino', 'albertito', 'Alberto', 'Garcia Garcia', 'Arrayanes', 6, 1, 'C', 'Granada');
INSERT INTO usuario VALUES ('Maria@gmail.com', 'inquilino', 'armai', 'Maria', 'Morales Cabrera', 'Arrayanes', 6, 2, 'C', 'Granada');

INSERT INTO credenciales VALUES('fran@gmail.com', '123456');
INSERT INTO credenciales VALUES('juan@gmail.com', '123456');
INSERT INTO credenciales VALUES('alberto@gmail.com', '123456');
INSERT INTO credenciales VALUES('Maria@gmail.com', '123456');

INSERT INTO mensaje VALUES(DEFAULT, 1, 'Mensaje de Prueba 1, 2, 4');
INSERT INTO mensaje VALUES(DEFAULT, 1, 'Mensaje de Prueba 1, 2, 3');

INSERT INTO zona_comun VALUES('Campo de Futbol', 1, 'Campo de futbol 7', null, '12:00:00', '20:00:00');
INSERT INTO zona_comun VALUES('Pista de Padel', 1, 'Cancha de padel', null, '09:00:00', '16:00:00');
INSERT INTO zona_comun VALUES('SPA', 1, 'SPA de chorros', null, '08:00:00', '23:00:00');

INSERT INTO incidencia VALUES(1, 'fran@gmail.com', DEFAULT, 'La bombilla del 4ºA se ha roto.', 'creada');
INSERT INTO incidencia VALUES(1, 'alberto@gmail.com', DEFAULT, 'Rotura de la bajante.', 'procesandose');
INSERT INTO incidencia VALUES(1, 'juan@gmail.com', DEFAULT, 'Cagada de perro en el portal.', 'solucionada');


INSERT INTO reserva VALUES('fran@gmail.com', 'Campo de Futbol', 1, '2024-01-08', '10:00:00', '12:00:00');
INSERT INTO reserva VALUES('alberto@gmail.com', 'SPA', 1, '2024-01-10', '22:00:00', '23:00:00');

INSERT INTO incripcion VALUES('fran@gmail.com', 1);
INSERT INTO incripcion VALUES('alberto@gmail.com', 1);
INSERT INTO incripcion VALUES('juan@gmail.com', 1);

INSERT INTO solicitud VALUES('fran@gmail.com', 1, 'aprobada');
INSERT INTO solicitud VALUES('alberto@gmail.com', 1, 'aprobada');
INSERT INTO solicitud VALUES('juan@gmail.com', 1, 'aprobada');
INSERT INTO solicitud VALUES('Maria@gmail.com', 1, 'pendiente');


















