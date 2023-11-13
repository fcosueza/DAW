package tarea02;

import java.util.Scanner;

/**
 * Clase que pide un número de soldados romanos por teclado, representados por 
 * un asterisco (*) y los pinta según la formación elegida por el usuario, pudiendo
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
        
        final String SOLDADO_CHAR = "*";
        final String ESPACIO_CHAR = " ";
        
        // Variables de Entrada
        
        int soldados;
        String formacion;
        
        // Variables de Salida
        
        String resultado="";
        
        // Variables Auxiliares
        
        boolean numeroCorrecto = false;
        int lineasFormacion, soldadosDescartados = 0;
        
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
        formacion = teclado.next().toUpperCase();       
        
        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------
        
        /*
         * Si la formación elegida no es correcta, guardamos el mensaje de error en la 
         * variable resultado y concluimos el procesamiento. En caso contrario, se procesa
         * la formación y el número de soldados.
         */
        
        if (!formacion.equals("LINEA") && !formacion.equals("CUADRADO") && !formacion.equals("TRIANGULO")) 
            resultado = "Opción NO CORRECTA.";
        else {
            
            /*
             * Ahora se pintan las diferentes formaciones. Para que la salida sea igual
             * que la mostrada en los casos de uso, hay que meter espacios entre los 
             * asteriscos, sino se van a ver mas apelotonados.
             */
            
            System.out.println();
            
            if (formacion.equals("LINEA")) {   
                
                // Si es una formación LINEA, simplemente se usa una expresion for y se pintan los soldados.
                
                for (int i = 0; i < soldados; i++)
                    resultado += SOLDADO_CHAR + ESPACIO_CHAR;
                
            } else if (formacion.equals("CUADRADO")) {  
                
                /*
                 * En el caso de la formación CUADRADO, calculamos los asteriscos del cuadrado
                 * con la formula proporcionada y creados dos bucles anidados, para recorrer
                 * filas y columnas. Al final, se calculan los soldados descartados, si los hubiera.
                 */
                
                lineasFormacion = (int) Math.sqrt(soldados);
                               
                for (int i = 0; i < lineasFormacion; i++) {
                    for (int j = 0; j < lineasFormacion; j++)
                        resultado += SOLDADO_CHAR + ESPACIO_CHAR; 
                    
                    resultado += '\n';
                }
                
                soldadosDescartados = soldados - (lineasFormacion * lineasFormacion);
                
            } else {
                
                /*
                 * Para la formacion TRIANGULO calculamos el número de filas que se pueden
                 * representar, que coincide con el número de soldados de la primera fila.
                 *
                 * El triángulo se va a dibujar usando 3 bucles for, uno para cada fila,
                 * otro para los espacios, anidado dentro, y otro para los soldados, anidado
                 * también dentro del primero. 
                 *
                 * Para calcular el número sobrande te soldados, se incrementará la variable
                 * soldadosDescartados cada vez que se pinte un soldado y despues se restará
                 * a la variable soldados.
                 */
                
                lineasFormacion = (int) (Math.sqrt((1 + 8 * soldados) - 1) / 2);

                for (int i = 0; i < lineasFormacion; i++) {                   
                    for (int j = 0; j < i; j++)
                        resultado += ESPACIO_CHAR;
                    
                    for (int k = lineasFormacion - 1; k > i; k--) {
                        soldadosDescartados++;
                        resultado += SOLDADO_CHAR + ESPACIO_CHAR;
                    }
                    
                    resultado += "\n";
                }

                soldadosDescartados = soldados - soldadosDescartados;
            }           
        }

        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        
        // Mostramos la formación realizada o el mensaje de error, según se haya procesado
        
        System.out.printf("%s", resultado);
        
        // Si el número de soldados descartados es diferentes a 0, se muestran cuantos han sido.
        
        if (soldadosDescartados > 0)
            System.out.println("De los " + soldados + " soldados asignados, una vez realizada la mayor formación posible con el tipo indicado, sobran " + soldadosDescartados + " soldados.");      
    }
}
