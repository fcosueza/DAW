package pruebas;

/**
 * Programa de pruebas de la jerarquía de clases <code>Mueble</code>.
 */
public class Prueba01 {
    
    /**
    * Método principal (main).
    * @param args argumentos de consola
    */
    public static void main(String[] args) {

        //----------------------------------------------
        //           PRUEBA DE MUEBLES
        //----------------------------------------------
        System.out.println("--------------------------");
        System.out.println("1. PRUEBA DE CONSTRUCTORES");
        System.out.println("--------------------------");
        System.out.println();

        // Prueba de constructores con errores
        Utilidades.PruebaConstructoresError();        
        System.out.println();
        
        // Generamos productos de prueba
        Utilidades.generarArrayMuebles();
        System.out.println();
    }

}
