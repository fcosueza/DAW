package tarea03;

import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import libtarea3.Teatro;

/**
 * Ejercicio 1: Trabajo con teatros
 *
 * Ejercicio 1 de la tarea 3 de Programación, donde vamos a trabajar con objetos
 * de la clase Teatro y a realizar diferentes acciones para aprender el uso de
 * objetos y sus métodos.
 *
 * @author Francisco Javier Sueza Rodríguez
 * @author Profe
 */
public class Ejercicio01 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables
        //----------------------------------------------
        // 1.2. Declaración de constante para dar formato de fecha hora
        final String FORMATO_FECHA = "dd/MM/yy";
        final String FORMATO_HORA = "HH:mm:ss";

        // 1.1. Declaración de tres variables referencia a objetos instancia de la clase Teatro
        Teatro teatro1, teatro2, teatro3;

        //----------------------------------------------
        //              Presentación
        //----------------------------------------------
        System.out.println("TRABAJO CON TEATROS");
        System.out.println("--------------------");
        System.out.println();

        //----------------------------------------------
        //               Análisis inicial
        //----------------------------------------------
        // 2. Consulta de valores iniciales
        System.out.println("1.-CONSULTA INICIAL DE VALORES GLOBALES");
        System.out.println("---------------------------------------");
        System.out.println();

        // 2.1. Número de teatros creados hasta el momento
        System.out.printf("Número de Teatros creados hasta el momento: %d.\n", Teatro.getTeatrosTotales());

        // 2.2. Número de obras que se están represenando en este momento en todos los teatros
        System.out.printf("Número de obras que se están representando en este momento: %d\n", Teatro.getObrasActivas());

        //2.3. Número de entradas vendidas en todos los teatros y para todas las obras que se han representado hasta el momento
        System.out.printf("Número de entradas vendidas hasta el momento: %d\n", Teatro.getEntradasVendidasTotales());

        //----------------------------------------------
        //                Entrada de datos
        //----------------------------------------------
        // En realidad no hay entrada de datos como tal dado que la información
        // de entrada es fija y siempre la misma
        System.out.println("\n2.-CREACIÓN Y USO DE TEATROS");
        System.out.println("------------------------------\n");

        // 3.- Instanciación de tres objetos Teatro
        System.out.println("Creación de teatros (constructores)");
        System.out.println("-------------------------------------");

        // 3.1.- Intento de crear un teatro con un aforo inferior (hay que gestionar la posible excepción
        System.out.printf("Intentado crear un teatro con una aforo inferior...\n");

        try {
            teatro1 = new Teatro("Isabel la Católica", 200);

        } catch (IllegalArgumentException ex) {
            System.out.printf("Error: %s\n\n", ex.getMessage());
        }

        // 3.2.- Intento de crear un teatro con un aforo superior (hay que gestionar la posible excepción)
        System.out.printf("Intentado crear un teatro con una aforo superior...\n");

        try {
            teatro2 = new Teatro("Isabel la Católica", 2000);

        } catch (IllegalArgumentException ex) {
            System.out.printf("Error: %s\n\n", ex.getMessage());
        }

        // 3.3.- Intento de crear un teatro con un nombre de teatro vacío y aforo por defecto
        System.out.printf("Intentado crear un teatro con nombre vacío y aforo por defecto...\n");

        try {
            teatro3 = new Teatro("");

        } catch (IllegalArgumentException ex) {
            System.out.printf("Error: %s\n\n", ex.getMessage());
        }

        // 3.4.- Creación de un primer teatro usando el constructor de dos parámetros
        System.out.printf("Creando teatro con aforo válido con un constructor de dos parametros...\n");
        teatro1 = new Teatro("Isabel la Católica", 900);
        System.out.printf("Teatro 1 creado: %s\n\n", teatro1.toString());

        // 3.5.- Creación de un segundo teatro con un aforo por defecto usando el constructor de un parámetro
        System.out.printf("Creando teatro con aforo por defecto usando constructor con un parametro...\n");
        teatro2 = new Teatro("Lope de Vega");
        System.out.printf("Teatro 2 creado: %s\n\n", teatro2.toString());

        // 3.6.- Creación de un tercer teatro usando el constructor sin parámetros
        System.out.printf("Creando teatro con el contructor sin parametros...\n");
        teatro3 = new Teatro();
        System.out.printf("Teatro 3 creado: %s\n\n", teatro3.toString());

        //----------------------------------------------
        //       Procesamiento + Salida de Resultados
        //----------------------------------------------
        // Dado que se va a ir mostrando información de salida a la vez que
        // se van realizando operaciones, podemos considerar en este caso
        // que el procesamiento y la salida de resultado van unidos y "mezclados"
        // 4.- Operaciones con teatros
        System.out.println("Manipulación de teatros (métodos)");
        System.out.println("-----------------------------------");

        // 4.1.- Intento de terminar de representar una obra a un teatro que no tiene obra asignada (debemos capturar el error)
        System.out.printf("Terminando de presentar una obra en el primer teatro...\n");

        try {
            teatro1.terminarObra();
        } catch (IllegalStateException ex) {
            System.out.printf("Error: %s \n\n", ex.getMessage());
        }

        //4.2.- Asignamos una obra al teatro1 y lo llenamos (debemos comprobar antes si podemos asignarla)
        System.out.printf("Asignando una obra de teatro...\n");

        if (teatro1.getObra() == null) {
            teatro1.asignarObra("Macbeth");
            teatro1.llenarTeatro();
        }

        System.out.printf("Se ha asignado la obra de teatro '%s' al teatro '%s' \n", teatro1.getObra(), teatro1.getNombreTeatro());

        if (teatro1.getEntradasVendidas() == teatro1.getAforo()) {
            System.out.printf("Teatro lleno. Se han vendido %d entradas. \n\n", teatro1.getEntradasVendidas());
        }

        //4.3.- Devolvemos 50 entradas del teatro1 (puesto que acabamos de llenar el teatro, no es necesario comprobar si podemos devolver entradas)
        teatro1.devolverEntradas(50);

        //4.4.- Intentamos traspasar la representación de la obra del teatro1 al teatro2 (hay que gestionar la posible excepción)
        System.out.printf("Intentado traspasar una obra de teatro a otro...\n");

        try {
            teatro1.traspasarObra(teatro2);
        } catch (IllegalStateException ex) {
            System.out.printf("Error: %s \n\n", ex.getMessage());
        }

        //4.5.- Devolvemos otras 50 entradas del teatro1 (no es necesario comprobar si podemos devolver entradas)
        teatro1.devolverEntradas(50);

        //4.6.- Volvemos a intentar traspasar la obra del teatro1 al teatro2 (ahora no debe dar excepción)
        try {
            teatro1.traspasarObra(teatro2);
        } catch (IllegalStateException ex) {
            System.out.printf("Error: %s \n\n", ex.getMessage());
        } finally {
            System.out.printf("Traspaso realizado con éxito \n\n");

        }

        //4.7.- Devolver una entrada del teatro2
        teatro2.devolverEntrada();

        //5.- Obtención de información del segundo teatro creado
        System.out.println("\nPrueba de los getters del segundo teatro creado:");
        System.out.println("----------------------------------------------------");

        LocalDateTime fecha = LocalDateTime.now();

        DateTimeFormatter formatoFecha = DateTimeFormatter.ofPattern(FORMATO_FECHA);
        DateTimeFormatter formatoHora = DateTimeFormatter.ofPattern(FORMATO_HORA);

        System.out.printf("\nLa fecha de realización de la prueba es: %s %s \n\n", fecha.format(formatoFecha), fecha.format(formatoHora));

        System.out.printf("Teatro 2\n");
        System.out.printf("\t Código de Teatro: %s  Nombre de Teatro: %s \n", teatro2.getCodigoTeatro(), teatro2.getNombreTeatro());
        System.out.printf("\t Aforo: %d \n", teatro2.getAforo());
        System.out.printf("\t Estado: \n");
        System.out.printf("\t\t Se esta representando la obra: \"%s\"\n", teatro2.tieneObra() ? teatro2.getObra() : "No se esta representado ninguna obra. \n");
        System.out.printf("\t\t Entradas vendidas: %d \n\n", teatro2.getEntradasVendidas());

        //----------------------------------------------
        //               Análisis Final
        //----------------------------------------------
        // 6. Consulta de valores finales
        System.out.println("3.-CONSULTA FINAL DE VALORES GLOBALES");
        System.out.println("-------------------------------------");
        System.out.println();

        // 6.1. Número de teatros creados hasta el momento
        System.out.printf("Número de Teatros creados hasta el momento: %d.\n", Teatro.getTeatrosTotales());

        // 6.2. Número de obras que se están represenando en este momento en todos los teatros
        System.out.printf("Número de obras que se están representando en este momento: %d\n", Teatro.getObrasActivas());

        //6.3. Número de entradas vendidas en todos los teatros y para todas las obras que se han representado hasta el momento
        System.out.printf("Número de entradas vendidas hasta el momento: %d\n", Teatro.getEntradasVendidasTotales());

    }

}
