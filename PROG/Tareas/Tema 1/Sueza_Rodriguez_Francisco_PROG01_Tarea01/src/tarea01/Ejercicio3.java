package tarea01;

import java.util.Scanner; 

/**
 * 
 * Ejercicio 3.
 * 
 * En este ejercicio vamos a pedir al usuario que introduzca 3 palabras y vamos
 * a comprobar si estas son palabras circulares, además de la longitud que tienen
 * las cadenas.
 * 
 * @author (indicar aquí el autor del ejercicio)
 */

public class Ejercicio3 {
    
    public static void main(String[] args) {
        
    //----------------------------------------------
    //    Declaración de variables y constantes
    //----------------------------------------------
        
        // Variables de entrada 
        String primeraPalabra, segundaPalabra, terceraPalabra;
        
        // Variables de salida 
        
        String longitud, mayorLongitud, encadenadas, circulares;
        
        // Variables auxiliares
        
        /*
         * Vamos a crear 6 variables auxiliales para almacenar el primer y último
         * carácter de cada palabra y realizar las comparaciones. Las vamos a declarar
         * de tipo String, para poder usar el método equalsIgnoreCase de esta clase. 
         * No es lo más eficiente, pero si las declaramos de tipo char, deberíamos usar 
         * el método toLowerCase o toUpperCase de la clase Character para ignorar mayúsculas, 
         * y aún no hemos visto está clase en el temario.
         *
         * También se van a crear 3 variables para almacenar la longitud de cada cadena,
         * ya que es un dato que vamos a usar varias veces y ási nos evitammos repetir código;
         */
        
        char inicioPrimera, finPrimera;
        String inicioSegunda, finSegunda;
        String inicioTercera, finTercera;
        
        int longitudPrimera, longitudSegunda, longitudTercera;
        
        // Clase Scanner para petición de datos al usuario a través del teclado
        Scanner teclado = new Scanner (System.in);
        
    //----------------------------------------------
    //               Entrada de datos 
    //----------------------------------------------
    
    System.out.println("Ejercicio 3: Palabras encadenadas");
    System.out.println("-----------------------------------------------");
    
    // Pedimos al usuario que introduzca las tres palabras
    
    System.out.println("Introduce la primera palabra: ");
    primeraPalabra = teclado.nextLine();
    
    System.out.println("Introduce la segunda palabra ");
    segundaPalabra = teclado.nextLine();
    
    System.out.println("Introduce la tercera palabra: ");
    terceraPalabra = teclado.nextLine();
    
    //----------------------------------------------
    //                 Procesamiento 
    //----------------------------------------------
    
    /*
     * Vamos a tener que realizar varias comprobaciones condicionales. Aún
     * no hemos visto las estructuras condicionales if-then-else, pero si hemos visto
     * el operador ternario que nos permite realizar las mismas comprobaciones.
    */
    
    // En primer lugar almacenamos la longitud de cada palabra 
    
    longitudPrimera = primeraPalabra.length();
    longitudSegunda = segundaPalabra.length();
    longitudTercera = terceraPalabra.length();
    
    // En segundo lugar almacenamos las palabras inicial y final de cada palabra.
    
    inicioPrimera = Character.toLowerCase(primeraPalabra.charAt(0));
    finPrimera = primeraPalabra.charAt(longitudPrimera - 1);
    
    inicioSegunda = segundaPalabra.charAt(0);
    finSegunda = segundaPalabra.charAt(longitudSegunda - 1);
    
    inicioTercera = terceraPalabra.charAt(0);
    finTercera = terceraPalabra.charAt(longitudTercera - 1);
    
    /* Comprobamos si la longitud de las dos primeras palabras 
     * es menor que 6 o la tercera menos que 8
     */
    
    longitud = (longitudPrimera < 6 && longitudSegunda < 6) || longitudTercera > 8 ? "SI" : "NO";
    
    // Comprobamos que la segunda palabra tiene la mayor longitud 
    
    mayorLongitud = (longitudSegunda >= longitudPrimera) && (longitudSegunda >= longitudTercera) ? "SI" : "NO";
    
    // Comprobamos que son palabras encadenadas
    
    encadenadas = (finPrimera == inicioSegunda) && (finSegunda == inicioTercera) ? "SI" : "NO";
    

    //----------------------------------------------
    //              Salida de resultados 
    //----------------------------------------------
        System.out.println();
        System.out.println("RESULTADO");
    }
    
}

