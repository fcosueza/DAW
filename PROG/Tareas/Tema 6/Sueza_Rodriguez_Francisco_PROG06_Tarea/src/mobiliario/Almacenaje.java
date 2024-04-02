package mobiliario;

import java.util.Arrays;

/**
 * Clase almacenaje que representa elementos de almacenamiento.
 *
 * Clase que define muebles de almacenaje, es decir, muebles en los que se
 * pueden guardar diferentes elementos como ropa, libros, etc. Los elementos
 * de almacenaje son un tipo de Mueble y además de todas las características
 * de estos tiene algunas propias, como las dimensiones (altura y anchura) y
 * la posibilidad de añadir y quitar módulos, a través de la implementación
 * de la interfaz Personalizable.
 *
 * @author Francisco Sueza Rodríguez
 */
public abstract class Almacenaje extends Mueble implements Personalizable {

    /**
     * Número mínimo de modulos que debe tener un mueble
     *
     * @value 1
     */
    public static final int MIN_MODULOS = 1;

    /**
     * Número máximo de modulos que puede tener un mueble
     *
     * @value 20
     */
    public static final int MAX_MODULOS = 20;

    // Variable con la anchura del mueble en cm
    private double anchura;

    // Variable con la altura del mueble en cm
    private double altura;

    // Numero máxio de modulos que admite el mueble
    private final int modulosMaximos;

    // Array con los modulos instalados en el mueble
    private Modulo[] modulosInstalados;

    /**
     * Cantidad de modulos añadidos al mueble
     */
    protected int cantidadModulosInstalados = 0;

    /**
     * Constructor de la clase Almacenaje.
     *
     * Crea objetos de la clase Almacenaje, recibiendo como parámetros su precio, descripción,
     * anchura, altura y el número máximo de modulos que admite. Si el número de modulos
     * esta fuera del rango establecido por MAX_MODULOS y MIN_MODULOS se lanza una
     * excepción de tipo IllegalArgumentException. En caso de que este dentro de rango, se
     * actualizan los atributos de clase y se reserva espacio para el array que contendrá
     * los modulos instalados en el mueble. Además, se le añade un primer modulo, en este caso
     * de tipo BALDA, ya que el mínimo de modulos que puede tener un mueble es 1.
     *
     * @param precio Precio del mueble en euros
     * @param descripcion Desripción detalla del mueble
     * @param anchura Anchura del mueble en cm
     * @param altura Altura del mueble en cm
     * @param maxModulos Número máximo de modulos que admite el mueble
     *
     * @throws IllegalArgumentException Se lanza si maxModulos está fuera de rango
     */
    public Almacenaje(double precio, String descripcion, double anchura, double altura, int maxModulos) throws IllegalArgumentException {
        super(precio, descripcion);

        if (maxModulos < MIN_MODULOS || maxModulos > MAX_MODULOS) {
            throw new IllegalArgumentException(String.format(
                    "ERROR: No se puede crear el mueble de Almacenaje. El número de módulos no está en el rango permitido: %d",
                    maxModulos));
        }

        this.anchura = anchura;
        this.altura = altura;
        this.modulosMaximos = maxModulos;
        this.modulosInstalados = new Modulo[maxModulos];
        this.modulosInstalados[this.cantidadModulosInstalados] = Modulo.BALDA;
        this.cantidadModulosInstalados++;
    }

    /**
     * Método que devuelve la anchura del mueble.
     *
     * Método que devuelve un número real con la anchura del
     * mueble de almacenaje expresada en cm.
     *
     * @return Valor real con la anchura del mueble en cm
     */
    public double getAnchura() {
        return anchura;
    }

    /**
     * Método que devuelve la altura del mueble.
     *
     * Método que devuelve un número real con la altura del
     * mueble de almacenaje expresada en cm.
     *
     * @return Valor real con la altura del mueble en cm
     */
    public double getAltura() {
        return altura;
    }

    /**
     * Método que devuelve el número máximo de módulos.
     *
     * Método que devuelve un entero con el número máximo de modulos
     * que admite el mueble de almacenaje.
     *
     * @return Entero con el número máximo de modulos que admite el mueble
     */
    public int getNumModulos() {
        return modulosMaximos;
    }

