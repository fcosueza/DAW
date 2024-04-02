package mobiliario;

/**
 * Clase que define un elemento de tipo estantería.
 *
 * Se define la clase Estanteria, que es un tipo de Mueble de
 * Almacenaje. Además de tener todas las características de un elemento
 * Almacenaje, como la posibilidad de añadir y quitar modulos, se añade
 * un atributo de tipo String para determinar el tipo de estanteria que es.
 *
 * @author Francisco Sueza Rodríguez
 */
public final class Estanteria extends Almacenaje {

    // Cadena con el tipo de estanteria ("de pared", "de suelo", etc..)
    private String tipoEstanteria;

    /**
     * Constructor de la clase Estanteria.
     *
     * Constructor que crea un objeto de tipo estanteria, derivado de la clase Mueble.
     * Este acepta todos los parametros de la clase Mueble además del parametro tipo, una
     * cadena de caracteres que define el tipo de estantería que es ("de pared", "de suelo", etc.
     *
     * @param precio Precio de la Estanteria en euros
     * @param descripcion Descripción detallada de la estantería
     * @param anchura Anchura de la estantería en cm
     * @param altura Altura de la estantería en cm
     * @param maxModulos Número máximo de modulos que acepta
     * @param tipo Cadena con el tipo de estantería
     */
    public Estanteria(double precio, String descripcion, double anchura, double altura, int maxModulos, String tipo) {
        super(precio, descripcion, anchura, altura, maxModulos);

        this.tipoEstanteria = tipo;
    }

    /**
     * Método que devuelve una cadena con información de la estanteria.
     *
     * Este método crea una cadena formateada con información sobre la estanteria
     * donde se llama. Hace uso del método toString de la clase padre Almacenaje y añade
     * información especifica de la estanteria, en concreto su tipo..
     *
     * @return Cadena formateada con información de la estanteria
     */
    @Override
    public String toString() {
        String almacenString = super.toString();

        return String.format("%s Tipo: %d",
                almacenString,
                this.tipoEstanteria);
    }

    @Override
    public void anyadirModulo(Modulo modulo) throws IllegalArgumentException {
        if (modulo != Modulo.BALDA) {
            throw new IllegalArgumentException("Error: Las entanterias solo admiten modulos tipo BALDA");
        }

        try {
            super.anyadirModulo(modulo);
        } catch (NullPointerException ex) {
            throw new IllegalArgumentException(ex.getMessage());
        } catch (IllegalStateException ex) {
            throw new IllegalArgumentException(ex.getMessage());
        }
    }
}
