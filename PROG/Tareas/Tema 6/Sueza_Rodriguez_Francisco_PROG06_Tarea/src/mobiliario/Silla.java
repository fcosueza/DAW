package mobiliario;

/**
 * Clase que define un mueble de tipo Silla.
 *
 * Se define un mueble de tipo silla, perteneciente a la clase de Asiento.
 * Además de los atributos propios de un mueble tipo Asiento, esta clase implementa
 * la interfaz Ajustable, que permitirá ajustar el respaldo entre unas posiciones
 * definidas por MIN_POSICION y MAX_POSICION. Los elementos Silla solo pueden tener
 * un número de plazas igual a 1.
 *
 * @author Francisco Sueza Rodríguez
 */
public final class Silla extends Asiento implements Ajustable {

    /**
     * Posicion mínima del respaldo la silla (posición por defecto).
     *
     * @value 1
     */
    public static int MIN_POSICION = 1;

    /**
     * Posición máximas del respaldo de la silla.
     *
     * @value 4
     */
    public static int MAX_POSICION = 4;

    // Entero con la posición actual de la silla.
    private int posicionRespaldo;

    /**
     * Constructor de la clase Silla.
     *
     * Constructor que crea un objeto de tipo silla recibiendo como parametros el precio,
     * la descripción, tipo de tapiceria y el color. El número de plazas no se requiere ya
     * que las sillas solo pueden tener 1 plaza. La posición de la silla por defecto será
     * la definida por MIN_POSICION.
     *
     * @param precio Valor double con el precio de la silla
     * @param descripcion String con la descripción detallada de la silla
     * @param tapiceria String con el tipo de tapicería de la silla
     * @param color String con el color de la silla
     */
    public Silla(double precio, String descripcion, String tapiceria, String color) {
        super(precio, descripcion, Asiento.MIN_PLAZAS, tapiceria, color);

        this.posicionRespaldo = MAX_POSICION;
    }

    /**
     * Método que devuelve la posición de la silla.
     *
     * Implementación del método obtenerPosicion de la interfaz Ajustable. El
     * método devuelve un entero con la posición actual del respaldo de la silla
     * que se encontrará entre los valores MIN_POSICION y MAX_POSICION.
     *
     * @return Entero con la posición actual de la silla
     */
    @Override
    public int obtenerPosicion() {
        return this.posicionRespaldo;
    }

    /**
     * Método que sube la posición de la silla.
     *
     * Implementación del método subirPosicion de la interfaz Ajustable. El método
     * incrementa en 1 la posición del respaldo de la silla, siempre y cuando este
     * no supere el límite superior definido por MAX_POSICION. En ese caso, se lanzará
     * una excepción. en caso de que se halla podido incrementar la posición, se devolverá
     * un entero con la posición final de la silla.
     *
     * @return Un entero con la posición final de la silla
     * @throws IllegalStateException Si el aumento de posición sobrepasa el límite superior
     */
    @Override
    public int subirPosicion() throws IllegalStateException {
        int posicionResultado = posicionRespaldo + 1;

        if (posicionResultado > MAX_POSICION) {
            throw new IllegalStateException(String.format(
                    "Error: no se puede subir a la posición %d, ya que la posición máxima es %d",
                    posicionResultado,
                    MAX_POSICION));
        } else {
            this.posicionRespaldo = posicionResultado;
        }

        return this.posicionRespaldo;
    }

    /**
     * Méotdo que baja la posición de la silla.
     *
     * Implementación del método bajarPosicion de la interfaz Ajustable. El método
     * decrementa la posición de la silla en uno, siempre y cuando no se sobrepase el
     * límite inferior definido por MIN_POSICION, en cuyo casi se lanzará una excepción
     * de tipo IllegatStateException. Si se ha podido bajar la posición, se devolverá
     * un entero con la posición final de la silla.
     *
     * @return Un entero con la posición final de la silla
     * @throws IllegalStateException Si la disminución de la posición pasa el límite inferior
     */
    @Override
    public int bajarPosicion() throws IllegalStateException {
        int posicionResultado = posicionRespaldo - 1;

        if (posicionResultado < MIN_POSICION) {
            throw new IllegalStateException(String.format(
                    "Error: no se puede bajar a la posición %d, ya que la posición minima es %d",
                    posicionResultado,
                    MIN_POSICION));
        } else {
            this.posicionRespaldo = posicionResultado;
        }

        return this.posicionRespaldo;
    }

    /**
     * Método que devuelve una cadena con información de la silla.
     *
     * Este método crea una cadena formateada con información sobre la silla
     * donde se llama. Hace uso del método toString de la clase padre Asiento y añade
     * información especifica de la silla como la posición del respaldo.
     *
     * @return Cadena formateada con información de la silla
     */
    @Override
    public String toString() {
        String asientoString = super.toString();

        return String.format("%s Posicion actual del respaldo: %d",
                asientoString,
                this.posicionRespaldo);
    }
}
