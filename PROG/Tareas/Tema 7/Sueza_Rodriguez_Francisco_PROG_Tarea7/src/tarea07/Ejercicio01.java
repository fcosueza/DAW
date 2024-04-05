package tarea07;

import java.util.HashSet;
import java.util.Set;

/**
 * Ejercicio 1. Creando jardín botánico
 *
 * @author Francisco Sueza Rodríguez
 */
public class Ejercicio01 {

    public static void main(String[] args) {

        //----------------------------------------------
        //          Declaración de variables
        //----------------------------------------------
        // Constantes
        final int CANTIDAD_ESPECIES_PLANTAS = 5;

        // Variables de entrada
        Set<String> conjunto1 = new HashSet<>();
        Set<String> conjunto2 = new HashSet<>();

        // Variables de salida
        Set<String> union;
        Set<String> interseccion;
        Set<String> diferencia;

        //----------------------------------------------
        //                Entrada de datos
        //----------------------------------------------
        // No hay, pues se usa un número fijo de elementos aleatorios
        System.out.println("CONJUNTOS DE ESPECIES DE PLANTAS");
        System.out.println("--------------------------------");

        //----------------------------------------------
        //                  Procesamiento
        //----------------------------------------------
        // Rellenamos con conjuntos con especies aleatorias de plantas
        do {

            if (conjunto1.size() != CANTIDAD_ESPECIES_PLANTAS) {
                conjunto1.add(Utilidades.especiePlantaAleatoria());
            }

            if (conjunto2.size() != CANTIDAD_ESPECIES_PLANTAS) {
                conjunto2.add(Utilidades.especiePlantaAleatoria());
            }
        } while (conjunto1.size() + conjunto2.size() != CANTIDAD_ESPECIES_PLANTAS * 2);

        // Inicializamos los array resultado
        union = new HashSet<>(conjunto1);
        interseccion = new HashSet<>(conjunto1);
        diferencia = new HashSet<>(conjunto2);

        // Unión de los dos conjuntos
        union.addAll(conjunto2);

        // Intersección de los conjuntos
        interseccion.retainAll(conjunto2);

        // Diferencia de los conjuntos
        diferencia.removeAll(conjunto1);
        //----------------------------------------------
        //              Salida de Resultados
        //----------------------------------------------

        // Recorremos el conjunto y mostramos su contenido por pantalla
        System.out.printf("Conjunto C1: %s\n", conjunto1.toString());
        System.out.printf("Conjunto C2: %s\n", conjunto2.toString());
        System.out.printf("Union de C1 y C2: %s\n", union.toString());
        System.out.printf("Interseccion de C1 y C2: %s\n", interseccion.toString());
        System.out.printf("Diferencia de C2 - C1: %s\n", diferencia.toString());
    }
}
