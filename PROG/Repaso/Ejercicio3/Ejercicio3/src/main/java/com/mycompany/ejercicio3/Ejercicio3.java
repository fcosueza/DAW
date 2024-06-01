package com.mycompany.ejercicio3;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.HashMap;
import java.util.List;
import java.util.Scanner;

/**
 *
 * @author fcosueza
 */
public class Ejercicio3 {

    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);

        // Variables para almacenar los números y el resultado
        HashMap<String, Integer> resultado = new HashMap<>();
        List<String> listaNumeros;
        String buffer[];

        boolean entradaCorrecta;

        // Comprobamos que la entrada sea correcta
        do {
            System.out.println("Introduza una serie de números con un tamaño entre 1 y 12 cifras separados por espacios: ");
            buffer = entrada.nextLine().split("\\s{1,}");

            if (!Ejercicio3.checkNumbers(buffer)) {
                System.err.println("Error: Los números deben tener entre 1 y 12 cifras.\n");
                entradaCorrecta = false;
            } else {
                entradaCorrecta = true;
            }
        } while (!entradaCorrecta);

        // Con la entrada correcta, buscamos las coincidencias de cada número
        listaNumeros = Arrays.asList(buffer);

        for (String number : buffer) {
            resultado.put(number, Collections.frequency(listaNumeros, number));
        }

        // Mostramos los resultados
        System.out.println("Recuento de números: \n");

        for (String key : resultado.keySet()) {
            System.out.printf("Numero %s --> %d vez\n", key, resultado.get(key));
        }
    }

    // Método para comprobar si los números tiene el formato correcto
    public static boolean checkNumbers(String[] numbers) {
        for (String numberString : numbers) {
            if (!numberString.matches("[0-9]{1,12}")) {
                return false;
            }
        }

        return true;
    }
}
