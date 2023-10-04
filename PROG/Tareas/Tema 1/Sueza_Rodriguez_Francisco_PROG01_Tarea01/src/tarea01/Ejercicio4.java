package tarea01;

import java.util.Scanner; 

/**
 * 
 * Ejercicio 4.
 * 
 * En este ejercicio vamos a realizar la gestión de un embalse. Este tendrá una capacidad
 * fija de 2000 hm³. El usuario deberá introducir la cantidad de agua embalsada. Con esta
 * cantidad se calculará cuando hm³ se necesitan para que se llene el embalse completamente
 * así como el porcentaje de agua embalsada. 
 * 
 * Si el porcentaje de agua embalsada es superior al 95% se deberá liberar una cantidad
 * igual al 10% de agua embalsada. Informando en este caso también al usuario del agua
 * liberada.
 * 
 * @author Francisco Sueza Rodríguez.
 */

public class Ejercicio4 {
    
    public static void main(String[] args) {
        
    //----------------------------------------------
    //    Declaración de variables y constantes
    //----------------------------------------------

        // Constantes 
               
        /*
         * Se van a declarar como constantes tanto el volumen total del embalse
         * como el porcentaje maximo permitido y el porcentaje a desembalsar. De 
         * esta forma, si queremos que el programa funcione con otros embalses de 
         * diferente capacidad o variar los porcentajes máximo y de desembalse solo
         * necesitamos modificar estas constantes.
         *
         * Se han definido de tipo double por si quisieramos introducir valores reales
         */
        
        final double CAPACIDAD_MAXIMA = 2000; 
        final double PORCENTAJE_MAXIMO = 95.0;
        final double PORCENTAJE_DESEMBALSE = 10.0;
        
        // Variables de entrada 
        
        double volumenActual;
        
        // Variables de salida 
        
        double volumenFinal, volumenVaciado;
        double porcentajeActual, porcentajeFinal;
        
        String mensajeResultado;
        
        // Variables auxiliares
        
        boolean necesitaDesembalsar; // Variable para saber si hay que desembalsar agua o no
        
        // Clase Scanner para petición de datos al usuario a través del teclado
        Scanner teclado = new Scanner (System.in);
        
    //----------------------------------------------
    //               Entrada de datos 
    //----------------------------------------------
    
        System.out.println("Ejercicio 4: Gestión de recursos hídricos");
        System.out.println("-----------------------------------------------");

        // Pedimos al usuario el volumen del embalse 

        System.out.println("Introduce el volumen actual de agua almacenada en el embalse (hectometros cúbicos): ");
        volumenActual = teclado.nextInt();

        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------

        // Lo primero es calcular el porcentaje actual y mostrar el estado del embalse

        porcentajeActual = (volumenActual / CAPACIDAD_MAXIMA) * 100;

        System.out.println();
        System.out.println("Faltan " + (CAPACIDAD_MAXIMA - volumenActual) + " hectométros cúbicos para llenar el embalse.");
        System.out.printf("El embalse esta a un %.2f%% de su capacidad máxima.\n", porcentajeActual);

        // Comprobamos si hay que desembalsar o no

        necesitaDesembalsar = porcentajeActual > PORCENTAJE_MAXIMO;

        /* 
          * Si hay que desembalsar agua, calculamos el volumen a vaciar y el volumen y porcentaje finales.
          * Usando el operador ternario vamos a tener que repetir 3 veces la misma comprobación, que podría
          * omitirse usando una estructura if-then-else, pero que aún no hemos visto en el curso.
          */

        volumenVaciado = necesitaDesembalsar ? (volumenActual * PORCENTAJE_DESEMBALSE) / 100 : 0;
        volumenFinal = necesitaDesembalsar ? volumenActual - volumenVaciado : volumenActual;
        porcentajeFinal = necesitaDesembalsar ? (volumenFinal / CAPACIDAD_MAXIMA) * 100 : volumenActual;

        // Ahora calculamos el mensaje final que será uno u otro según si se ha desembalsado agua o no.

        mensajeResultado = 
                  necesitaDesembalsar ? 
                  "Se ha realizado una liberación del " + PORCENTAJE_DESEMBALSE + "% vaciando un total de " + volumenVaciado + " hectómetros cúbicos. \n" +
                  "En el embalse quedán ahora " + volumenFinal + " hectómetros cúbicos, que representan un " + porcentajeFinal + "% de su capacidad máxima" :
                  "No es necesario considera la liberación de agua controlada";



        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------

        System.out.println();
        System.out.println("RESULTADO");
        System.out.println("----------");
        System.out.println(mensajeResultado);

        System.out.println();
        System.out.println("Fin del programa");
    }
    
}

