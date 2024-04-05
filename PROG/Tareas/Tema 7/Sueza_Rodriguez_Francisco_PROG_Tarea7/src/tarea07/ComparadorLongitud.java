package tarea07;

import java.util.Comparator;

/**
 * Clase ComparadorLongitud.
 *
 * Clase que define un comparador para usar con Collection.sort y
 * ordenar las espcies de plantas por la longitud de cadena.
 *
 * @author Francisco Sueza Rodríguez
 */
public class ComparadorLongitud implements Comparator<String> {

    /**
     * Método compare que realiza la comparación.
     *
     * Este método sobreescribe el método compare de la interfaz
     * Comparator. El método compara 2 cadenas según su tamaño, realizando
     * una comparación con el método length de los objetos String.
     *
     * @param planta1 Primera cadena que se quiere comparar
     * @param planta2 segunda cadena que se quiere comparar
     *
     * @return Devuelve 1 si la primera cadena es mayor, -1 si es la segunda y 0 si son iguales
     */
    @Override
    public int compare(String planta1, String planta2) {
        int result = 0;

        if (planta1.length() > planta2.length()) {
            result = 1;
        } else if (planta1.length() < planta2.length()) {
            result = -1;
        }

        return result;
    }
}
