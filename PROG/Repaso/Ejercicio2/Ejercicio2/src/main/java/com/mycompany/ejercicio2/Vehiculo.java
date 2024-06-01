package com.mycompany.ejercicio2;

import java.time.LocalDate;
import java.util.ArrayList;
import java.util.Arrays;

public class Vehiculo {

    private final String matricula;
    private final String matriculaRegexp = "[0-9]{4}[a-zA-Z]{3}";

    private final int minimoColores = 1;
    private final int maximoColores = 3;

    private ArrayList<Color> colores;
    private ArrayList<LocalDate> fechas;

    public Vehiculo(String matricula, Color... colores) throws IllegalArgumentException {
        // Comprobamos que la matricula tiene el formato correcto
        if (!matricula.matches(matriculaRegexp)) {
            throw new IllegalArgumentException("Error: La matricula no tiene el formato correcto. (ej: AFGH123)");
        }

        // Comprobamos que se han introducido el número correcto de colores
        if (colores.length > maximoColores || colores.length < minimoColores) {
            throw new IllegalArgumentException("Error: El vehiculo tiene que tener un mínimo de 1 color y un máximo de 3");
        }

        // Almacenamos los datos y creamos el array de fechas
        this.colores = new ArrayList<>(Arrays.asList(colores));
        this.matricula = matricula;
        this.fechas = new ArrayList<>();
    }

    public boolean addColor(Color color) {
        boolean result = true;

        if (this.colores.size() > 3 || this.colores.contains(color)) {
            result = false;
        } else {
            colores.add(color);
        }

        return result;
    }

    public boolean quitarColor(Color color) {
        boolean result = true;

        if (this.colores.size() == 1 || !this.colores.contains(color)) {
            result = false;
        } else {
            colores.remove(color);
        }

        return result;
    }

    public boolean contieneColor(Color color) {
        return this.colores.contains(color);
    }

    public int utilizar() {
        this.fechas.add(LocalDate.now());

        return this.fechas.size();
    }

    public int vecesUtilizado() {
        return this.fechas.size();
    }

    public int vecesUtitlizadoAntesDe(LocalDate fecha) {
        int vecesUtilizado = 0;

        for (LocalDate fechaUtilizado : this.fechas) {
            if (fechaUtilizado.isBefore(fecha)) {
                vecesUtilizado++;
            }
        }

        return vecesUtilizado;
    }

    public LocalDate ultimoUso() {
        return this.fechas.get(this.fechas.size() - 1);
    }

    @Override
    public String toString() {
        return "Matrícula: " + this.matricula + "\n"
                + "Colores: " + this.colores.toString() + "\n"
                + "Usos (" + vecesUtilizado() + "):" + this.fechas.toString() + "\n";
    }
}
