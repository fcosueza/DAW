package tarea07;

import java.time.LocalDate;
import java.util.TreeMap;

/**
 * Ejercicio 3. Calendario de especies de plantas
 *
 * @author Francisco Sueza Rodríguez
 */
public class Ejercicio03 {

    public static void main(String[] args) {

        //----------------------------------------------
        //    Declaración de variables y constantes
        //----------------------------------------------
        // Constantes
        final int CANTIDAD_ESPECIES_PLANTA = 5;

        // Variables de entrada
        TreeMap<LocalDate, String> plantas = new TreeMap<>();
        LocalDate fecha = LocalDate.now();

        // Variables auxiliares
        String planta;

        //----------------------------------------------
        //               Entrada de datos
        //----------------------------------------------
        // No se piden datos al usuario, ya que se usa un número fijo de elementos aleatorios
        System.out.println("CALENDARIO DE ESPECIES DE PLANTAS");
        System.out.println("---------------------------------");

        //----------------------------------------------
        //                  Procesamiento
        //----------------------------------------------
        do {
            planta = Utilidades.especiePlantaAleatoria();

            if (!plantas.containsValue(planta)) {
                plantas.put(fecha, planta);
                fecha = fecha.plusDays(1);
            }

        } while (plantas.size() != CANTIDAD_ESPECIES_PLANTA);

        //----------------------------------------------
        //           Salida de resultados
        //----------------------------------------------
        // Recorremos la estructura usando iteradores con for each y mostramos los resultados
        for (LocalDate dia : plantas.keySet()) {
            System.out.printf("Fecha %s: %s \n", dia, plantas.get(dia));
        }
    }
}
