package mobiliario;

/**
 * Clase asbtracta que representa una entidad de tipo mueble.
 *
 * @author Francisco Sueza Rodríguez
 */
public abstract class Mueble {

    // Variable de clase para la asgianación del número de ID
    private static int listaIds = 1;

    /**
     * Precio mínimo que puede tener un mueble en euros
     *
     * @value 0.01
     */
    public static final double MIN_PRECIO = 0.01;

    /**
     * Precio máximo que puede tener un mueble en euros
     *
     * @value 10000.00
     */
    public static final double MAX_PRECIO = 10000.00;

    // Variable inmutable privada con el ID del mueble
    private final int muebleID;

    // Variable inmutable privada con la descripción del mueble
    private String descripcion;

    /**
     * Precio final del mueble en euros
     */
    protected double precio;

    /**
     * Constructor de la clase mueble.
     *
     * Constructor que crea un objeto de la clase Mueble, comprobando que el
     * precio pasado esta dentro del rango permititido y asignando un ID al
     * objeto creado. El precio introducido se redondeará a 2 digitos decimales
     * antes de almacenarlo.
     *
     * @param precio Precio del mueble en euros
     * @param descripcion Cadena con la descripción detallada del mueble
     * @throws IllegalArgumentException Se lanza si el precio no está dentro del
     * rango permitido
     */
    public Mueble(int precio, String descripcion) throws IllegalArgumentException {
        if (precio < MIN_PRECIO || precio > MAX_PRECIO) {
            throw new IllegalArgumentException(String.format("El precio no está dentro del rango permitido: %d.2", precio));
        }

        this.precio = Math.round(precio * 100) / 100;
        this.descripcion = descripcion;
        this.muebleID = listaIds;

        listaIds++;
    }

    /**
     * Método que devuelve el ID de un mueble.
     *
     * Devuelve un entero con el ID del mueble al que se le pasa
     * el mensaje.
     *
     * @return Valor entero con el ID del mueble
     */
    public int getId() {
        return this.muebleID;
    }

    /**
     * Método que devuelve el precio de un mueble.
     *
     * Devuelve el precio de un mueble de tipo double y con solo
     * 2 dígitos decimales.
     *
     * @return Valor double con el precio del mueble
     */
    public double getPrecio() {
        return this.precio;
    }

    /**
     * Método que devuelve la descripción detallada de un mueble.
     *
     * Devuelve un objeto de tipo String con la descripción detallada
     * del mueble donde se llama.
     *
     * @return Cadena de carácteres con la descripción del mueble
     */
    public String getDescripcion() {
        return this.descripcion;
    }

}
