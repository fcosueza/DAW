<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" version="5.0" encoding="UTF-8" indent="yes" />
    <xsl:template match="/">
        <html>
            <head>
                <title>Tarea 5 - LMSGI - Curso 2022-23</title>
                <style>
                    table, th, td {
                    width:500px;
                    margin: 0 auto;
                    text-align: center;
                    border: 1px solid black;
                    border-collapse: collapse;
                    }
                    th {
                    color: white;
                    background-color:grey;
                    }
                    .urgente {
                    color: red;
                    background-color:yellow;
                    }
                    .nocturno {
                    color: white;
                    background-color:black;
                    }
                </style>
            </head>
            <body>
                <header>
                    <h2>Lenguaje de Marcas y Sistemas de Gestión de Información</h2>
                    <h2>Tarea 5: XPath y XSLT</h2>
                    <h2>Autor/a: Francisco Javier Sueza Rodríguez</h2>
                </header>
                <h3>A. Lista ordenada por precio y apellido de los envíos a Sevilla. 
                    Indicar el número de orden (con número), el precio, la moneda, el 
                    apellido y el nombre. El orden será de mayor a menor precio y si 
                    tienen el mismo precio por orden alfabético de apellido. </h3>
                <h5>Formato:<br/>
                    1) 33 euros - Sánchez, Carlos.</h5>
                <br/>
                <br/>
                
                <!-- AÑADIR AQUÍ EL CÓDIGO DEL EJERCICIO -->
                
                <h3>Solución:</h3>
                
                <!-- Se ha realizado un bucle xsl:for-each con 2 sorts dentro,
                     uno para el precio y otro para el apellido. A continuación
                     se han mostrado cada resultado dentro de un elemento de tipo parrafo
                     con los datos pedidos, usando para ellos xsl:value-of -->
                
                <xsl:for-each select="//envio[provincia='Sevilla']">     
                    <xsl:sort select="precio" data-type="number" order="descending" />
                    <xsl:sort select="apellido" />
                    <xsl:element name="p">
                        <xsl:value-of select="position()" />) 
                        <xsl:value-of select="precio" /> euros - 
                        <xsl:value-of select="apellido"/>,
                        <xsl:value-of select="nombre" />
                     </xsl:element>
                </xsl:for-each>
                
                <h3>B. Número de envíos urgentes a Cádiz y su porcentaje respecto al 
                    total de envíos a Cádiz</h3>
                <h5>Formato:<br/>
                    Hay 4 envíos urgentes a Cádiz, que suponen el 28.57% 
                    de los 14 envíos totales registrados a Cádiz.</h5>
                <br/>
                <br/>
                
                <!-- AÑADIR AQUÍ EL CÓDIGO DEL EJERCICIO -->
                
                <h3>Solución:</h3>
                
                <!-- Para resolver este ejercicios se han usado, en primer lugar, 3 variables. Una para almacenar
                     el nombre de la provincia, otra para el número de envios totales y otra para los envíos urgentes.
                     De esta forma, si quisieramos obtener la información de otra provincia, por ejemplo Sevilla, 
                     solo tendriamos que cambiar el valor de la variable $prov. En las variables 
                     $env_totales y $env_urg se ha usado count con el predicado adecuado para obtener el número 
                     total de envíos en cada caso.

                     A tontinuación se ha creado un elemento de tipo <p> mediante xsl:element y dentro 
                     se han usado diferentes instrucciones de tipo xsl:value of para mostrar la información 
                     requerida. Cabe mencionar el caso del procentaje, donde se ha usado en el select la 
                     función format-number para dar un formato adecuado a la salida del cálculo del porcentaje. 
                -->
                
                <xsl:variable name="prov" data-type="text" select="'Cádiz'" />
                <xsl:variable name="env_urg" select="count(//envio[provincia=$prov and prioridad='Urgente'])" />
                <xsl:variable name="env_total" select="count(//envio[provincia=$prov])" />
               
                <xsl:element name="p">
                    Hay <xsl:value-of select="$env_urg" /> envíos urgentes a <xsl:value-of select="$prov" />, 
                    que supone el  <xsl:value-of select="format-number(($env_urg div $env_total) * 100, '#.##')" />% 
                    del los <xsl:value-of select="$env_total" /> envíos totales registrados a 
                    <xsl:value-of select="$prov" />.
                </xsl:element>
                
                <h3>C. Lista ordenada (por código de envío) con el tipo de prioridad, 
                    la provincia, el nombre y el apellido de todos los envío cuyo nombre 
                    comience por 'A' y tengan una prioridad 'Normal', o 
                    su apellido contenga una 'a' y la provincia sea 'Almería' o 'Granada'.
                </h3>
                <h5>Formato:<br/>
                    1.- (DBD72R - 24_horas - Granada). Carlos Cano.</h5>
                <br/>
                <br/>
                
                <!-- AÑADIR AQUÍ EL CÓDIGO DEL EJERCICIO -->
                
                <h3>D. Lista de todas las provincias (ordenadas alfabeticamente) con su 
                    número de envíos, ingresos totales (suma de todos sus precios) e 
                    ingreso medio</h3>
                <h5>Formato:<br/>
                    Almería: 11 envíos. Ingresos totales: 229 euros. 
                    Ingreso medio: 20.82 euros.</h5>
                <br/>
                <br/>
                
                <!-- AÑADIR AQUÍ EL CÓDIGO DEL EJERCICIO -->
                
                <h3>E. Crear una tabla, ordenada por fecha de entrega, de los envíos a 
                    Almería. La tabla incluirá las columnas: fecha de entrega, provincia, 
                    código de envío y prioridad. Estilos: La tabla deberá usar los estilos 
                    definidos en la plantilla que se proporciona en el ejercicio. Los 
                    elementos tabla y las celdas usarán los estilos de los selectores 
                    'table','th' y 'td'. La cabecera usará el estilo del selector 'th'. 
                    Si la prioridad de un envío es 'Urgente' esa celda usará el estilo del 
                    selector '.urgente'. Si la prioridad de un envío es 'Nocturno' esa 
                    celda usará el estilo del selector '.nocturno'.</h3>
                <h5>Formato:</h5>
                <table>
                    <tr>
                        <th>Fecha</th>
                        <th>Provincia</th>
                        <th>Código de envío</th>
                        <th>Prioridad</th>
                    </tr>
                    <tr>
                        <td>2023-02-??</td>
                        <td>Almería</td>
                        <td>??????</td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td>2023-02-??</td>
                        <td>Almería</td>
                        <td>??????</td>
                        <td class="urgente">Urgente</td>
                    </tr>
                    <tr>
                        <td>2023-02-??</td>
                        <td>Almería</td>
                        <td>??????</td>
                        <td class="nocturno">Nocturno</td>
                    </tr>
                </table>
                <br/>
                <br/>
                
                <!-- AÑADIR AQUÍ EL CÓDIGO DEL EJERCICIO -->
                
                
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>