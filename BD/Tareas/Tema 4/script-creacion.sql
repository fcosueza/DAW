DROP DATABASE IF EXISTS CUIDATUCUERPO;

CREATE DATABASE IF NOT EXISTS CUIDATUCUERPO;

USE CUIDATUCUERPO;

create table PROFESIONALES (
    numero_trabajador char(5) PRIMARY KEY,
    DNI char(9),
    especialidad varchar(60),
    nombre varchar(20),
    apellidos varchar(60),
    telefono char(9),
    estado varchar(20) check (estado in('Trabajando','Ausente','Despedido')),
    hora_inicio time,
    hora_fin time
);

create table FISIOTERAPEUTA (
    numero_trabajador_fisio char(5) PRIMARY KEY,
    numero_colegiado varchar(20) UNIQUE,
	CONSTRAINT FIS_NF_FK FOREIGN KEY (numero_trabajador_fisio) REFERENCES PROFESIONALES(numero_trabajador) ON DELETE CASCADE ON UPDATE CASCADE
);

create table PROFESOR_PILATES (
    numero_trabajador_pilates char(5) PRIMARY KEY,
    anos_experiencia smallint,
	CONSTRAINT PROF_PIL_FK FOREIGN KEY (numero_trabajador_pilates) REFERENCES PROFESIONALES(numero_trabajador) ON DELETE CASCADE ON UPDATE CASCADE
);

create table PRODUCTOS (
    id char(8) PRIMARY KEY,
    nombre varchar(60),
    Precio float,
    Stock smallint,
    Stock_minimo smallint
);

create table venden (
	numero_trabajador char(5),
    id_producto char(8),
	cantidad mediumint,
    PRIMARY KEY(numero_trabajador,id_producto),
    CONSTRAINT VEN_NT_FK FOREIGN KEY (numero_trabajador) REFERENCES PROFESIONALES(numero_trabajador) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT VEN_ID_FK FOREIGN KEY (id_producto) REFERENCES PRODUCTOS(id) ON DELETE CASCADE ON UPDATE CASCADE
);

create table CLIENTE (
    DNI char(9) PRIMARY KEY,
    nombre varchar(60),
    apellidos varchar(60),
    telefono char(9),
    descuento smallint,
    baja varchar(2) check (baja in('si','no'))
);

create table cita (
	numero_fisio char(5),
    DNI_cliente char(9),  
	a_domicilio varchar(2) check (a_domicilio in('si','no')),
	duracion time,
    fecha date,
    hora time,
    precio decimal(6,2),
    PRIMARY KEY(numero_fisio,DNI_cliente, fecha, hora),
    CONSTRAINT DNI_CLI_FK FOREIGN KEY (DNI_cliente) REFERENCES CLIENTE(DNI) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT CIT_NF_FK FOREIGN KEY (numero_fisio) REFERENCES FISIOTERAPEUTA(numero_trabajador_fisio) ON DELETE CASCADE ON UPDATE CASCADE
);

create table SALAS (
	codigo char(3) PRIMARY KEY,
	nombre varchar(30),
	dimension tinyint
);

create table imparte (
    numero_trabajador_pilates char(5),
	codigo_sala char(3),
    fecha date,
    hora time,
	PRIMARY KEY(numero_trabajador_pilates,codigo_sala, fecha, hora),
    CONSTRAINT IMP_PIL_FK FOREIGN KEY (numero_trabajador_pilates) REFERENCES PROFESOR_PILATES(numero_trabajador_pilates) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT COD_IMP_FK FOREIGN KEY (codigo_sala) REFERENCES SALAS(codigo) ON DELETE CASCADE ON UPDATE CASCADE
);

create table MAQUINA (
    id char(5) PRIMARY KEY,
	descripcion varchar(20),
    estado varchar(60) check (estado in('operativo','pendiente de reparación','no operativo')),
    codigo_sala char(3),
    CONSTRAINT COD_MAQ_FK FOREIGN KEY (codigo_sala) REFERENCES SALAS(codigo) ON DELETE CASCADE ON UPDATE CASCADE
);



