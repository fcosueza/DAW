
-- Procedimiento para calcular el número de clientes que han tenido con un fisioterapeuta dado.

create or replace PROCEDURE NumeroCLientesFisio(pNumeroFisio VARCHAR2)
AS
CURSOR clientesFisio IS
    SELECT cli.nombre, cli.apellidos, cli.dni, cli.telefono, ci.fecha_hora, ci.precio
    FROM cita ci, cliente cli
    WHERE ci.numero_fisio = pNumeroFisio AND ci.dni_cliente = cli.dni;

-- Declaramos una excepción por si el parameto introducido no es correcto mostrar un mensaje de ayuda.

invalid_param EXCEPTION;
PRAGMA exception_init(invalid_param, -404);

rowClientes clientesFisio%ROWTYPE;

BEGIN

-- Si la longitud del parmetro no es correcta, lanzamos una excepción
    
if (LENGTH(pNumeroFisio) <> 5) THEN
    RAISE invalid_param;
END IF;

open clientesFisio;
fetch clientesFisio INTO rowClientes;

-- Formateamos un poco la salida, para adaptarla a los requerimientos del enunciado. Usaremos un LOOP para ir iterando en el cursor.

DBMS_OUTPUT.PUT_LINE('El fisio con número: ' || pNumeroFisio || ' ha tenido cita con los siguientes clientes: ');
DBMS_OUTPUT.PUT_LINE('----------------------------------------------------------------------------------------------');
DBMS_OUTPUT.PUT_LINE('CLIENTES                        DNI           TELEFONO        FECHA                PRECIO     ');
DBMS_OUTPUT.PUT_LINE('----------------------------------------------------------------------------------------------');

WHILE clientesFisio%FOUND LOOP
  DBMS_OUTPUT.PUT_LINE(
      RPAD(rowCLientes.nombre, 10) || RPAD(rowCLientes.apellidos, 22) ||
      RPAD(rowClientes.dni, 14) || RPAD(rowClientes.telefono, 16) ||
      RPAD(TO_CHAR(rowClientes.fecha_hora, 'DD-MM-YYYY HH:MI'), 21) || rowClientes.precio|| '€' );

-- Extraemos la siguiente fila de la consulta

  fetch clientesFisio INTO rowCLientes;
END LOOP;

CLOSE clientesFisio;

EXCEPTION
    WHEN invalid_param THEN
      DBMS_OUTPUT.PUT_LINE('El identificador del fisioterapeuta debe ser una cadena de 5 caracteres, ejemplo: 00001');

END NumeroClientesFisio;

----------------------------------------------------------------------------------------------------------------------------

-- Con este procedimiento vamos a calcular cuantas citas ha tenido un cliente dado con fisioterapeutas, así como su coste total
-- y su coste final tras aplicar el descuento del cliente.

create or replace PROCEDURE CitasFisio(pDNI VARCHAR2)
AS
CURSOR cCitas IS
   SELECT cli.dni, cli.nombre, cli.apellidos, cli.descuento, ci.precio
   FROM cliente cli, cita ci
   WHERE ci.dni_cliente = pDNI AND ci.dni_cliente = cli.dni;

-- Creamos una excepción por si el DNI no se introduce con la longitud adecuada

invalid_param EXCEPTION;
PRAGMA exception_init(invalid_param, -404);

-- Creamos diferentes variables, entre ellas, para calcular el descuento y para acumular el precio total

cCitasRow cCitas%ROWTYPE;
precioTotal FLOAT := 0.0;
descuento FLOAT;

BEGIN
    
-- Si el DNI introducido no tiene el tamaño adecuado lanzamos una excepción.

if (LENGTH(pDNI) <> 9) THEN
    RAISE invalid_param;
END IF;

OPEN cCitas;
FETCH cCitas INTO cCitasRow;

-- Vamos a calcular el precio total sumando los precios de cada fila, es decir, de cada cita, además, nos sirver para avanzar en el cursor
-- y así usar despues %ROWCOUNT en él.

WHILE cCitas%FOUND LOOP
    precioTotal := precioTotal + cCitasRow.precio;
    FETCH cCitas INTO cCitasRow;
END LOOP;

-- Calculamos el descuento a aplicar

