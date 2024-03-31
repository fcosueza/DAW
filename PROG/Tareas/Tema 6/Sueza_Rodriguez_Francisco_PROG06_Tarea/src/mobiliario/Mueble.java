package mobiliario;

/**
 * Clase asbtracta que representa una entidad de tipo mueble.
 *
 * Clase abstracta que sirve como base para la creación de muebles. Se encarga
 * de almacenar el ID de cada mueble, el precio de este, comprobando que este
 * dentro de unos limites, así como la descripción del mueble, proporcionando
 * métodos get para obetener dicha información.
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
     * En caso de que el precio no este dentro del rango
     * especifidado por MAX_PRECIO y MIN_PRECIO, se lanza una excepción de
     * tipo IllegalArgumentException.
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

    /**
     * Método que devuelve una cadena con la información del objeto.
     *
     * Este método devuelve una cadena formateada con la información del
     * objeto en el formato <code>Tipo:XXX Id:YYY Precio:ZZZ,ZZ Descripción:VVV</code>
     * donde XXX es el tipo de mueble, YYY su identificado, ZZZ.ZZ su precio con
     * 2 decimales y VVV su descripción.
     *
     * @return Cadena de caractéres con toda la información del objeto formateada
     */
    @Override
    public String toString() {
        return String.format("Tipo: %s Id: %d Precio: %f.2 Descripcion: %s",
                this.getClass().getCanonicalName(),
                this.muebleID,
                this.precio,
                this.descripcion);
    }

}
