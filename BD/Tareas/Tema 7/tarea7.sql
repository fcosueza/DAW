-- Creación del tipo persona

CREATE OR REPLACE TYPE PERSONA as object(
  DNI varchar2(9),
  nombre varchar2(30),
  apellidos varchar2(40),
  telefono varchar2(9),
  f_ingreso date
) not final
/

-- Creación del Tipo Voluntario que hereda de persona

CREATE OR REPLACE TYPE  VOLUNTARIO under Persona (
  puntosAcumula number(8),

  member function calcularPuntosGanados(turnos number) return number
);
/

-- Se ha definido el metodo calcularPuntosGanados

CREATE OR REPLACE TYPE BODY VOLUNTARIO as
  member function calcularPuntosGanados(turnos number) RETURN NUMBER IS 
    puntos NUMBER;

    begin
      puntos := turnos * 50;

     return puntos;
   end calcularPuntosGanados;
end;

-- Se ha definido el tipo Cliente y su constructor

CREATE OR REPLACE TYPE CLIENTE UNDER Persona(
  ingresosMes NUMBER(6,2),
  miembrosFam NUMBER(2),
  tipoAyuda VARCHAR2(1),

  CONSTRUCTOR FUNCTION Cliente(
    DNI VARCHAR2, 
    nombre VARCHAR2, 
    apellidos VARCHAR2,
    telefono VARCHAR2,
    f_ingreso DATE, 
    ingresosMes NUMBER, 
    miembrosFam NUMBER
  ) RETURN self AS result
);
/

-- Definición del constructor Cliente que calcula automáticamente el valor de tipoAyuda

CREATE OR REPLACE TYPE BODY CLIENTE AS 
  CONSTRUCTOR FUNCTION Cliente(
    DNI VARCHAR2, 
    nombre VARCHAR2, 
    apellidos VARCHAR2,
    telefono VARCHAR2,
    f_ingreso DATE, 
    ingresosMes NUMBER, 
    miembrosFam NUMBER
  ) RETURN self AS result IS

   renta NUMBER;

   BEGIN
     SELF.DNI := DNI;
     SELF.nombre := nombre ;
     SELF.apellidos := apellidos;
     SELF.telefono := telefono;
     SELF.f_ingreso := f_ingreso;
     SELF.ingresosMes := ingresosMes;
     SELF.miembrosFam := miembrosFam;

     renta := ingresosMes / miembrosFam;

     IF (renta <= 50) THEN
       SELF.tipoAyuda := 'A';
     ELSIF (renta <= 100) THEN
       SELF.tipoAyuda := 'B';
     ELSE
       SELF.tipoAyuda := 'C';
     END IF;
     
     RETURN;
   END;

END;
/
/

-- Definición del tipo producto

CREATE OR REPLACE TYPE PRODUCTO AS OBJECT(
  codigo   VARCHAR2(3),
  nombre   VARCHAR2(30),
  cantidad NUMBER(3),
  medida   VARCHAR2(10)
)
/

-- Creación de la colección ListadoProductos

CREATE OR REPLACE TYPE LISTADOPRODUCTOS IS VARRAY(20) OF Producto
/

-- Creación del tipo Donación

CREATE OR REPLACE TYPE DONACION AS OBJECT(
  numero     VARCHAR2(3),
  valor      NUMBER(6,2),
  listaCesta ListadoProductos
)
/

-- Creación del tipo Entrega

CREATE OR REPLACE TYPE ENTREGA AS Object(
  numero     VARCHAR2(5),
  fecha      DATE,
  socio      Cliente,
  repartidor REF Voluntario,
  cesta      Donacion
)
/

-- Creación de las diferentes tablas 

CREATE TABLE VOLUNTARIADO OF  VOLUNTARIO;
CREATE TABLE SOCIOS OF CLIENTE;
CREATE TABLE CATALOGO OF PRODUCTO;
CREATE TABLE ENTREGADOS OF ENTREGA;

-- Bloque PL-SQL para el apartado 4.A

DECLARE
  voluntario_1 Voluntario;
  voluntario_2 Voluntario;
  puntos NUMBER;
BEGIN
  voluntario_1 := NEW Voluntario('10000000A', 'Jaime', 'Sánchez Terol', '111222333', TO_DATE('03/12/2018'), 200);
  voluntario_2 := NEW Voluntario('20000000B', 'Carmen', 'Mira González', '888999000', TO_DATE('08/02/2020'), 100);

  INSERT INTO Voluntariado VALUES(voluntario_1);
  INSERT INTO Voluntariado VALUES(voluntario_2);

  puntos := voluntario_1.calcularPuntosGanados(8);
  
  UPDATE Voluntariado SET Voluntariado.puntosAcumula = Voluntariado.puntosAcumula + puntos WHERE Voluntariado.DNI = '10000000A';
END;

-- Bloque PL-SQL para el apartado 4.B

Declare
  socio1 Cliente;
  socio2 Cliente;
  socio3 Cliente;
Begin
  socio1 := NEW Cliente('11111111A', 'Pepe', 'Amorós García', '555999000', TO_DATE('12/12/2004'), 200, 5, 'C');
  socio2 := NEW Cliente('22222222B', 'María', 'López Narváez', '222444666', TO_DATE('05/24/2008'), 780, 8);
  socio3 := NEW Cliente('33333333C', 'Luis', 'Pérez Sanz', '444555666', TO_DATE('01/31/2010'), 420, 9);

  INSERT INTO Socios VALUES(socio1);
  INSERT INTO Socios VALUES(socio2);
  INSERT INTO Socios VALUES(socio3);
end;