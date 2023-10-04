package tarea01;

import java.util.Scanner; 

/**
 * 
 * Ejercicio 1.
 * 
 * Esta clase se encarga de calcular el volumen de un cilindro cuyo radio y 
 * altura serán introducidos por el usuario. Para ello, se usará la formula
 * del volumen del cilindro que es PI x r^2 x h
 * 
 * @author Francisco Sueza Rodríguez
 */

public class Ejercicio1 {
    
    public static void main(String[] args) {
        
    //----------------------------------------------
    //    Declaración de variables y constantes
    //----------------------------------------------

    // Constantes
    final double PI = 3.1415927;

    // Variables de entrada
    double radio, altura; // Variables con el radio y la altura del ciclindro.

    // Variables de salida 
    double volumen;       // Variable que almacena el volumen del cilindro

    // Clase Scanner para petición de datos al usuario a través del teclado
    Scanner teclado = new Scanner (System.in);
        
    //----------------------------------------------
    //               Entrada de datos 
    //----------------------------------------------
    
    System.out.println("Ejercicio 1: Calcula el  volumen de un cilindro");
    System.out.println("-----------------------------------------------");
    
    // Pedimos al usuario que introduzca tanto el radio como la altura..
    
    System.out.println("Introduce el radio del cilindro: ");
    radio = teclado.nextDouble();
    
    System.out.println("Introduce la altura del cilindro: ");
    altura = teclado.nextDouble();
       
    //----------------------------------------------
    //                 Procesamiento 
    //----------------------------------------------
    
    /* Calculamos el volumen usando la formula PI * radio² * altura.
     * Como aun no hemos visto las clases que ofrece Java para ciertas operaciones
     * matemáticas, no se va a usar el método pow() de la clase Math, sino que 
     * vamos a realizar el cuadrado caculando radio * radio.
     */
    
    volumen = PI * (radio*radio) * altura; 
    
    //----------------------------------------------
    //              Salida de resultados 
    //----------------------------------------------
    
    
    /* Mostramos el resultado con el volumen del cilindro calculado, la precisión
     * es mayor en el resultado que en los casos de uso, pero como aún no hemos visto
     * como ajustarla no se va a cambiar.
     */
        
    System.out.println();
    System.out.println("RESULTADO");
    System.out.println("---------");
    System.out.printf("El volumen del cilindro de radio %.2f y altura %.2f es: %.2f", radio, altura, volumen);
   
    System.out.println();
    System.out.println("Fin del programa");

    }  
}
