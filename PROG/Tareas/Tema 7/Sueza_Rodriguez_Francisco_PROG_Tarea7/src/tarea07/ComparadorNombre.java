package tarea07;

import java.util.Comparator;

/**
 * Clase ComparadorLongitud.
 *
 * Clase que define un comparador para usar con Collection.sort y
 * ordenar las espcies de plantas por orden alfabético.
 *
 * @author Francisco Sueza Rodríguez
 */
public class ComparadorNombre implements Comparator<String> {

    /**
     * Método compare que realiza la comparación.
     *
     * Este método sobreescribe el método compare de la interfaz
     * Comparator. Para comprar las cadenas vamos a usar el método
     * compareTo, ya que este devuelve los valores que necesitamos
     * para realizar la comparación.
     *
     * @param planta1 Primera cadena que se quiere comparar
     * @param planta2 segunda cadena que se quiere comparar
     *
     * @return Devuelve 1 si la primera cadena es mayor, -1 si es la segunda y 0 si son iguales
     */
    @Override
    public int compare(String planta1, String planta2) {
        return planta1.compareTo(planta2);
    }
}
