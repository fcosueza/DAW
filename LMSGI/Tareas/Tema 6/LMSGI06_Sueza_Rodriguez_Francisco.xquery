(:
  Declaración de Funciones locales
:)

(:
  Función que extrae el atributo cod de un vehículo dada su marca
:)

declare function local:getCod($marca as xs:string) as attribute()* {
  for $x in doc("llegaya.xml")//vehiculo where $marca = $x/marca
    return $x/@cod
};

(:
  Función que calcula el descuento para empleados
:)

declare function local:discount($precio as xs:integer, $descuento as xs:integer) as xs:integer {
  let $discount := ($precio * $descuento) div 100
  return ($precio - $discount) 
};


(: Ejercicio 1 :)
(: Obtener la marca, modelo y precio de los vehiculos comerciales que le cuesten a la empresa menos de 100.000 €, ordenados desde el más caro al más barato.
Estructura: 
<vehiculo>
   <marca>Marca</marca>
   <modelo>Modelo</modelo>
   <precio moneda="EUR">XXX</precio>
</vehiculo>
:)

for $a in doc("llegaya.xml")//vehiculo where $a/precio < 100000 order by $a/precio 
  return <vehiculo>{$a/marca, $a/modelo, $a/precio}</vehiculo>

,
(: Ejercicio 2 :)
(: Obtener el nif, zona de reparto, nombre, teléfono y salario (en ese orden) de los repartidores que han realizado más 5 repartos con un vehículos de la marca "Tesla" en el 2023. (No sabemos su código, sólo la marca del vehiculo).
Resultado: 
<repartidor nif="23234234B" zona="D">
   <nombre>Víctor</nombre>
   <telefono>607624122</telefono>
   <salario unidad="Euros">1100</salario>
</repartidor>
:)

for $b in doc("llegaya.xml")//repartidor 
  for $c in root($b)//reparto
     where 
      $b/@nif eq $c/@repartidor and 
      $c/@vehiculo = local:getCod("Tesla") and
      $c > 5 and
      ends-with($c/@fechareparto, "2023") 
     return
       <repartidor nif="{$b/@nif}" zona="{$b/@zona}">{
         $b/nombre, 
         $b/telefono,
         $b/salario
       }</repartidor>
,
(: Ejercicio 3 :)
(: Obtener (usando let) el número total de vehículos comerciales que tiene llegaya, el coste total de adquisición y el precio del vehículo más caro.
Estructura:
<totales>
   <flota_vehiculos>X</flota_vehiculos>
   <coste_total moneda="EUR">XXX</coste_total>
   <mas_caro moneda="EUR">XXX</mas_caro>
</totales>
:)

let $d := doc("llegaya.xml")//vehiculos/vehiculo 
  return 
    <totales>
      <flota_vehiculos>{count($d)}</flota_vehiculos>
      <coste_total moneda="{distinct-values($d/precio/@moneda)}">
        {sum($d/precio)}
      </coste_total>
      <mas_caro moneda="{distinct-values($d/precio/@moneda)}">
        {max($d/precio)}
      </mas_caro>
    </totales>
,
(: Ejercicio 4 :)
(: Obtener, usando let, la suma de los salarios de los repartidores que cobran menos de 1.000 €, que viven en la provincia de Sevilla (excepto los que viven en la capital) y además no tienen zona A. 
Estructura:
<total_salarios moneda="EUR">XXX</total_salarios>
:) 

let $e := doc("llegaya.xml")//repartidor[
  provincia = "Sevilla" and
  localidad != "Sevilla" and
  salario < 1000 and
  @zona != "A"
] 
  return 
    <total_salario moneda="{distinct-values($e/salario/@unidad)}">
      {sum($e/salario)}
    </total_salario>
,
(: Ejercicio 5 :)
(: Obtener el nombre del cliente, los paquetes que incluye esa entrega, el coste de la entrega y el precio con un descuento del 50% para empleados. Ordenar por el nombre del cliente desde el nombre más corto hasta el más largo.
Estructura:
<entrega>
   <nombre>Nombre</nombre>
   <paquetes>XX</paquetes>
   <importe moneda="EUR">XX</importe>
   <importe_empleados moneda="EUR">XX</importe_empleados>
</entrega>
:)


for $f in doc("llegaya.xml")//entrega order by string-length($f/nombre)
  return
    <entrega>
      {$f/nombre,
      $f/paquetes,
      $f/importe,
      <importe_empleados moneda="{distinct-values($f/importe/@moneda)}">
        {local:discount($f/importe, 50)}
      </importe_empleados>
    }
    </entrega>