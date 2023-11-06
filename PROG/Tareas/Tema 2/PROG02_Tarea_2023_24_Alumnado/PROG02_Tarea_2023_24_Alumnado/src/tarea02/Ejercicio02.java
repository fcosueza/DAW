package tarea02;

/**
 *
 * @author luisnavarro
 */
import java.util.Scanner;

public class Ejercicio02 {

    public enum Bebidas {
        COCACOLA, PEPSI, AGUA, ZUMO, OTRO
    };

    public static void main(String[] args) {

         //----------------------------------------------
        //    Declaración de variables y constantes
        //----------------------------------------------
        // Variables de entrada (aquí se definen las variables que recibirán valores, si fueran necesarias)
        
        // Variables de salida (aquí se definen las variables que almacenarán resultados y se mostrarán al usuario, si fueran necesarias)
        
        // Clase Scanner para petición de datos al usuario a través del teclado
        
        Scanner scanner = new Scanner(System.in);
        Bebidas miBebida = null;
        
        //----------------------------------------------
        //               Entrada de datos 
        //----------------------------------------------
        System.out.println("Ejercicio 2: Máquina expendedora de Bebidas\n");
        System.out.println("----------------------------------------------------");      

        // Bloque 1: Sacamos por pantalla el menú de opciones y pedimos que introduzca una.
        //  En caso de introducir una opción inválida, debemos indicarlo y volver a pedirla.
        
        
        //----------------------------------------------
        //                 Procesamiento y  Salida de resultados 
        //----------------------------------------------
        
        // Cuando haya introducido una opción válida, llevamos a cabo la acción oportuna
        //  -Si nos indica 'Salir', nos despedimos y terminamos
        //  -Si nos indica un producto
        //      -Decimos el producto seleccionado y su precio
        //      -Pedimos que introduzca el importe
        //          -Si el importe es suficiente
        //               -Imprimimos el producto obtenido (Equivale a la orden de suministrar el producto
        //               -Decimos el importe que ha sobrado
        //          -Si no, indicamos que el importe es insuficiente 
        //----------------------------------------------
        //             Salida de resultados 
        //----------------------------------------------
        //  Se produce durante el proceso
    }
}

