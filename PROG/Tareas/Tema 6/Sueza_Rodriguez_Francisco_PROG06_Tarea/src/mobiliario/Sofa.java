package mobiliario;

/**
 * Clase que define un mueble de tipo Sofa.
 *
 * Se define un mueble de tipo Sofa, perteneciente a la clase
 * Asiento. Este tipo de mueble, además de poseer todas las características
 * de un Asiento, añade una cadena con la composición del sofa, que será del tipo
 * "3+2", "3+CHAISLONGE", ..etc. La cadena con la composición del sofa puede ser
 * nula o la cadena vacía.
 *
 * @author Francisco Sueza Rodríguez
 */
public final class Sofa extends Asiento {

    // Cadena que almacena la composicion del sofa
    private String composicion;

    /**
     * Constructor de la clase Sofa.
     *
     * Crea un objeto de la clase Sofa, recibiendo como parametros todos los atributos
     * de la clase Asiento además de la composición del sofa, que será una cadena de caracteres
     * la cual puede ser nula o vacía.
     *
     * @param precio Valor double con el precio del sofa
     * @param descripcion Cadena con la descripción detallada del sofa
     * @param plazas Valor entero con el número de plazas del sofa
     * @param tapiceria Cadena con el tipo de tapicería del sofa
     * @param color Cadena con el color del sofa
     * @param composicion Cadena con la composición del sofa, que puede ser nula o vacía
     */
    public Sofa(double precio, String descripcion, int plazas, String tapiceria, String color, String composicion) {
        super(precio, descripcion, plazas, tapiceria, color);

        this.composicion = composicion;
    }

    /**
     * Método que devuelve la composición del Sofa.
     *
     * Este método devuelve una cadena con la composición del sofa. Hay que tener
     * presente que esta cadena puede ser nula o la cadena vacía.
     *
     * @return Cadena con la composición del sofa, pudiendo ser esta además nula o la cadena vacía.
     */
    public String getComposicion() {
        return this.composicion;
    }

    /**
     * Método que devuelve una cadena con información del sofa.
     *
     * Este método crea una cadena formateada con información sobre del sofa
     * donde se llama. Hace uso del método toString de la clase padre Asiento y añade
     * información especifica del sofa, en este caso, la composición que tiene.
     *
     * @return Cadena formateada con información del sofa.
     */
    @Override
    public String toString() {
        String asientoString = super.toString();

        return String.format("%s Composicion: %s",
                asientoString,
                this.composicion);
    }

}
