package tarea02;

import java.util.Random;

/**
 * Clase que emula una máquina tragaperras que generará aleatoriamente una combinación
 * de tres elementos formada por alguno de los posibles cinco: Platano (P), Fresa (F),
 * Manzada (M), Naranja (N) y Cerezas (C), considerándo que es una combinación premiada
 * cuando los 3 elementos de la combinación sean iguales.
 *  
 * @author Francisco Javier Sueza Rodríguez
 */
public class Ejercicio04 {
    

    public static void main(String[] args) {
        //----------------------------------------------
        //               Declaración de variables
        //----------------------------------------------
        
        // Declaracion de Constantes
        
        /*
         * Con las constantes que vamos a declarar, solo tendremos que modificar
         * TAMANO_COMB para realizar combinaciones de diferentes tamaños, haciendo
         * la clase más escalable que si se implementara de otra forma.
         *
         * Esto también condicionará el diseño de la clase, se apunta más adelante.   
         *
         */
        
        final int TAMANO_COMB = 3; 
        
        final String PLATANO = "P";
        final String FRESA = "F";
        final String MANZANA = "M";
        final String NARANJA = "N";
        final String CEREZA = "C";
        
        final String PREMIO_1 = PLATANO.repeat(TAMANO_COMB);
        final String PREMIO_2 = FRESA.repeat(TAMANO_COMB);
        final String PREMIO_3 = MANZANA.repeat(TAMANO_COMB);
        final String PREMIO_4 = NARANJA.repeat(TAMANO_COMB);
        final String PREMIO_5 = CEREZA.repeat(TAMANO_COMB);
        
        // Variables de salida 
        
        String premioFinal = "", combinacion = "";
        
        /*
         * En la variable intentos se ha usado un tipo long, para que pueda almacenar
         * más intentos en el caso de valores altos de TAMANO_COMB
         */
       
        long intentos = 0; 
        
        // Variables axuliares
        
        boolean premiada = false;
        int numeroAleatorio;
        
        // Clase Random para generar números aleadorios

        Random r = new Random();
        //----------------------------------------------
        //              Entrada de datos
        //----------------------------------------------
    
        System.out.println("Ejercicio 4. Simulador de Máquina Tragaperras.");
        System.out.println("----------------------------------------------------");
        System.out.println("Vamos a generar secuencias de 3 frutas entre Plátano, Fresa, Naranja, Manzana y  Cereza hasta conseguir 3 iguales.");
        System.out.println("Una vez que se obtengan 3 iguales se te mostrará la secuencia ganadora y el premio obtenido");
        System.out.println("");
        
        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------
        
        /*
         * Ahora se va a generar la combinación y a comprobar que está premiada. 
         * Para ello, se va a usar un bucle do while principal, donde se iran generando
         * las combinaciones hasta que se genere una premiada. Para generar las combinaciones
         * usaremos un bloque for, ya que sabemos el tamaño de estas de antemano.
         */
        
        do {
          
            // Primeramente generamos la combinación de elementos
            
            for (int i = 0; i < TAMANO_COMB; i ++) {              
                numeroAleatorio = r.nextInt(5);
                
                switch (numeroAleatorio) {
                    case 0:
                        combinacion += PLATANO;
                        break;
                    case 1:
                        combinacion += FRESA;
                        break;
                    case 2:
                        combinacion += MANZANA;
                        break;
                    case 3:
                        combinacion += NARANJA;
                        break;
                    default:
                        combinacion += CEREZA;
                }           
            }
            
            /*
             * Para comprobar el premio vamos a usar una estructura if-else, ya 
             * que se han generado los premios en la declaración de constantes
             * y una estructura switch no nos va a permitir hacer la comparación.
             *
             * Además iremos añadiendo cada combinación a la variable secuencia que se 
             * mostrará al usuario con todas las combinaciones generadas.
             *
             * En esta parte también se va a ir mostrando cada una de las secuncias 
             * conforme se vayan generando. 
             *
             * NOTA: se ha elegido mostrar aquí directamente cada secuencia, aunque
             *       se podría haber almacenado en una variable de tipo String, añadiendo
             *       saltos de línea al final de cada combinación. 
             *       El problema es que despues de realizar varias pruebas si se le da valores 
             *       altos (por encima de 8) a la constante TAMANO_COMB, la variable que almacena 
             *       la cadena se desborda, por lo que se ha preferido optar por esta opción ya que es más segura y 
             *       además funciona correctamente para valores altos. Además así nos ahorramos una variables.
             */
            
            intentos++;
            System.out.println(intentos + " - " + combinacion);
            
            if (combinacion.equals(PREMIO_1)) {
                premiada = true;
                premioFinal = "premio 1";
            
            } else if (combinacion.equals(PREMIO_2)) {
                premiada = true;
                premioFinal = "premio 2";
            
            } else if (combinacion.equals(PREMIO_3)) {
                premiada = true;
                premioFinal = "premio 3";
            
            } else if (combinacion.equals(PREMIO_4)) {
                premiada = true;
                premioFinal = "premio 4";
                
            } else if (combinacion.equals(PREMIO_5)) {
                premiada = true;
                premioFinal = "premio 5";
            
            } else {
                combinacion = "";
            }  
        } while (!premiada);
  
        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        
        System.out.println("");
        System.out.println("Has obtenido el " + premioFinal + " en el intento " + intentos + " con la secuencia: " + combinacion);
    }
}
