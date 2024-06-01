package com.mycompany.ejercicio1;

/**
 * Ejercicio 1 de repaso para examen de Junio.
 *
 * @author Francisco Sueza Rodríguez
 */
public class Ejercicio1 {

    public static void main(String[] args) {
        Terreno terrenoPrueba;

        try {
            terrenoPrueba = new Terreno(1000, "Armilla", 3, 3, 15);

            System.out.println(terrenoPrueba.toString());
            System.err.println(terrenoPrueba.representar());

        } catch (IllegalArgumentException ex) {
            System.out.print(ex.getMessage());
        }

    }
}
