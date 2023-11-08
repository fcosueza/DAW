/**
 * 
 * Ejercicio 0. Crear los paquetes sobre el proyecto base. (indicar aquí el título de cada ejercicio)
 * Este ejemplo muestra mediante un ejemplo muy sencillo la estructura básica de un programa en Java
 * Debes crear el resto de clases Java para almacenar los distintos ejercicios de esta tarea
 * 
 * @author (indicar aquí el autor del ejercicio)
 */
package tarea01;

import java.util.Scanner; // importación de un paquete externo para poder utilizar la clase Scanner

public class Ejercicio0 {

    public static void main(String[] args) {

    //----------------------------------------------
    //    Declaración de variables y constantes
    //----------------------------------------------

        // Constantes 
        
        // Variables de entrada 
        String nombre;
        int edadActual;
        
        // Variables de salida 
        String textoResultado;
        
        // Variables auxiliares
        int edadAnyoProximo;
        
        // Clase Scanner para petición de datos al usuario a través del teclado
        Scanner teclado= new Scanner (System.in);
        
    //----------------------------------------------
    //               Entrada de datos 
    //----------------------------------------------
        System.out.println("Ejercicio 0. Saludo");
        System.out.println("--------------------");
        
        System.out.println("Introduce tu nombre:");        // mostramos un mensaje sobre la información que vamos a pedir por teclado
        nombre = teclado.nextLine();                       // a través del Scanner pedimos al usuario que escriba una línea (texto)
        
        System.out.println("Introduce tu edad actual:");   // mostramos un mensaje sobre la información que vamos a pedir por teclado
        edadActual = teclado.nextInt();                    // a través del Scanner pedimos al usuario que escriba un número entero 

        
    //----------------------------------------------
    //                 Procesamiento 
    //----------------------------------------------
        edadAnyoProximo = edadActual + 1; // se suma 1 año a la edad actual
        // se almacena en la variable resultado, el texto completo (recuerda que para unir textos se usa el operador + 
        textoResultado = "Hola " + nombre + ", ahora tienes " + edadActual + " años, el año próximo tendrás " + edadAnyoProximo + " años";
        
        
    //----------------------------------------------
    //              Salida de resultados 
    //----------------------------------------------
        System.out.println();
        System.out.println("RESULTADO");
        System.out.println("---------");        
        System.out.println(textoResultado); // se muestra el contenido de la variable textoResultado
        System.out.println ();
        System.out.println ("Fin del programa.");           
    }
}