descuento := (cCitasRow.descuento * precioTotal) / 100;

-- Usaremos cCitas%ROWCOUNT para saber el número de citas que ha tenido el cliente en concreto

DBMS_OUTPUT.PUT_LINE('El DNI del clientes es: ' || pDNI);
DBMS_OUTPUT.PUT_LINE('El nombre del clientes es: ' || cCitasRow.nombre);
DBMS_OUTPUT.PUT_LINE('Los apellidos del cliente son: ' || cCitasRow.apellidos);
DBMS_OUTPUT.PUT_LINE('El numero total de citas es: ' || cCitas%ROWCOUNT);
DBMS_OUTPUT.PUT_LINE('El precio total de las citas es: '  || precioTotal);
DBMS_OUTPUT.PUT_LINE('El descuento es: ' || cCitasRow.descuento || '%');
DBMS_OUTPUT.PUT_LINE('El precio final es: ' || (precioTotal - descuento));

CLOSE cCitas;

-- Procesamos la excepción invalid_param si se ha lanzado y mostramos un mensaje de ayuda

EXCEPTION
   WHEN invalid_param THEN
           DBMS_OUTPUT.PUT_LINE('El DNI del cliente debe ser una cadena de 9 caracteres, ejemplo: 75192847W');
     
END CitasFisio;

----------------------------------------------------------------------------------------------------------------------------------

-- Función que devuelve el número de profesores de pilates diferentes que imparten clases en una sala dada.

create or replace FUNCTION NumeroProfesoresSala(vCodigoSala VARCHAR2) RETURN NUMBER IS nProfesores NUMBER;

-- Para devolver el número de profesores que imparten clase en una sala, solo tenemos que hacer una consulta
-- usando COUNT y DISTINCT y guardar el resultado en la variable nProfesores.

BEGIN
  SELECT count(DISTINCT numero_trabajador_pilates) INTO nProfesores
  FROM imparte
  WHERE codigo_sala = vCodigoSala;

  RETURN nProfesores;

END NumeroProfesoresSala;

-------------------------------------------------------------------------------------------------------------------------------------

-- Disparador que actualiza el stock de un producto cuando se realiza una venta de éste.

create or replace TRIGGER actualizaStock BEFORE INSERT ON venden FOR EACH ROW

DECLARE
   stockTotal NUMBER;
   stockMIN NUMBER;
   stockActualizado NUMBER;
   nombreProducto VARCHAR(60);

BEGIN
    SELECT stock, stock_minimo, nombre INTO stockTotal, stockMin, nombreProducto FROM productos WHERE id = :NEW.id_producto;

 -- Calculamos el stock que quedará despues de la venta.
  
    stockActualizado := stockTotal - :NEW.cantidad;

 -- Aunque esto debería hacerse en otro lado, si se intenta vender más procuctos de los que hay se lanza un error de aplicación.
 -- Lo ideal hubiera sido hacer un ROLLBACK, pero no se pueden hacer dentro de los triggers, así que no he encontrado otra forma de prevenir la transacción.
 -- Si hay una mejor forma de hacer esto desde un triggers, agradecería mucho una aclaración en la corrección de la tarea. :)

 -- Si el stock despues de la venta es menor que 0, se lanza un error de aplicación.
 -- En caso de que el stock quede por debajo del mínimo, se lanza un mensaje de aviso.
 -- En caso contrario, se informa solo de que se esta insertando la fila.

     IF (stockActualizado < 0) THEN
       raise_application_error(-20000, 'No se pueden vender más productos de los que hay en stock.');
    ELSIF ((stockActualizado >= 0) AND (stockActualizado < stockMIN)) THEN
       DBMS_OUTPUT.PUT_LINE('AVISO: El stock esta por debajo del stock mínimo (stock mínimo: ' || stockMIN ||')');
       DBMS_OUTPUT.PUT_LINE('Insertando fila...');
    ELSE
       DBMS_OUTPUT.PUT_LINE('Insertando fila...');
    END IF;

 -- Se actualiza la tabla productos con la nueva cantidad del producto vendido.

    UPDATE productos SET stock = stockActualizado WHERE id = :NEW.id_producto;

END actualizaStock;
