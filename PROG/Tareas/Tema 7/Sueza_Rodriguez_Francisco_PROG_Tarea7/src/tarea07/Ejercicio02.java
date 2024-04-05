package tarea07;

import java.util.ArrayList;
import java.util.HashSet;
import java.util.Iterator;

/**
 * Ejercicio 2. Búsqueda de especies de plantas populares
 *
 * @author Francisco Sueza Rodríguez
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

        // Variables auxiliares
        Iterator<String> itLista1;
        Iterator<String> itLista2;

        int posicion = 0;

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
        // Asignamos los iteradores
        itLista1 = lista1.iterator();
        itLista2 = lista2.iterator();

        // Recorremos las listas con los iteradores
        while (itLista1.hasNext() && itLista2.hasNext()) {
            String planta = itLista1.next();

            if (planta.equals(itLista2.next())) {
                plantasPopulares.add(planta);
                posicionesPopulares.add(posicion + 1);
                conjuntoPlantasPopulares.add(planta);

                lista1.set(posicion, "*" + planta + "*");
                lista2.set(posicion, "*" + planta + "*");
            }

            posicion++;
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
