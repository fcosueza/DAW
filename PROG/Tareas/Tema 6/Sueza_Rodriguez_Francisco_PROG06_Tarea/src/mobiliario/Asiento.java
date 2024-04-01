package mobiliario;

/**
 * Clase que representa un Mueble de tipo Asiento.
 *
 * Clase que representa un mueble de tipo Asiento. Esta clase hereda de la clase Mueble
 * y añade varios atributos característicos de los Asientos, como el número de plazas, el color
 * y la tapicería.
 *
 * @author Francisco Sueza Rodríguez
 */
public abstract class Asiento extends Mueble {

    /**
     * Número minimo de plazas del asiento.
     *
     * @value 1
     */
    public static final int MIN_PLAZAS = 1;

    /**
     * Número máximo de plazas del asiento.
     *
     * @value 9
     */
    public static final int MAX_PLAZAS = 9;

    /**
     * Número entero positivo con el número de plazas del asiento.
     */
    private final int numeroPlazas;

    /**
     * Cadena de caracteres que el tipo de tapicería del mueble.
     */
    private String tapiceria;

    /**
     * Cadena de caracteres que representa el color del asiento.
     */
    private String color;

    /**
     * Contructor de la clase Asiento.
     *
     * Constructor que crea un objeto de la clase Asiento. Recibe todos los parámetros necesarios
     * incluidos en el constructor de la clase Mueble más el número de plazas, la tapicería y el
     * color. Si las plazas no se encuentra en el rango permitido, definido por MIN_PLAZAS y
     * MAX_PLAZAS, lanza una excepción de tipo IllegalArgumentException.
     *
     * @param precio Precio del mueble en euros
     * @param descripcion Descripción detallada del asiento
     * @param plazas Número de plazas del asiento
     * @param tapiceria Tipo de tapicería del asiento
     * @param color Color del asiento
     * @throws IllegalArgumentException Si el número de plazas esta fuera de rango
     */
    public Asiento(double precio, String descripcion, int plazas, String tapiceria, String color) throws IllegalArgumentException {
        super(precio, descripcion);

        if (plazas < MIN_PLAZAS || plazas > MAX_PLAZAS) {
            throw new IllegalArgumentException(String.format("El número de plazas no está en el rango permitido: %d", plazas));
        }

        this.numeroPlazas = plazas;
        this.tapiceria = tapiceria;
        this.color = color;
    }

    /**
     * Método que devuelve el número de plazas del asiento.
     *
     * Devuelve un entero con el número de plazas del asiento que estará dentro del
     * rango definido por MIN_PLAZAS y MAX_PLAZAS
     *
     * @return Entero positivo con el número de plazas del asiento
     */
    public int getNumeroPlazas() {
        return numeroPlazas;
    }

    /**
     * Método que devuelve el tipo de tapicería del asiento.
     *
     * Devuelve una cadena con el tipo de tapicería que tiene el asiento.
     *
     * @return Cadena con el tipo de tapicería del asiento
     */
    public String getTapiceria() {
        return tapiceria;
    }

    /**
     * Método que devuelve el color del asiento.
     *
     * Devuelve una cadena con el color de asiento.
     *
     * @return Cadena con el color del asiento
     */
    public String getColor() {
        return color;
    }

    /**
     * Método que devuelve la información del asiento formateada.
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

        return String.format("%s Tapiceria: %s Color: %s Numero de Plazas: %d",
                muebleString,
                this.tapiceria,
                this.color,
                this.numeroPlazas);
    }
}