INSERT INTO profesionales VALUES('00001','56948768S','Fisioterapia deportiva','Juan', 'Pérez Garcia','950333222', 'Trabajando','8:30:00','12:30:00');
INSERT INTO profesionales VALUES('00002','26359412L','Fisioterapia ortopédica','Beatriz', 'López Martínez', '950625987', 'Ausente','9:30:00','13:30:00');
INSERT INTO profesionales VALUES('00003','45362198P','Fisioterapia ginecológica','Laura', 'Ortiz García','950324957', 'Trabajando','10:30:00','14:30:00');
INSERT INTO profesionales VALUES('00004','89311145M','Fisioterapia traumatológica','Rafael', 'García Salcedo','950259011', 'Despedido','11:30:00','15:30:00');
INSERT INTO profesionales VALUES('00005','92113355H','Fisioterapia pediátrica','Macarena', 'Fernández Sánchez','950663344', 'Trabajando','16:30:00','22:30:00');
INSERT INTO profesionales VALUES('00006','75241338N','Fisioterapia deportiva','Antonio', 'Fernández Gómez','665780780', 'Trabajando','15:30:00','22:30:00');
INSERT INTO profesionales VALUES('00007','22358785M','Fisioterapia deportiva','Adolfo', 'Garrido Pérez','689785478', 'Trabajando','15:30:00','22:30:00');
INSERT INTO profesionales VALUES('00008','12365478J','Fisioterapia ortopédica','Isabel', 'Fuentes Expósito','665990780', 'Trabajando','14:30:00','20:30:00');
INSERT INTO profesionales VALUES('00009','78547965L','Fisioterapia deportiva','Joaquín', 'Galdós Estepa','950365789', 'Trabajando','17:30:00','22:30:00');
INSERT INTO profesionales VALUES('00010','78456123W','Fisioterapia ortopédica','Ángel', 'González Trigueros','950365781', 'Despedido','15:30:00','22:30:00');
INSERT INTO profesionales VALUES('00031','55412679B','Pilates terapeutico','Carmen', 'Hernandez Lopez','950663344', 'Trabajando','8:30:00','12:30:00');
INSERT INTO profesionales VALUES('00032','35947210N','Osteopatía','Joaquin', 'Lopez Garcia','950224466', 'Despedido','8:30:00','12:30:00');
INSERT INTO profesionales VALUES('00033','63212200K','Osteopatía','Dolores', 'Sanchez Sanchez','950115588', 'Trabajando','8:30:00','12:30:00');
INSERT INTO profesionales VALUES('00034','42117799F','Pilates aereo','Carlos', 'Hernandez Gomez','950224466', 'Despedido','10:30:00','14:30:00');
INSERT INTO profesionales VALUES('00035','24796587C','Pilates embarazadas','Almudena', 'Martin Palomares','950634521', 'Trabajando','11:30:00','15:30:00');
INSERT INTO profesionales VALUES('00036','78547965L','Osteopatía','Joaquín', 'Galdós Estepa','950365789', 'Trabajando','11:30:00','15:30:00');
INSERT INTO profesionales VALUES('00037','12365478J','Osteopatía','Isabel', 'Fuentes Expósito','665990780', 'Trabajando','10:30:00','12:30:00');


INSERT INTO fisioterapeuta VALUES('00001','25');
INSERT INTO fisioterapeuta VALUES('00002','03');
INSERT INTO fisioterapeuta VALUES('00003','15');
INSERT INTO fisioterapeuta VALUES('00004','41');
INSERT INTO fisioterapeuta VALUES('00005','36');
INSERT INTO fisioterapeuta VALUES('00006','37');
INSERT INTO fisioterapeuta VALUES('00007','47');
INSERT INTO fisioterapeuta VALUES('00008','77');
INSERT INTO fisioterapeuta VALUES('00009','73');
INSERT INTO fisioterapeuta VALUES('00010','51');
INSERT INTO profesor_pilates VALUES('00031','6');
INSERT INTO profesor_pilates VALUES('00032','14');
INSERT INTO profesor_pilates VALUES('00033','30');
INSERT INTO profesor_pilates VALUES('00034','14');
INSERT INTO profesor_pilates VALUES('00035','48');
INSERT INTO profesor_pilates VALUES('00036','15');
INSERT INTO profesor_pilates VALUES('00037','12');

INSERT INTO productos VALUES('00000475','Vendajes compresivos','13.99','83', '50');
INSERT INTO productos VALUES('00000476','Vendajes tubulares','22.99','40', '30');
INSERT INTO productos VALUES('00000477','Vendajes neuromusculares','36.99','210', '200');
INSERT INTO productos VALUES('00000478','Cremas Fisiocrem','21.99','300', '150');
INSERT INTO productos VALUES('00000479','Anillo Magico de pilates','9.99','7', '10');
INSERT INTO productos VALUES('00000480','Creatina','15.99','17', '10');

INSERT INTO venden VALUES('00006','00000475','10');
INSERT INTO venden VALUES('00006','00000476','12');
INSERT INTO venden VALUES('00006','00000477','8');
INSERT INTO venden VALUES('00001','00000479','9');
INSERT INTO venden VALUES('00002','00000478','18');
INSERT INTO venden VALUES('00002','00000477','25');
INSERT INTO venden VALUES('00031','00000477','28');
INSERT INTO venden VALUES('00033','00000476','19');
INSERT INTO venden VALUES('00034','00000476','14');
INSERT INTO venden VALUES('00037','00000475','4');


