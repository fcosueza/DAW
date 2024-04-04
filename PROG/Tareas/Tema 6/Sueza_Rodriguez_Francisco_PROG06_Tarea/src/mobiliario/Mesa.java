package mobiliario;

/**
 * Clase que define un mueble de tipo Mesa.
 *
 * Se define un tipo de mueble Mesa, que deriva de Mueble
 * y que además de todas las características de mueble, se añaden
 * algunas propias de la mesa, como es la forma y el número de comensales
 * que puede albergar ésta.
 *
 * @author Francisco Sueza Rodríguez
 */
public final class Mesa extends Mueble {

    /**
     * Numero mínimo de comensales que puede tener una mesa
     *
     * {@value}
     */
    public static final int MIN_COMENSALES = 1;

    /**
     * Número maximo de comensales que puede tener una mesa.
     *
     * {@value}
     */
    public static final int MAX_COMENSALES = 6;

    // Cadena con el tipo de la mesa ("cuadrada", "ovalada", etc..)
    private String forma;

    // Numero de comensales que puede albergar la mesa
    private int numeroComensales;

    /**
     * Contructor de la clase Mesa.
     *
     * Crea un objeto de la clase Mesa derivada de la clase Mueble.
     * Acepta todos los parametros de Mueble, además de los propios de la
     * clase Mesa como es la forma de la mesa y el número de comensales. Comprueba
     * si el número de comensales esta dentro del rango definido por MIN_COMENSALES y
     * MAX_COMENSALES, lanzando una excepción IllegalArgumentException si no esta dentro
     * de este rango.
     *
     * @param precio Precio de la mesa en euros
     * @param descripcion Descripción detallada de la mesa
     * @param forma Forma de mesa ("redonda", "cuadrada", etc..)
     * @param comensales Numero de comensales que puede albergar la mesa
     * @throws IllegalArgumentException Si el número de comensales esta fuera de rango
     */
    public Mesa(double precio, String descripcion, String forma, int comensales) throws IllegalArgumentException {
        super(precio, descripcion);

        if (comensales < MIN_COMENSALES || comensales > MAX_COMENSALES) {
            throw new IllegalArgumentException(String.format(
                    "Los comensales no estan dentro del rango permitido: %d",
                    comensales));
        }

        this.numeroComensales = comensales;
        this.forma = forma;
    }

    /**
     * Método que devuelve el número de comensales.
     *
     * Método que devuelve un entero con el número de comensales
     * que puede albergar la mesa.
     *
     * @return Entero con el número de comensales
     */
    public int getComensales() {
        return numeroComensales;
    }

    /**
     * Método que devuelve la forma de la mesa.
     *
     * Método que devuelve una cadena con la forma de la mesa
     * donde se llama, pudiendo ser "redonda", "cuadrada", "ovalada", etc..
     *
     * @return Cadena con la forma de la mesa.
     */
    public String getForma() {
        return forma;
    }

    /**
     * Método que devuelve la información de la mesa formateada.
     *
     * Este método crea una cadena formateada con la información del asiento,
     * usando para ello también el método toString de la clase padre y añadiendo
     * varios campos específicos de la clase asiento.
     *
     * @return Cadena formateada con la información del asiento.
     */
    @Override
    public String toString() {
        String muebleString = super.toString();

        return String.format("%s Forma: %s Comensales: %d",
                muebleString,
                this.forma,
                this.numeroComensales);
    }

}
