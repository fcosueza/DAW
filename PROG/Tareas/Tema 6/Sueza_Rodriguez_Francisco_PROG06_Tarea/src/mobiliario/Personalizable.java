package mobiliario;

/**
 * Interfaz que establece los métodos para personalizar un mueble.
 *
 * Algunos muebles permiten la personalización, es decir, añadir o quitar
 * diferentes módulos. Esta interfaz define un conjunto de métodos que deben
 * implementar este tipo de muebles, permitiendo obtener la lista de módulos que tiene
 * instalados un mueble así como añadir o quitar nuevos.
 *
 * @author Francisco Sueza Rodríguez
 */
public interface Personalizable {

    /**
     * Método que permite obtener los módulos instalados en un mueble.
     *
     * Este método devuelve una cadena formateada con la lista de
     * módulos que tiene un mueble instalados en ese momento.
     *
     * @return Cadena formateada con la lista de módulos
     */
    public String obtenerModulos();

    /**
     * Método que permite añadir un módulo a un mueble.
     *
     * Este método permite añadir un módulo a un mueble que sea personalizable.
     * El método recibe un elemento de tipo <code>Modulo</code> y lo añade al
     * mueble al que se le manda el mensaje. Puede devolver dos excepciones dependiendo
     * de si el mueble se encuentra en un estado incorrecto o si le pasamos un objeto null.
     *
     * @param modulo Elemento de tipo Modulo que queremos añadir al mueble
     * @throws IllegalStateException En caso de que el mueble se encuentre en un estado incorrecto
     * @throws NullPointerException En caso de que el modulo sea nulo
     */
    public void anyadirModulo(Modulo modulo) throws IllegalStateException, NullPointerException;

    /**
     * Método que permite añadir un módulo a un mueble.
     *
     * Este método permite extraer un módulo a un mueble que sea personalizable.
     * El método recibe un elemento de tipo <code>Modulo</code> y lo extrae del
     * mueble al que se le manda el mensaje. Puede devolver una excepcion dependiendo
     * de si el mueble se encuentra en un estado incorrecto.
     *
     * @param modulo Elemento de tipo Modulo que queremos extraer del mueble
     * @throws IllegalStateException En caso de que el mueble se encuentre en un estado incorrecto
     */
    public Modulo extraerModulo() throws IllegalStateException;

}