    /**
     * Método que devuelve la cantidad de modulos instalados.
     *
     * Método que devuelve un entero con la cantidad de modulos que se
     * han instalado en el mueble de almacenaje donde se llama.
     *
     * @return Entero con la cantidad de modulos instalados en el mueble
     */
    public int getModulosInstalados() {
        return cantidadModulosInstalados;
    }

    /**
     * Método que devuelve una cadena con información del mueble.
     *
     * Método que devuelve una cade formateada con toda la información del
     * mueble de almacenaje. Usa el método toString de la clase padre Mueble
     * y añade información específica sobre el mueble de almacenaje, como es
     * anchura, altura, número máximo de modulos que admite y los modulos instalados.
     *
     * @return Cadena formateada con información sobre el mueble de almacenaje
     */
    @Override
    public String toString() {
        String parentString = super.toString();
        String modulosString = Arrays.toString(this.modulosInstalados);

        return String.format("%s Anchura: %f.2 Altura: %f.2 Módulos Máximos: %d Módulos añadidos: %s",
                parentString,
                this.anchura,
                this.altura,
                this.modulosMaximos,
                modulosString);
    }

    /**
     * Método que devuelve los modulos instalados.
     *
     * Método que devuelve una cadena con todos los modulos instalados,
     * siendo estos elementos del enum Modulo.
     *
     * @return Cadena con los modulos instalados en el mueble
     */
    @Override
    public String obtenerModulos() {
        return Arrays.toString(modulosInstalados);
    }

    /**
     * Método que añade un modulo al mueble de almacenaje.
     *
     * Implementación del método anyadirModulo de la interfaz Personaliable
     * que permite añadir un modulo de tipo Modulo al mueble. El método comprobará
     * que el modulo que se quiere añadir no sea nulo, en cuyo caso lanzará una
     * excepción de tipo NullPointerException. Además, si el número de modulos instalados
     * es el máximo permitido, no se podrá instalar el nuevo modulo, por lo que se
     * lanzará una excepción de tipo IllegalStateException.
     *
     * Si se cumplen todos los requisitos, el modulo se añadirá al mueble.
     *
     * @param modulo Objeto de tipo Modulo que se quiere añadir al mueble
     * @throws IllegalStateException Se lanza en caso de que no se pueda añadir el modulo
     * @throws NullPointerException Se lanza en caso de que el modulo sea nulo
     */
    @Override
    public void anyadirModulo(Modulo modulo) throws IllegalStateException, NullPointerException {
        if (modulo == null) {
            throw new NullPointerException("Error: el módulo a añadir no puede ser nulo");
        }

        if (this.cantidadModulosInstalados == this.modulosMaximos) {
            throw new IllegalStateException(String.format(
                    "Error: no se puede añadir el módulo %s."
                    + "El número de módulos no puede superar el máximo permitido: %s",
                    modulo.name(),
                    this.modulosMaximos));
        }

        this.modulosInstalados[cantidadModulosInstalados] = modulo;
        this.cantidadModulosInstalados++;
    }

    /**
     * Método que extrae un modulo del mueble de almacenaje.
     *
     * Implementación del método extraerModulo de la interfaz Personalizable. Permite
     * extraer un Modulo del mueble en concreto, extrayendo el último modulo que se
     * ha introducido. En caso de que el mueble tenga el número minimo de modulos posible,
     * se lanzara una excepción IllegarlStateException. Si el modulo se puede extraer, este
     * será devuelto como valor de retorno.
     *
     * @return Elemento de tipo Modulo que se ha extraido del mueble
     * @throws IllegalStateException Se lanza en caso de que no se pueda extraer el modulo
     *
     */
    @Override
    public Modulo extraerModulo() throws IllegalStateException {
        Modulo moduloExtraido;

        if (this.cantidadModulosInstalados == MIN_MODULOS) {
            throw new IllegalStateException(String.format(
                    "Error: no se puede quitar el modulo. El número de módulos no puede ser inferior a %s",
                    MIN_MODULOS));
        }

        moduloExtraido = this.modulosInstalados[cantidadModulosInstalados];
        this.modulosInstalados[cantidadModulosInstalados] = null;
        this.cantidadModulosInstalados--;

        return moduloExtraido;
    }

}
