package mobiliario;

/**
 * Clase que define un elemento de tipo Armario.
 *
 * Se define la clase Armario que es un tipo de Almacenaje, que además
 * de tener todos los atributos de un almacenaje añader los atributos para
 * gestionar el número de puertas que puede tener.
 *
 * @author Francisco Sueza Rodríguez
 */
public final class Armario extends Almacenaje {

    /**
     * Numero mínimo de puertas que puede tener un armario.
     *
     * {@value}
     */
    public static final int MIN_PUERTAS = 1;

    /**
     * Número máximo de puertas que puede tener un armario
     *
     * {@value}
     */
    public static final int MAX_PUERTAS = 6;

    // Numero de puertas que tiene el armario
    private int numeroPuertas;

    /**
     * Constructor de la clase Armario.
     *
     * Constructor que crea un objeto de tipo estanteria, derivado de la clase Mueble.
     * Este acepta todos los parametros de la clase Mueble además del parametro tipo, una
     * cadena de caracteres que define el tipo de estantería que es ("de pared", "de suelo", etc.
     *
     * @param precio Precio del armario en euros
     * @param descripcion Descripción detallada del armario
     * @param anchura Anchura del armario en cm
     * @param altura Altura del almario en cm
     * @param maxModulos Numero máximo de modulos que acepta el armario
     * @param numPuertas Numero de puertas que tiene el armario
     * @throws IllegalArgumentException Se lanza si el numero de puertas esta fuera de rango
     */
    public Armario(double precio, String descripcion, double anchura, double altura, int maxModulos, int numPuertas)
            throws IllegalArgumentException {

        super(precio, descripcion, anchura, altura, maxModulos);

        if (numPuertas < MIN_PUERTAS || numPuertas > MAX_PUERTAS) {
            throw new IllegalArgumentException(String.format(
                    "No se puede crear el Armario. El número de puertas no está en el rango permitido: %d",
                    numPuertas));
        }

        this.numeroPuertas = numPuertas;
    }

    /**
     * Método que devuelve el número de puertas.
     *
     * Método que devuelve el número de puertas que tiene el armario
     * donde se llama el método.
     *
     * @return Entero con el número de puertas del armario
     */
    public int getNumPuertas() {
        return numeroPuertas;
    }

    /**
     * Método que devuelve una cadena con información del armario.
     *
     * Este método crea una cadena formateada con información sobre el amario
     * donde se llama. Hace uso del método toString de la clase padre Almacenaje y añade
     * información especifica del armario, en concreto el numero de puertas.
     *
     * @return Cadena formateada con información del armario
     */
    @Override
    public String toString() {
        String almacenString = super.toString();

        return String.format("%s Numero de puertas: %d",
                almacenString,
                this.numeroPuertas);
    }

}
