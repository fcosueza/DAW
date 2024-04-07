package tarea07;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

/**
 * Ejercicio 5. Ordenación de especies de plantas (por nombre y longitud)
 *
 * @author Francisco Sueza Rodríguez
 */
public class Ejercicio05 {

    public static void main(String[] args) {

        //----------------------------------------------
        //    Declaración de variables y constantes
        //----------------------------------------------
        // Constantes
        final int CANTIDAD_ESPECIES_PLANTAS = 5;

        // Variables de entrada
        List<String> especiesPlantas = new ArrayList<>();

        // Variables auxiliares
        String planta;
        int posicion = 1;

        //----------------------------------------------
        //               Entrada de datos
        //----------------------------------------------
        // No se piden datos al usuario, ya que se usa un número fijo de elementos aleatorios
        System.out.println("ORDENACIÓN DE ESPECIES DE PLANTAS");
        System.out.println("---------------------------------");

        // Poblamos la lista con los nombres de especiesPlantas
        do {
            planta = Utilidades.especiePlantaAleatoria();

            if (!especiesPlantas.contains(planta)) {
                especiesPlantas.add(planta);
            }

        } while (especiesPlantas.size() != CANTIDAD_ESPECIES_PLANTAS);
        //----------------------------------------------
        //     Procesamiento + Salida de resultados
        //----------------------------------------------

        // Mostramos la lista inicial
        for (String especie : especiesPlantas) {
            System.out.printf("%d. %s\n", posicion, especie);
            posicion++;
        }

        // Ordenamos por nombre
        Collections.sort(especiesPlantas, new ComparadorNombre());
        System.out.println("\n");
        posicion = 1;

        // Mostramos la lista ordenada por nombre
        for (String especie : especiesPlantas) {
            System.out.printf("%d. %s\n", posicion, especie);
            posicion++;
        }

        // Ordenamos por longitud de cadena
        Collections.sort(especiesPlantas, new ComparadorLongitud());
        System.out.println("\n");
        posicion = 1;

        // Mostramos la lista ordenada por longitud
        for (String especie : especiesPlantas) {
            System.out.printf("%d. %s\n", posicion, especie);
            posicion++;
        }
    }
}
