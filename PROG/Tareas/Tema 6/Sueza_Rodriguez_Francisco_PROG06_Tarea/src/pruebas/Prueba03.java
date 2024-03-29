package pruebas;

import mobiliario.Mueble;

/**
 * Programa de pruebas de la jearquía de clases <code>Mueble</code>.
 */
public class Prueba03 {

    /**
    * Método principal (main).
    * @param args argumentos de consola
    */
    public static void main(String[] args) {

        //----------------------------------------------
        //           PRUEBA DE MUEBLES
        //----------------------------------------------
        System.out.println("-----------------------------");
        System.out.println("3. PRUEBA DEL MÉTODO TOSTRING");
        System.out.println("-----------------------------");
        System.out.println();

        // Generamos muebles de prueba
        System.out.println("Creando muebles...");
        Mueble[] listaMuebles = Utilidades.generarArrayMuebles();
        System.out.println();

        // Mostramos los muebles creados usando toString
        System.out.println("Probando toString de los muebles creados");
        System.out.println("----------------------------------------");
        Utilidades.mostrarContenidoArrayMuebles(listaMuebles);
        System.out.println();
    }

}
