package tarea07;

import java.util.ArrayList;
import java.util.HashSet;

/**
 * Ejercicio 2. Búsqueda de especies de plantas populares
 *
 * @author Profesor
 */
public class Ejercicio02 {

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables
        //----------------------------------------------
        // Constantes
        final int CANTIDAD_ESPECIES_PLANTA = 10;

        // Variables de entrada
        ArrayList<String> lista1 = new ArrayList<>();
        ArrayList<String> lista2 = new ArrayList<>();

        // Variables de salida
        ArrayList<String> plantasPopulares = new ArrayList<>();
        ArrayList<Integer> posicionesPopulares = new ArrayList<>();
        HashSet<String> conjuntoPlantasPopulares = new HashSet<>();

        //----------------------------------------------
        //               Entrada de datos
        //----------------------------------------------
        System.out.println("BÚSQUEDA DE ESPECIES DE PLANTAS POPULARES");
        System.out.println("-----------------------------------------");

        // Rellenamos las listas con las especies de plantas
        do {
            lista1.add(Utilidades.especiePlantaAleatoria());
            lista2.add(Utilidades.especiePlantaAleatoria());
        } while (lista1.size() != CANTIDAD_ESPECIES_PLANTA);

        // Mostamos las listas iniciales
        System.out.printf("1. Contenido inicial de la lista 1: %s\n", lista1.toString());
        System.out.printf("2. Contenido inicial de la lista 2: %s\n", lista2.toString());
        System.out.println("");

        //----------------------------------------------
        //               Procesamiento
        //----------------------------------------------

        /*
         * Recorremos los dos ArrayList usando un bucle for, ya que
         * necesitamos obtener la posición de los elementos para
         * modificarlos en los ArrayList y añadirlos a las posiciónes populares.
         *
         * Esto se podría hacer con ListIterator, pero como no lo hemos visto en el tema,
         * no tengo claro que se pueda usar.
         */
        for (int i = 0; i < CANTIDAD_ESPECIES_PLANTA; i++) {
            String planta = lista1.get(i);

            if (planta.equals(lista2.get(i))) {
                plantasPopulares.add(planta);
                posicionesPopulares.add(i + 1);
                conjuntoPlantasPopulares.add(planta);

                lista1.set(i, "*" + planta + "*");
                lista2.set(i, "*" + planta + "*");
            }
        }
        //----------------------------------------------
        //            Salida de resultados
        //----------------------------------------------

        // Mostramos el resultado final
        System.out.printf("1. Contenido final de la lista 1: %s\n", lista1.toString());
        System.out.printf("2. Contenido final de la lista 2: %s\n", lista2.toString());
        System.out.printf("3. Contenido final de la lista de especies populares: %s\n", plantasPopulares.toString());
        System.out.printf("4. Contenido final de la lista de posiciones populares: %s\n", posicionesPopulares.toString());
        System.out.printf("5. Contenido final del conjunto de especies populares: %s\n", conjuntoPlantasPopulares.toString());

    }
}
