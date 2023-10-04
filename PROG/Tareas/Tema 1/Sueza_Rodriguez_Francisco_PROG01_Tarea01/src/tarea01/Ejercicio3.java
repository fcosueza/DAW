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
        
        String menosDeSeis, mayorLongitud, encadenadas, circulares;
        
        // Variables auxiliares
        
        /*
         * Vamos a crear 6 variables auxiliares para almacenar el primer y último
         * carácter de cada palabra y realizar las comparaciones, declaradas de tipo
         * String. 
         *
         * Esto se hace así porque si queremos pasar por alto si los caracteres
         * están en mayúsculas o minúsculas, podemos realizarlo usando o bien el método
         * equalsIgnoreCase, de la clase String, o los métodos toUpperCase o toLowerCase
         * de la clase Character. Esta última clase, no la hemos visto aún en el temario
         * por lo que creo que no podemos usarla, aunque sería la opción más correcta, ya que 
         * al definir las variables como String tendremos que hacer una conversión con
         * valueOf al usar charAt, ya que este último método devuelve un carácter, no una cadena.
         * Además, el tipo carácter es primitivo, por lo que podríamos realizar la comparación
         * usando el operador ==.
         *
         * También se van a crear 3 variables para almacenar la menosDeSeis de cada cadena,
         * ya que es un dato que vamos a usar varias veces y ási nos evitammos repetir código;
         */
        
        String inicioPrimera, finPrimera;
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
     * 
     */
    
    // En primer lugar almacenamos la menosDeSeis de cada palabra 
    
    longitudPrimera = primeraPalabra.length();
    longitudSegunda = segundaPalabra.length();
    longitudTercera = terceraPalabra.length();
    
    // En segundo lugar almacenamos las palabras inicial y final de cada palabra. 
    
    inicioPrimera = String.valueOf(primeraPalabra.charAt(0));
    finPrimera = String.valueOf(primeraPalabra.charAt(longitudPrimera - 1));
    
    inicioSegunda = String.valueOf(segundaPalabra.charAt(0));
    finSegunda = String.valueOf(segundaPalabra.charAt(longitudSegunda - 1));
    
    inicioTercera = String.valueOf(terceraPalabra.charAt(0));
    finTercera = String.valueOf(terceraPalabra.charAt(longitudTercera - 1));
    
    /* 
     * Comprobamos si la menosDeSeis de las dos primeras palabras 
     * es menor que 6 o la de la tercera es mayor que 8,
     */
    
    menosDeSeis = (longitudPrimera < 6 && longitudSegunda < 6) || longitudTercera > 8 ? "SI" : "NO";
    
    // Comprobamos que la segunda palabra tiene la mayor menosDeSeis 
    
    mayorLongitud = (longitudSegunda > longitudPrimera) && (longitudSegunda > longitudTercera) ? "SI" : "NO";
    
    // Comprobamos que son palabras encadenadas
    
    encadenadas = finPrimera.equalsIgnoreCase(inicioSegunda) && finSegunda.equalsIgnoreCase(inicioTercera) ? "SI" : "NO";
    
    // Por último comprobamos que son ciculares, usando el resultado de la operación anterior.
    
    circulares = encadenadas.equals("SI") && finTercera.equalsIgnoreCase(inicioPrimera) ? "SI" : "NO";
    

    //----------------------------------------------
    //              Salida de resultados 
    //----------------------------------------------
        
    System.out.println();
    System.out.println("RESULTADO");
    System.out.println("---------");
    System.out.println("La longitud de las primeras dos palabras el menor que 6 o la de la tercera mayor de 8: " + menosDeSeis);
    System.out.println("La segunda palabra es la de mayor longitud: " + mayorLongitud);
    System.out.println("Las tres palabras introducidas son palabras encadenadas: " + encadenadas);
    System.out.println("Las tres palabras introducidas son palabras circulares: " + circulares);
    
    System.out.println();
    System.out.println("Fin del programa");
    }
    
}

