package tarea03;

import java.time.Year;
import java.time.YearMonth;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.time.format.TextStyle;
import java.time.temporal.ChronoUnit;

import java.util.Locale;
import java.util.Scanner;
import java.util.InputMismatchException;

/**
 * Ejercicio 3: Día de cumpleaños
 *
 * En este ejercicio vamos a trabajar con fechas, en concreto, vamos a pedir
 * una fecha de nacimiendo y calcular en cuantos años, desde el nacimiento hasta
 * el año actual, coincide el día de la semana con el del día de nacimiento.
 *
 * @author Francisco Javier Sueza Rodríguez
 * @author Profe
 */
public class Ejercicio03 {

    public static void main(String[] args) {
        //----------------------------------------------
        //          Declaración de variables
        //----------------------------------------------
        // Constantes

        final String FORMATO_FECHA = "dd/MM/YYYY";

        // Variables de entrada
        int dia = 1, mes = 1, anio = 1900;

        // Variables de salida
        int numeroCoincidencias = 0;

        String diaSemana;
        String fechasCoincidencia = "";

        // Variables auxiliares
        int diasMes;
        int contAnio = 0;

        String diaSemanaAnio;

        LocalDate anioSiguiente;
        LocalDate fechaNacimiento;

        LocalDateTime fechaActual = LocalDateTime.now();

        boolean esBisiesto = false;
        boolean datoCorrecto = false;

        // Objeto Scanner para lectura desde teclado
        Scanner entrada = new Scanner(System.in);

        //----------------------------------------------
        //                Entrada de datos
        //----------------------------------------------
        System.out.println("DÍA DE CUMPLEAÑOS");
        System.out.println("-----------------");

        // 1. Entrada de datos: lectura de año de nacimiento
        // 1.1.- Leer y comprobar el año de nacimiento (entre 1900 y año actual)
        do {
            /*
             * Pedimos el año. Si no se introduce un entero o esta fuera de rango
             * lanzamos una excepción InputMismatchException.
             */
            System.out.printf("Introduzca el año de nacimiento (1900 - %d): \n\n", fechaActual.getYear());

            try {
                if (entrada.hasNextInt()) {
                    anio = entrada.nextInt();

                    if (anio < 1900 || anio > fechaActual.getYear()) {
                        throw new InputMismatchException("año incorrecto");
                    }

                    datoCorrecto = true;
                } else {
                    entrada.nextLine();
                    throw new InputMismatchException("año incorrecto");
                }
            } catch (InputMismatchException ex) {
                System.out.printf("Error de lectura: %s\n\n", ex.getMessage());
            }
        } while (!datoCorrecto);

        // Comprobamos si el año es bisiesto
        if (Year.isLeap(anio)) {
            esBisiesto = true;
        }

        // 1.2.- Leer y comprobar el mes de nacimiento
        datoCorrecto = false;
        entrada.nextLine();

        do {
            /*
             * Pedimos el mes. Si no se introduce un entero o esta fuera de rango
             * lanzamos una excepción InputMismatchException.
             */
            System.out.printf("Introduzca el mes de nacimiento (1 - 12): \n\n");

            try {
                if (entrada.hasNextInt()) {
                    mes = entrada.nextInt();

                    if (mes < 1 || mes > 12) {
                        throw new InputMismatchException("mes incorrecto");
                    }

                    datoCorrecto = true;
                } else {
                    entrada.nextLine();
                    throw new InputMismatchException("mes incorrecto");
                }
            } catch (InputMismatchException ex) {
                System.out.printf("Error de lectura: %s\n\n", ex.getMessage());
            }
        } while (!datoCorrecto);

        // 1.3.- Averiguamos cuántos días tiene el mes de nacimiento
        diasMes = YearMonth.of(anio, mes).lengthOfMonth();

        // 1.4.- Leer y comprobar el día de nacimiento
        datoCorrecto = false;
        entrada.nextLine();

        do {
            /*
             * Pedimos el dia. Si no se introduce un entero o esta fuera de rango
             * lanzamos una excepción InputMismatchException.
             */
            System.out.printf("Introduzca el dia de nacimiento (1 - %d): \n\n", diasMes);

            try {
                if (entrada.hasNextInt()) {
                    dia = entrada.nextInt();

                    if (dia < 1 || dia > diasMes) {
                        throw new InputMismatchException("dia incorrecto");
                    }

                    datoCorrecto = true;
                } else {
                    entrada.nextLine();
                    throw new InputMismatchException("dia incorrecto");
                }
            } catch (InputMismatchException ex) {
                System.out.printf("Error de lectura: %s\n\n", ex.getMessage());
            }
        } while (!datoCorrecto);

        fechaNacimiento = LocalDate.of(anio, mes, dia);
        //----------------------------------------------
        //    Procesamiento + Salida de resultados
        //----------------------------------------------
        //2.- Cálculo del día de la semana en que cayó el nacimiento
        diaSemana = fechaNacimiento.getDayOfWeek().getDisplayName(TextStyle.FULL, new Locale("es", "ES"));

        // 3.- Recorremos desde el año posterior al año de nacimiento hasta el año actual (bucle)
        DateTimeFormatter formato = DateTimeFormatter.ofPattern(FORMATO_FECHA);

        System.out.printf("¿Cuantas veces ha caido tu cumpleaños en %s?\n\n", diaSemana);

        do {

            /*
             * Ahora se va a procesar la información. Vamos a ir añadiendo 1 año a la fecha
             * de nacimiendo en cada iteración y comprobando si el día de la semana coincide.
             */
            contAnio++;
            anioSiguiente = fechaNacimiento.plus(contAnio, ChronoUnit.YEARS);
            diaSemanaAnio = anioSiguiente.getDayOfWeek().getDisplayName(TextStyle.FULL, new Locale("es", "ES"));

            /*
             * Comprobamos si coincide el día de la semana, pero solo si la fecha es el 29 de Febrero y el año que comprobamos es bisiesto,
             * si el año de nacimiento es bisiesto pero no es 29 de Febrero, o si no es bisiesto.
             */
            if ((esBisiesto && mes == 2 && dia == 29 && anioSiguiente.isLeapYear()) || (esBisiesto && (dia != 29 || mes != 2)) || !esBisiesto) {
                if (diaSemanaAnio.equals(diaSemana)) {
                    numeroCoincidencias++;
                    fechasCoincidencia += "\n" + numeroCoincidencias + ". " + anioSiguiente.format(formato);
                }
            }

        } while (anioSiguiente.getYear() != fechaActual.getYear());

        // 4.- Mostramos por pantalla el número de coincidencias
        System.out.printf("\nEl día que naciste fue %s.\n", diaSemana);
        System.out.printf("----------------------------------------------\n");
        System.out.printf("%s\n\n", fechasCoincidencia);
        System.out.printf("El número de coincidencias es: %d\n", numeroCoincidencias);
    }
}
