package tarea07;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;

/**
 * Ejercicio 4. Clasificación de especies de plantas coincidentes
 * (con el mismo nombre y en la misma posición)
 *
 * @author Profesor
 */
public class Ejercicio04 {

    public static void main(String[] args) {

        //----------------------------------------------
        //    Declaración de variables y constantes
        //----------------------------------------------
        // Constantes
        final int CANTIDAD_ESPECIES_PLANTA = 20;

        // Variables de entrada
        List<String> listaPlantas1 = new ArrayList<>();
        List<String> listaPlantas2 = new ArrayList<>();

        // Variables auxiliares
        Iterator<String> itLista1;
        Iterator<String> itLista2;

        int posicion = 0;

        // Variables de salida
        HashMap<String, List<Integer>> clasificacion = new HashMap<>();

        //----------------------------------------------
        //               Entrada de datos
        //----------------------------------------------
        // No se piden datos al usuario, ya que se usa un número fijo de elementos aleatorios
        System.out.println("CLASIFICACIÓN DE COINCIDENTES");
        System.out.println("-----------------------------");

        // Rellenamos las listas
        do {
            listaPlantas1.add(Utilidades.especiePlantaAleatoria());
            listaPlantas2.add(Utilidades.especiePlantaAleatoria());
        } while (listaPlantas1.size() != CANTIDAD_ESPECIES_PLANTA);

        //----------------------------------------------
        //                 Procesamiento
        //----------------------------------------------
        // Asignamos los iteradores
        itLista1 = listaPlantas1.iterator();
        itLista2 = listaPlantas2.iterator();

        // Recorremos las listas con los iteradores y comprobamos las coincidencias
        while (itLista1.hasNext() && itLista2.hasNext()) {
            String planta = itLista1.next();

            if (planta.equals(itLista2.next())) {
                if (!clasificacion.containsKey(planta)) {
                    clasificacion.put(planta, new ArrayList<>());
                }

                clasificacion.get(planta).add(posicion + 1);
            }

            posicion++;
        }
        //----------------------------------------------
        //            Salida de resultados
        //----------------------------------------------
        System.out.printf("Contenido inicial de la lista 1:\n%s\n", listaPlantas1.toString());
        System.out.printf("Contenido inicial de la lista 2: \n%s\n", listaPlantas2.toString());
        System.out.println("\n");

        System.out.printf("Coincidencias: \n%s\n", clasificacion.toString());

    }
}
