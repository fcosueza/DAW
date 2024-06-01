package com.mycompany.ejercicio2;

import java.time.LocalDate;

/**
 *
 * @author fcosueza
 */
public class Ejercicio2 {

    public static void main(String[] args) {
        Vehiculo coche;

        try {
            coche = new Vehiculo("4040AAA", Color.ROJO);
            System.out.println(coche.toString());

            coche.addColor(Color.AZUL);
            coche.utilizar();
            coche.utilizar();

            System.out.println(coche.toString());

            System.out.println(coche.vecesUtitlizadoAntesDe(LocalDate.of(2024, 6, 1)));
        } catch (IllegalArgumentException ex) {
            System.err.println(ex.getMessage());
        }

    }
}