INSERT INTO cliente VALUES('27256987J','Antonio','Garcia Benavides','634867423','8', 'no');
INSERT INTO cliente VALUES('27569874M','Mario','Fernandez Gomez','664859321','50', 'si');
INSERT INTO cliente VALUES('29256874L','Victor','Ramirez Ramos','611445566','9', 'no');
INSERT INTO cliente VALUES('31785458G','Alicia','Lopez Fernandez','643456239','60', 'si');
INSERT INTO cliente VALUES('31987125D','Angela','Martinez Pozo','621663377','20', 'no');
INSERT INTO cliente VALUES('35789512M','Antonio','Pérez Luz','621664577','15', 'no');
INSERT INTO cliente VALUES('42985647J','María','De la O','621233377','20', 'no');
INSERT INTO cliente VALUES('55789789H','Adela','Angustia Villalba','623213377','20', 'no');
INSERT INTO cliente VALUES('62854789P','Esther','Ruiz Martínez','621663456','25', 'no');
INSERT INTO cliente VALUES('63256985F','Laura','Enrique Gómez','621663789','20', 'no');
INSERT INTO cliente VALUES('75241338N','Jose','Altaduna Miralles','652478987','20', 'no');
INSERT INTO cliente VALUES('75241339T','Bienvenido','Pacheco Ortiz','658987458','15', 'no');
INSERT INTO cliente VALUES('76458748Z','Luis','Luna García','625713987','0', 'no');
INSERT INTO cliente VALUES('74586985B','Adolfo','Expósito Belmonte','668987458','20', 'no');
INSERT INTO cliente VALUES('73256987D','Andrés','Berbel Fenoy','666321456','20', 'no');
INSERT INTO cliente VALUES('78035699H','Alejando','Cuello Loris','699874587','50', 'si');
INSERT INTO cliente VALUES('78036851V','Abdiel','Jiménez García','631321524','20', 'no');
INSERT INTO cliente VALUES('78256985P','Víctor','Miranda Rox','699899799','20', 'no');


INSERT INTO cita VALUES('00002','27256987J','si','00:45:00','2021-09-02','09:30:00','30.99');
INSERT INTO cita VALUES('00001','78256985P','si','01:00:00','2021-10-06','08:30:00','60.99');
INSERT INTO cita VALUES('00003','78035699H','no','00:30:00','2021-11-08','10:30:00','25.99');
INSERT INTO cita VALUES('00008','27256987J','si','00:25:00','2021-12-12','14:30:00','20.99');
INSERT INTO cita VALUES('00003','31987125D','no','01:00:00','2021-12-13','11:30:00','50.99');
INSERT INTO cita VALUES('00008','75241339T','si','00:45:00','2022-01-02','16:30:00','20.99');
INSERT INTO cita VALUES('00006','31987125D','si','00:45:00','2022-05-03','10:30:00','40.99');
INSERT INTO cita VALUES('00007','74586985B','no','00:25:00','2022-05-04','20:30:00','32.99');
INSERT INTO cita VALUES('00008','42985647J','no','00:45:00','2022-06-09','18:30:00','20.99');
INSERT INTO cita VALUES('00009','62854789P','si','00:55:00','2022-07-02','19:30:00','27.99');
INSERT INTO cita VALUES('00001','78036851V','si','00:35:00','2022-08-12','11:30:00','20.99');
INSERT INTO cita VALUES('00002','78036851V','no','00:45:00','2022-08-12','10:30:00','22.99');
INSERT INTO cita VALUES('00003','27569874M','no','00:45:00','2022-08-15','12:30:00','25.99');
INSERT INTO cita VALUES('00004','42985647J','no','00:45:00','2022-09-12','12:30:00','20.99');
INSERT INTO cita VALUES('00003','27569874M','no','00:55:00','2022-10-12','13:30:00','19.99');
INSERT INTO cita VALUES('00006','27569874M','no','00:45:00','2022-11-04','18:30:00','20.99');
INSERT INTO cita VALUES('00007','27256987J','no','00:50:00','2022-11-05','21:30:00','25.99');
INSERT INTO cita VALUES('00008','73256987D','no','00:50:00','2022-11-06','17:30:00','25.99');
INSERT INTO cita VALUES('00006','76458748Z','no','00:40:00','2022-11-06','15:30:00','25.99');
INSERT INTO cita VALUES('00009','63256985F','no','00:40:00','2022-12-07','20:30:00','20.99');
INSERT INTO cita VALUES('00008','76458748Z','si','00:50:00','2022-12-09','19:30:00','20.99');
INSERT INTO cita VALUES('00007','73256987D','no','00:45:00','2022-12-06','20:30:00','25.99');
INSERT INTO cita VALUES('00003','55789789H','no','00:45:00','2022-12-12','10:30:00','15.99');
INSERT INTO cita VALUES('00003','55789789H','no','00:50:00','2022-12-12','11:30:00','15.99');
INSERT INTO cita VALUES('00004','31785458G','no','00:40:00','2022-12-15','11:30:00','25.99');
INSERT INTO cita VALUES('00002','63256985F','no','00:30:00','2022-12-18','12:30:00','15.99');
INSERT INTO cita VALUES('00007','31785458G','no','00:30:00','2022-12-22','18:30:00','20.99');

