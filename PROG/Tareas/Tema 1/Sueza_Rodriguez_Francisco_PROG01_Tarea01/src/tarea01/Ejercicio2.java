package tarea01;

import java.util.Scanner; 

/**
 * 
 * Ejercicio 2. 
 * 
 * En este ejercicio vamos a pedirle 3 numeros enteros al usuario y a realizar diferentes
 * operaciones aritméticas y relacionales, siendo estas las siguientes:
 * 
 * - el tercio del primer número más la mitad del tercero
 * - el cuadrado de la mitad de la suma del segundo número más el tercero
 * - si el triple de la suma del segundo más el tercero menos el primero es par
 * - las suma del primero más el segundo, multiplicado por la diferencia del tercero
 *   menos el primero y todo ello partido por el segundo número
 * 
 * @author Francisco Sueza Rodríguez
 */

public class Ejercicio2 {
    
    public static void main(String[] args) {
        
    //----------------------------------------------
    //    Declaración de variables y constantes
    //----------------------------------------------
        
    // Variables de entrada 

    int primerNumero, segundoNumero, tercerNumero;

    // Variables de salida 

    double tercio;    // variable que almacena el resultado de la primera operación
    double cuadrado;  // variable que almacena el resultado de la segunda operación
    boolean par;      // variable que almacena el resultado de la tercera operación
    double suma;      // variable que almacena el resultado de la última operación
    
    // Variables auxiliares
    
    double resultadoIntermedio; // variable auxiliar para guardar resultados intermedios de las operaciones

    // Clase Scanner para petición de datos al usuario a través del teclado
    Scanner teclado = new Scanner (System.in);
        
    //----------------------------------------------
    //               Entrada de datos 
    //----------------------------------------------
    
    System.out.println("Ejercicio 2: Operaciones Aritméticas");
    System.out.println("-----------------------------------------------");
    
    // Pedimos al usuario que introduzca tanto el radio como la altura..
    
    System.out.println("Introduce el valor del primer numero: ");
    primerNumero = teclado.nextInt();
    
    System.out.println("Introduce el valor del segundo numero: ");
    segundoNumero = teclado.nextInt();
    
    System.out.println("Introduce el valor del tercer numero: ");
    tercerNumero = teclado.nextInt();
    
    //----------------------------------------------
    //                 Procesamiento 
    //----------------------------------------------
    
    /* En las operaciones que podamos, no se va a realizar un casting, sino 
     * que se va a utilizar alguno de los operandos del tipo que queremos
     * para que se haga la conversión implicitamente. 
     */
    
    // Calulamos la primera operación
    
    tercio = (primerNumero / 3.0) + (tercerNumero / 2.0);
    
    /* Para la seunda operación primero calculamos la mitad de la suma y despues el cuadrado
     * para no repetir código, haciendo uso de la variable resultado intermedio.
     */ 
    
    resultadoIntermedio = (segundoNumero + tercerNumero) / 2.0;
    cuadrado = resultadoIntermedio * resultadoIntermedio;
    
    // Realizamos la tercera operación, haciendo uso también de la variable resultadoIntermedio,
       
    resultadoIntermedio = (segundoNumero + tercerNumero - primerNumero) * 3.0;
    par = (resultadoIntermedio % 2.0) == 0.0;
    
    // Realizamos la última operación, donde si vamos a realizar un casting, ya que todos los operandos son enteros
    
    resultadoIntermedio = (primerNumero + segundoNumero) * (tercerNumero - primerNumero);
    suma = (double) (resultadoIntermedio / segundoNumero);
    
    
    //----------------------------------------------
    //              Salida de resultados 
    //----------------------------------------------
    System.out.println();
    System.out.println("RESULTADO");
    System.out.println("---------");
    System.out.println("Valor del tercio del primer número más la mitad del tercer número: " + tercio);
    System.out.println("Valor del cuadrado de la mitad de la suma del segundo número más el tercer número: " + cuadrado);
    System.out.println("Comprobamos si el triple de la suma del segundo más el tercero menos el primero es par: " + par);
    System.out.println("Valor de la suma del primero más el segundo, multiplicado por la diferencia del tercero y el primero y todo ellos partido por el segundo: " + suma);
    
    System.out.println();
    System.out.println("Fin del programa");
    }
    
}

