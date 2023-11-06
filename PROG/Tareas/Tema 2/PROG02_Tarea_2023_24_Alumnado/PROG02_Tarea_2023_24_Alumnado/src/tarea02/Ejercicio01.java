/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tarea02;

import java.util.Random;
import java.util.Scanner;

/**
 * @author LUIS NAVARRO ORTIZ
 */
public class Ejercicio01 {

    public static void main(String[] args) {
        //----------------------------------------------
        //          Declaración de variables 
        //----------------------------------------------
        // Constantes
        final int MIN_LARGOS = 0;
        final int MAX_LARGOS = 50;
        final byte MAX_INTENTOS = 3;

        // Variables de entrada
        int largosTotales;

        // Variables de salida
        String resultado = "DESCONOCIDO";

        // Variables auxiliares
        boolean entradaValida;
        byte intentos = 0;

        // Clase Scanner para petición de datos
        Scanner teclado = new Scanner(System.in);

        System.out.println("Ejercicio 1. Uso del depurador");
        System.out.println("----------------------------------------------------");
        System.out.println("PRUEBA DEL PROFESOR LUIS NAVARRO ORTIZ");
        System.out.println("----------------------------------------------------");
        //----------------------------------------------
        //               Entrada de datos 
        //----------------------------------------------
        // Bloque 1. Solicitud del número de largos.
        // Validación de entrada
        System.out.println("ENTRENAMIENTO DE NATACIÓN");
        System.out.println("-------------------------");
        entradaValida = false;
        do {
            System.out.print("Introduzca el número de largos realizados (entre " + MIN_LARGOS + " y " + MAX_LARGOS + "): ");
            largosTotales = teclado.nextInt();
            if (largosTotales >= MIN_LARGOS && largosTotales <= MAX_LARGOS) {
                entradaValida = true;
            }
        } while (!entradaValida && ++intentos < MAX_INTENTOS); // Si se alcanza el máximo de intentos inválidos se finalizará el programa

        //----------------------------------------------
        //                 Procesamiento 
        //----------------------------------------------
        // Sólo si la entrada ha sido válida llevamos a cabo los cálculos
        if (entradaValida) {
            // Inicializamos el resultado
            resultado = "{ ";
            // Construimos la cadena largo a largo
            for (int i = 1; i <= largosTotales; i++) {
                if (i % 2 == 0) {
                    resultado += "Espalda "; // Si el largo es par se hace a espalda
                } else if (i % 4 == 1) {  // Si se trata del primer largo de cada serie o fracción de 4
                    resultado += "Crol "; // Entonces se hace a crol
                } else if (i % 4 == 3) {  // Si se trata del tercer largo de cada serie o fracción de 4
                    resultado += "Braza "; // Entonces se hace a braza                
                }
            }
            resultado += "}";
        }

        //----------------------------------------------
        //              Salida de resultados 
        //----------------------------------------------
        System.out.println();
        System.out.println("DESARROLLO DE LARGOS");
        System.out.println("--------------------");
        if (entradaValida) {
            System.out.println(resultado);
        } else {
            System.out.println("Entrada no válida.");
        }
    }
}