INSERT INTO SALAS VALUES('101','Pilates 1','35');
INSERT INTO SALAS VALUES('102','Pilates 2','30');
INSERT INTO SALAS VALUES('201','Pilates especial','46');
INSERT INTO SALAS VALUES('202','Pilates segunda planta','49');
INSERT INTO SALAS VALUES('203','Sala aeróbica','80');


INSERT INTO maquina VALUES('00160','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00161','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00162','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00163','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00164','Banco de abdominales','no operativo','101');
INSERT INTO maquina VALUES('00165','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00166','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00167','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00168','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00169','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00170','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00171','Banco de abdominales','operativo','101');
INSERT INTO maquina VALUES('00180','Multigym','pendiente de reparación','203');
INSERT INTO maquina VALUES('00181','Multigym','operativo','203');
INSERT INTO maquina VALUES('00182','Multigym','operativo','203');
INSERT INTO maquina VALUES('00183','Multigym','operativo','203');
INSERT INTO maquina VALUES('00184','Multigym','operativo','203');
INSERT INTO maquina VALUES('00185','Multigym','operativo','203');
INSERT INTO maquina VALUES('00190','Airbike','operativo','201');
INSERT INTO maquina VALUES('00191','Airbike','pendiente de reparación','201');
INSERT INTO maquina VALUES('00192','Airbike','no operativo','201');
INSERT INTO maquina VALUES('00193','Airbike','operativo','201');
INSERT INTO maquina VALUES('00200','Balones medicinales','operativo','202');
INSERT INTO maquina VALUES('00201','Balones medicinales','operativo','202');
INSERT INTO maquina VALUES('00202','Balones medicinales','operativo','202');
INSERT INTO maquina VALUES('00203','Balones medicinales','operativo','202');
INSERT INTO maquina VALUES('00204','Balones medicinales','operativo','202');
INSERT INTO maquina VALUES('00205','Balones medicinales','operativo','202');
INSERT INTO maquina VALUES('00206','Balones medicinales','operativo','202');


INSERT INTO imparte VALUES('00031','101','2021-09-02','09:30:00');
INSERT INTO imparte VALUES('00032','101','2021-09-03','09:30:00');
INSERT INTO imparte VALUES('00032','203','2021-09-07','09:30:00');
INSERT INTO imparte VALUES('00033','203','2021-09-12','10:30:00');
INSERT INTO imparte VALUES('00031','102','2021-11-09','10:30:00');
INSERT INTO imparte VALUES('00034','102','2021-12-02','11:30:00');
INSERT INTO imparte VALUES('00035','202','2022-04-03','12:30:00');
INSERT INTO imparte VALUES('00031','202','2022-05-04','11:30:00');
INSERT INTO imparte VALUES('00032','102','2022-06-02','09:30:00');
INSERT INTO imparte VALUES('00036','101','2022-07-05','09:30:00');
INSERT INTO imparte VALUES('00037','102','2022-08-02','11:30:00');
INSERT INTO imparte VALUES('00032','202','2022-09-08','09:30:00');
INSERT INTO imparte VALUES('00033','203','2022-10-02','10:30:00');
INSERT INTO imparte VALUES('00034','202','2022-11-02','11:30:00');
INSERT INTO imparte VALUES('00034','102','2022-11-15','12:30:00');
INSERT INTO imparte VALUES('00033','203','2022-11-24','11:30:00');
INSERT INTO imparte VALUES('00035','203','2022-11-28','12:30:00');
INSERT INTO imparte VALUES('00036','101','2022-12-13','11:30:00');
INSERT INTO imparte VALUES('00035','102','2022-12-02','12:30:00');
INSERT INTO imparte VALUES('00036','201','2022-12-13','13:30:00');
INSERT INTO imparte VALUES('00037','202','2022-12-14','11:30:00');
INSERT INTO imparte VALUES('00033','102','2022-12-16','12:30:00');
INSERT INTO imparte VALUES('00032','102','2022-12-16','12:30:00');
INSERT INTO imparte VALUES('00034','201','2022-12-18','13:30:00');

