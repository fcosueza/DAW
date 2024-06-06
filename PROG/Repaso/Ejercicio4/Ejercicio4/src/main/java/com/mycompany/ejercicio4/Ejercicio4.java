package com.mycompany.ejercicio4;

import java.io.File;
import java.io.FileWriter;
import java.io.BufferedWriter;
import java.io.IOException;
import java.util.List;
import java.util.Map;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.HashMap;
import java.util.Scanner;

/**
 *
 * @author fcosueza
 */
public class Ejercicio4 {

    public static void main(String[] args) throws IOException {
        List<String> serieNumeros = new ArrayList<>();
        Map<String, Integer> resultado = new HashMap<>();
        Scanner teclado = new Scanner(System.in);

        String buffer[];

        File nombreArchivo = new File("conteo.txt");
        FileWriter escritura = null;
        BufferedWriter wrapper = null;

        do {

            System.out.println("Introduzca una serie de números entre 0 y 99:");
            buffer = teclado.nextLine().split("\\s{1,}");

        } while (!procesarNumeros(buffer));

        serieNumeros = Arrays.asList(buffer);

        for (String numero : serieNumeros) {
            resultado.put(numero, Collections.frequency(serieNumeros, numero));
        }

        try {
            escritura = new FileWriter(nombreArchivo);
            wrapper = new BufferedWriter(escritura);
        } catch (IOException ex) {
            System.err.println("Error: " + ex.getMessage());
        }

        for (String number : resultado.keySet()) {
            wrapper.write("Numero " + number + ": " + "*".repeat(resultado.get(number)) + "\n");
        }

        wrapper.flush();
    }

    /**
     *
     * @param numeros
     * @return
     */
    public static boolean procesarNumeros(String numeros[]) {
        String regexp = "[0-9]{1,2}";

        for (String numero : numeros) {
            if (!numero.matches(regexp)) {
                return false;
            }
        }

        return true;
    }
}
