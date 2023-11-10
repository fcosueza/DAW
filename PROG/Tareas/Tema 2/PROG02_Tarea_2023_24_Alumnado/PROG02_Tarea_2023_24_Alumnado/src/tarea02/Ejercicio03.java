package tarea02;

import java.util.Scanner;

/**
 * Clase que pide un número de soldados romanos por teclado, representandolos por 
 * un asterisco (*) y los representa según la formación elegida por el usuario, pudiendo
 * ser esta en Linea, Cuadrado o Triangulo.
 *  
 * @author Francisco Javier Sueza Rodríguez
 */
public class Ejercicio03 {
    
    public static void main(String args[]) {
        //---------------------------------------------------------------
        //               Declaración de variables y constantes
        //---------------------------------------------------------------
        
        // Constantes
        
        /*
         * Vamos a declarar como constantes los carácteres que representan tanto a los 
         * soldados como los espacios, asi si queremos representarlos usando otros
         * solo tendremos que cambiar las constantes.
         */
        
        final char SOLDADO_CHAR = '*';
        final char ESPACIO_CHAR = ' ';
        
        // Variables de Entrada
        
        int soldados;
        String formacion;
        
        // Variables de Salida
        
        String resultado="";
        
        // Variables Auxiliares
        
        boolean numeroCorrecto = false;
        int soldadosEnFormacion = 0;
        
        // Variable para la entrada por teclado
        
        Scanner teclado = new Scanner(System.in);

        //----------------------------------------------
        //               Entrada de datos 
        //----------------------------------------------
        
        System.out.println("Ejercicio03: Formación romana a partir de un número de soldados.");
        System.out.println("----------------------------------------------------");
       
        do {
            
            System.out.println("");
            System.out.println("Introduzca el número de soldados (debe ser mayor a 1): ");
            soldados = teclado.nextInt();
            
            if (soldados > 1)
                numeroCorrecto = true;
                
        } while (!numeroCorrecto);

        System.out.println("");
        System.out.println("Introduzca el tipo de formación (LINEA, CUADRADO o TRIANGULO): ");
        formacion = teclado.nextLine().toUpperCase();       
        
        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------
        
        if (!formacion.equals("LINEA") && !formacion.equals("CUADRADO") && !formacion.equals("TRIANGULO")) 
            resultado = "Opción NO CORRECTA";
        else {
            
            if (formacion.equals("LINEA")) {
                for (int i = 0; i < soldados; i++)
                    resultado += SOLDADO_CHAR + ESPACIO_CHAR;
            
            } else if (formacion.equals("CUADRADO")) {
                soldadosEnFormacion = (int) Math.sqrt(soldados);
                
                for (int i = 0; i < soldadosEnFormacion; i++) {
                    for (int j = 0; j < soldadosEnFormacion; j++)
                        resultado += SOLDADO_CHAR + ESPACIO_CHAR; 
                    
                    resultado += '\n';
                }              
            }
            
        }

        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        System.out.println(resultado);
         //----------------------------------------------
    }
}
