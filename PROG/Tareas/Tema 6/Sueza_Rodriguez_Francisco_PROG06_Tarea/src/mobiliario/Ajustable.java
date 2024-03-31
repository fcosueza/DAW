package mobiliario;

/**
 * Interfaz que establece los métodos para ajustar un mueble.
 *
 * Esta interfaz establece diferentes métodos para cambiar y obtener la posición
 * de un mueble que permita regular su posición, permitiendo obtener la posición
 * actual así como subir o bajar el mueble indicando un entero con el incremento
 * o decremento de la posición de éste.
 *
 * @author Francisco Sueza Rodríguez
 */
public interface Ajustable {

    /**
     * Método que devuelve la posición actual de un mueble.
     *
     * Este método devuelve un entero con la posición en la que se encuentra
     * actualmente un mueble que permita su regulación.
     *
     * @return Entero con la posición actual del mueble
     */
    public int obtenerPosicion();

    /**
     * Método que permite subir la posición de un mueble.
     *
     * El método debe permitir aumentar la posición de un mueble, para ello,
     * recibirá un entero que incrementará la posición actual del mueble.
     *
     * @param posicion Entero con el incremento de la posición del mueble
     * @return Un entero con la nueva posición del mueble
     * @throws IllegalStateException Se lanza si el estado del mueble no es correcto
     */
    public int subirPositicion(int posicion) throws IllegalStateException;

    /**
     * Método que permite baja la posición de un mueble.
     *
     * El método debe permitir disminuir la posición de un mueble, para ello,
     * recibirá un entero que decrementará la posición actual del mueble.
     *
     * @param posicion Entero con el decremento de la posición del mueble
     * @return Un entero con la nueva posición del mueble
     * @throws IllegalStateException Se lanza si el estado del mueble no es correcto
     */
    public int bajarPosicion(int posicion) throws IllegalStateException;
}
