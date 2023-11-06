package tarea02;

import java.util.Random;

/**
 *
 * @author luisnavarro
 */
public class Ejercicio04 {

    public static void main(String[] args) {
        //----------------------------------------------
        //               Declaración de variables
        //----------------------------------------------
        // Variables de entrada (aquí se definen las variables que recibirán valores, si fueran necesarias)
        
        // Variables de salida (aquí se definen las variables que almacenarán resultados y se mostrarán al usuario, si fueran necesarias)

        /* La clase Random es una clase de Java que nos sirve para generar elementos aleatorios
            en este caso el objeto "r", consigue a través de su método nextInt(número), generar
            un número aleatorio entero entre 0 y número-1, por ejemplo r.nextInt(5), generará 
            un número entero entre 0 y 4, es decir, podrá devolver 0,1,2,3 o 4 cada vez que se 
            utilice.
         */

        Random r = new Random();
        //----------------------------------------------
        //              Entrada de datos
        //----------------------------------------------
        // En este caso no hay entrada de datos. 
        System.out.println("Ejercicio 4. Simulador de Máquina Tragaperras.");
        System.out.println("----------------------------------------------------"); 
        
        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------

        // Hemos de generar una secuencia de 3 frutas
        // Las frutas son: Plátano, Fresa, Manzana, Naranja, Cerezas 
        // Representamos cada fruta con un caracter: P,F,M.N,C
        // Para elegir una de las cinco frutas podemos asociar cada una con un número
        // Para ello podemos generar un número aleatorio 

        //El proceso debe hacerse hasta que se obtengan 3 iguales, cosa que suponemos que se producirá en x intentos. Hemos de llevar la cuenta de los intentos.
        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        //Además de los intentos en los que se ha obtenido el premio, hay que decir qué premio hemos tenido de entre los posibles.
    }
}
