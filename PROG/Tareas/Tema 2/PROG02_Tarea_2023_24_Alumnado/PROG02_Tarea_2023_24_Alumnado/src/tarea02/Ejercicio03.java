package tarea02;

import java.util.Scanner;

/**
 *
 * @author luisnavarro
 */
public class Ejercicio03 {

    public static void main(String args[]) {
        //----------------------------------------------
        //               Declaración de variables y constantes
        //----------------------------------------------
        
        String resultado="";

        //----------------------------------------------
        //               Entrada de datos 
        //----------------------------------------------
        System.out.println("Ejercicio03: Formación romana a partir de un número de soldados.");
        System.out.println("----------------------------------------------------");
        // Bloque 1. Solicitud del número de soldados
        // Validación de entrada: Deberíamos comprobar que es mayor o igual que uno. En caso contrario volvemos solicitar el número de soldados
        // Se supone que nos introducen un número entero. En caso que no sea así saltará una excepción, cuyo tratamiento veremos en uinidades posteriores

        // 
        // Bloque 2. Solicitud del tipo de formación. 
        // Indicaremos que tiene que ser LINEA, CUADRADO o TRIANGULO
        // Leemos una cadena, puede que no sea una de las anteriores.
        
        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------
        // Creamos una cadena de texto para ir almacenando el resultado, que sacaremos por pantalla al final
        // Sólo si la entrada ha sido válida simulamos la formación representando cada soldado con un *
        // No olvides que Si al hacer la mayor formación posible del tipo indicado con los soldados introducidos sobran soldados, se debe indicar cuantos."
        // Si el tipo de formación que nos han indicado y que hemos leído como String no coincide con una de las contempladas, indicamos este error almacenando el mensaje oportuno en el String resultado

        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        System.out.println(resultado);
         //----------------------------------------------
    }
}
