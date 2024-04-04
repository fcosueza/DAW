package mobiliario;

/**
 * Clase que define un elemento de tipo Sillon.
 *
 * Esta clase representa un elemento de tipo Sillon perteneciente a la categoría
 * de Asiento. Además de todas las características de un elemento de tipo Asiento, añade
 * la posibilidad de subir o bajar los pies del sillon, mediante la implemtanción de la
 * interfaz Ajustable. Los pies solo podrán tener dos posiciones, bajados (0) o subidos (1).
 *
 * @author Francisco Sueza Rodríguez
 */
public final class Sillon extends Asiento implements Ajustable {

    /**
     * Atributo estático con el valor de la posición bajada
     *
     * {@value}
     */
    public final static int POS_BAJADO = 0;

    /**
     * Atributo estático con el valor de la posición subida
     *
     * {@value}
     */
    public final static int POS_SUBIDO = 1;

    // Entero positivo con la posición de los pies
    private int posicionPies;

    /**
     * Constructor de la clase Sillon.
     *
     * Constructor que crea un objeto de tipo silla recibiendo como parametros el precio,
     * la descripción, tipo de tapiceria y el color. El número de plazas no se requiere ya
     * que los sillones solo pueden tener 1 plaza. Se inicializa la posición de los pies por
     * defecto a POS_BAJADO
     *
     * @param precio Valor double con el precio del sillon
     * @param descripcion String con la descripción detallada del sillon
     * @param tapiceria String con el tipo de tapicería del sillon
     * @param color String con el color del sillon
     */
    public Sillon(double precio, String descripcion, String tapiceria, String color) {
        super(precio, descripcion, Asiento.MIN_PLAZAS, tapiceria, color);

        this.posicionPies = POS_BAJADO;
    }

    /**
     * Método que devuelve la posición del sillon.
     *
     * Implementación del método obtenerPosicion de la interfaz Ajustable. El
     * método devuelve un entero con la posición actual de los pies del sillon,
     * q
     *
     * @return Entero con la posición actual de la silla
     */
    @Override
    public int obtenerPosicion() {
        return this.posicionPies;
    }

    /**
     * Método que sube los pies del sillón..
     *
     * Implementación del método subirPosicion de la interfaz Ajustable. El método
     * cambia la posición de los pies a POS_SUBIDO. Si los pies ya se encuentran en esa
     * posición, se lanzará una excepción de tipo IllegalStateException, en caso contrario,
     * se actualizará la posición y se devolverá la posición final.
     *
     * @return Un entero con la posición final de los pies
     * @throws IllegalStateException Si se intenta subir los pues y ya están subidos
     */
    @Override
    public int subirPosicion() throws IllegalStateException {

        if (this.posicionPies == POS_SUBIDO) {
            throw new IllegalStateException(
                    "Error: no se pueden subir los pies del sillón. Ya están subidos");
        }

        this.posicionPies = POS_SUBIDO;
        return this.posicionPies;
    }

    /**
     * Méotdo que baja los pies del sillón.
     *
     * Implementación del método bajarPosicion de la interfaz Ajustable. El método
     * cambia la posición de los pies a POS_BAJADO. Si los pies ya se encuentran en esa
     * posición, se lanzará una excepción de tipo IllegalStateException, en caso contrario,
     * se actualizará la posición y se devolverá la posición final.
     *
     *
     * @return Un entero con la posición final de los pies
     * @throws IllegalStateException Si se intentan bajar los pues y ya están bajados
     */
    @Override
    public int bajarPosicion() throws IllegalStateException {
        if (this.posicionPies == POS_BAJADO) {
            throw new IllegalStateException(
                    "Error: no se pueden bajar los pies del sillón. Ya están bajados");
        }

        this.posicionPies = POS_BAJADO;
        return this.posicionPies;
    }

    /**
     * Método que devuelve una cadena con información del sillon.
     *
     * Este método crea una cadena formateada con información del sillón
     * donde se llama. Hace uso del método toString de la clase padre Asiento y añade
     * información especifica del sillon como la posición de los pies.
     *
     * @return Cadena formateada con información del sillón
     */
    @Override
    public String toString() {
        String asientoString = super.toString();
        String posicion = this.posicionPies == POS_BAJADO ? "bajada" : "subida";

        return String.format("%s Posicion actual de los pies: %s",
                asientoString,
                posicion);
    }

}
