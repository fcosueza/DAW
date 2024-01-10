package tarea03;

import java.util.Random;
import libtarea3.Dado;

/**
 * Ejercicio 2: Uso de la clase Dado
 *
 * @author Profe
 */
public class Ejercicio02 {

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables
        //----------------------------------------------
        //Constantes
        final int LIMITE_INFERIOR = 30;
        final int LIMITE_SUPERIOR = 60;

        // Variables de entrada (dados y puntuación máxima)
        Dado dado1;
        Dado dado2;
        Dado dado3;

        Random generador = new Random();

        int puntuacionMaxima = 0;

        // Variables de salida
        String tablaTiradas = "";
        String textoGanador = "";
        String historialGanador = "";

        int tiradaGanador = 0;
        long puntuacion = 0;

        // Variables auxiliares
        int tiradaDado1 = 0;
        int tiradaDado2 = 0;
        int tiradaDado3 = 0;

        //----------------------------------------------
        //                Entrada de datos
        //----------------------------------------------
        //En realidad no hay entrada de datos como tal, pero podemos considerar
        //el número máximo como información de entrada ya que variará el
        //comportamiento del programa.
        //1. Cálculo del número aleatorio de puntos (entre 30 y 60)
        puntuacionMaxima = LIMITE_INFERIOR + (generador.nextInt(LIMITE_SUPERIOR - LIMITE_INFERIOR) + 1);

        //----------------------------------------------
        //                 Procesamiento
        //----------------------------------------------
        //2. Creación de 3 dados (jugadores) de 6 caras
        dado1 = new Dado();
        dado2 = new Dado();
        dado3 = new Dado();

        //3. Lanzamiento de los dados y acumulación de las puntuaciones
        do {

            // Alacenamos la tirada de cada dado para procesarlas
            tiradaDado1 = dado1.lanzar();
            tiradaDado2 = dado2.lanzar();
            tiradaDado3 = dado3.lanzar();

            // Creamos la tabla de lanzamientos que se mostrará al final de la ejecución
            tablaTiradas += "Lanzamiento nº " + dado1.getNumeroLanzamientos() + ": ";

            tablaTiradas += " " + tiradaDado1 + "\t";
            tablaTiradas += "  " + tiradaDado2 + "\t";
            tablaTiradas += tiradaDado3;
            tablaTiradas += "\n";

            // Sumamos las puntuaciones historicas de cada dado para ver si hemos superado la puntuación máxima
            puntuacion = dado1.getSumaPuntuacionHistorica() + dado2.getSumaPuntuacionHistorica() + dado3.getSumaPuntuacionHistorica();

        } while (puntuacion < puntuacionMaxima);

        /*
         * Una vez que hemos superado la puntuación máxima, comprobamos en la última
         * tirada cual ha sido la puntuación más alta y establecemos el textoGanador.
         * Para ello establecemos como textoGanador el dado 1 y comparamos con las tiradas de
         * los otros dos, cambiado la tirada ganadora y el texto del textoGanador si alguno supera
         * su tirada.
         */
        tiradaGanador = tiradaDado1;
        textoGanador = "dado 1";
        historialGanador = dado1.getSerieHistoricaLanzamientos();

        if (tiradaDado2 > tiradaGanador) {
            textoGanador = "dado 2";
            tiradaGanador = tiradaDado2;
            historialGanador = dado2.getSerieHistoricaLanzamientos();
        } else if (tiradaDado3 > tiradaGanador) {
            textoGanador = "dado 3";
            tiradaGanador = tiradaDado3;
            historialGanador = dado3.getSerieHistoricaLanzamientos();

        }

        //3.1 Lanzamos cada uno de los dados y mostramos las puntuaciones
        //Utilizamos los métodos de la clase para contar los lanzamientos
        //3.2 Utilizando los métodos de la clase, acumulamos las puntuaciones
        //de todos los dados en todos los lanzamientos.
        //4. Comprobación de cuál de los dados ha sido el textoGanador y consulta de
        //todas sus tiradas
        //----------------------------------------------
        //      Salida de resultados
        //----------------------------------------------
        System.out.println("LANZAMIENTO DE DADOS");
        System.out.println("----------------------------------------");

        System.out.printf("Puntuación Máxima: %d\n\n", puntuacionMaxima);
        System.out.printf("\t\t Dado1  Dado2  Dado3\n\n");
        System.out.printf("%s\n\n", tablaTiradas);

        System.out.printf("Juego terminado. La suma de los lanzamientos es: %d\n", puntuacion);
        System.out.printf("El ganador es el %s con una puntuación de %d en la última tirada.\n", textoGanador, tiradaGanador);
        System.out.printf("El valor %d ha salido %d veces en todo el juego y se han realizado un total de %d lanzamientos.\n",
                tiradaGanador, Dado.getNumeroVecesCaraGlobal(tiradaGanador), Dado.getNumeroLanzamientosGlobal());
        System.out.printf("Todos los lanzamientos del %s: %s.\n", textoGanador, historialGanador);

    }
}
