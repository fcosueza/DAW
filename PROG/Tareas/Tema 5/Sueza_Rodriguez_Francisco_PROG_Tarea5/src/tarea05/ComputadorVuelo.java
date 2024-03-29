package tarea05;

/**
 * Clase ComputadorVuelo
 *
 * Esta clase representa un computador de vuelo y nos permite la creación de
 * aeronaves, haciendolas despegar y controlando su altitud, rumbo y velocidad,
 * para posteriormente hacerlas aterrizar.
 *
 * @author Francisco Sueza Rodríguez
 */
public class ComputadorVuelo {

    /**
     * Piloto por defecto: {@value PILOTO_DEFECTO}
     */
    public static final String PILOTO_DEFECTO = "Juan Pérez";

    /**
     * Matrícula delavion defecto: {@value MATRICULA_DEFECTO}
     */
    public static final String MATRICULA_DEFECTO = "EC-ABC";

    /**
     * Modelo de avión por defecto: {@value MODELO_DEFECTO}
     */
    public static final String MODELO_DEFECTO = "Cesna 152";

    /**
     * Altitud mínima del avión: {@value MIN_ALTITUD} metros
     */
    public static final int MIN_ALTITUD = 1000; // metros

    /**
     * Altitud máxima del avión: {@value MAX_ALTITUD} metros
     */
    public static final int MAX_ALTITUD = 3000; //metros

    /**
     * Tipo de vuelo escuela: {@value VUELO_ESCUELA}
     */
    public static final byte VUELO_ESCUELA = 0;

    /**
     * Tipo de vuelo privado: {@value VUELO_PRIVADO}
     */
    public static final byte VUELO_PRIVADO = 1;

    // Declaración de atributos de clase
    private static int numAeronaves;
    private static int numAeronavesVolando;
    private static double numHorasVuelo;

    // Declaración de atributos de instancia
    private final String matricula;
    private final String modelo;
    private String piloto;

    private boolean volando;
    private int tipoVuelo;
    private int tiempoTotalVuelo;

    private int velocidad;
    private int rumbo;
    private int altitud;

    // Constructores
    /**
     * Constructor con 3 parametros
     *
     * @param matricula Matricula del avión en el formato "EC-XXX"
     * @param piloto Nombre del piloto
     * @param modelo Modelo del avión
     * @throws IllegalArgumentException Si la matricula o el modelo son
     * incorrectos.
     * @throws NullPointerException Si alguno de los parametros es nulo.
     */
    public ComputadorVuelo(String matricula, String modelo, String piloto) throws IllegalArgumentException, NullPointerException {
        String patron = "EC-[A-Z0-9]{3}";

        // Comprobamos que ningún valor es nulo
        if (matricula == null) {
            throw new NullPointerException("La matrícula de la aeronave no puede ser nula.");
        }
        if (modelo == null) {
            throw new NullPointerException("El modelo de la aeronave no puede ser nula.");
        }
        if (piloto == null) {
            throw new NullPointerException("El piloto de la aeronave no puede ser nula.");
        }

        // Comprobamos que la mátricula y el modelo sean correctos
        if (matricula.equals("")) {
            throw new IllegalArgumentException("La matrícula contiene la cadena vacía.");
        } else if (!matricula.matches(patron)) {
            throw new IllegalArgumentException("El formato de la matrícula es incorrecto: " + matricula);
        }

        if (modelo.equals("")) {
            throw new IllegalArgumentException("El modelo contiene la cadena vacía.");
        }

        // Si no se ha lanzado ninguna excepción, asignamos los valores
        this.matricula = matricula;
        this.modelo = modelo;
        this.piloto = piloto;

        // Incrementamos el número de aeronaves creadas
        ComputadorVuelo.numAeronaves++;
    }

    // Contructor con 2 parámetros
    /**
     * Constructor con 2 parametros
     *
     *
     * @param matricula Matrícula del avión
     * @param modelo Modelo del avión
     * @throws IllegalArgumentException Si la mátricula o el modelo son
     * incorrectos.
     * @throws NullPointerException Si alguno de los parametros es nulo.
     */
    public ComputadorVuelo(String matricula, String modelo) throws IllegalArgumentException, NullPointerException {
        this(matricula, modelo, ComputadorVuelo.PILOTO_DEFECTO);
    }

    // Constructor por defecto
    /**
     * Constructor sin parametros
     */
    public ComputadorVuelo() {
        this(ComputadorVuelo.MATRICULA_DEFECTO, ComputadorVuelo.MODELO_DEFECTO, ComputadorVuelo.PILOTO_DEFECTO);

    }

    // Método fabrica crearArrayComputadorVuelo
    /**
     * Método ComputadorVuelo que crea un array de aviones empleando el
     * constructor sin parametros.
     *
     * @param cantidadAviones Cantidad de aviones a crear, entre 1 y 10.
     * @return Un array con todos los aviones creados.
     * @throws IllegalArgumentException Si la cantidad no es correcta.
     */
    public static ComputadorVuelo[] crearArrayComputadorVuelo(int cantidadAviones) throws IllegalArgumentException {
        if (cantidadAviones < 1 || cantidadAviones > 10) {
            throw new IllegalArgumentException("Número de aviones incorrecto " + cantidadAviones + ", debe ser mayor o igual que 1 y menor o igual que 10");
        }

        ComputadorVuelo vuelos[] = new ComputadorVuelo[cantidadAviones];

        for (int i = 0; i < cantidadAviones; i++) {
            vuelos[i] = new ComputadorVuelo();
        }

        return vuelos;
    }

    // Getters de la clase ComputadorVuelo
    /**
     * Método que devuelve la matrícula del avión
     *
     * @return Matrícula del avión
     */
    public String getMatricula() {
        return this.matricula;
    }

    /**
     * Método que devuelve el modelo del avión
     *
     * @return Modelo del avión
     */
    public String getModelo() {
        return this.modelo;
    }

    /**
     * Método que devuelve si el avión esta volando o no
     *
     * @return True si el avión esta volando o false en caso contrario.
     */
    public boolean isVolando() {
        return this.volando;
    }

    /**
     * Método que devuelve el nombre del piloto
     *
     * @return Nombre del piloto
     */
    public String getPiloto() {
        return this.piloto;
    }

    /**
     * Método que devuelve el tipo de vuelo
     *
     * @return 0 si el tipo es Escela y 1 si el tipo es Privado
     */
    public int getTipoVuelo() {
        return this.tipoVuelo;
    }

    /**
     * Método que devuelve el tiempo total de vuelo
     *
     * @return Tiempo total que ha estado volando el avión en horas.
     */
    public int getTiempoTotalVuelo() {
        return this.tiempoTotalVuelo;
    }

    /**
     * Método que devuelve la velocidad del avión
     *
     * @return La velocidad del avión en km/h
     */
    public int getVelocidad() {
        return this.velocidad;
    }

    /**
     * Método que devuelve el rumbo del avión.
     *
     * @return Rumbo del avión expresado en grados.
     */
    public int getRumbo() {
        return this.rumbo;
    }

    /**
     * Método que devuelve la altitud del avión.
     *
     * @return Altitud del avión en metros.
     */
    public int getAltitud() {
        return this.altitud;
    }

    // Setters de la clase ComputadorVuelo
    /**
     * Método que permite establecer la velocidad del avión.
     *
     * @param velocidad Velocidad del avión en km/h.
     */
    public void setVelocidad(int velocidad) {
        this.velocidad = velocidad;
    }

    /**
     * Método que permite establecer el rumbo del avión.
     *
     * @param rumbo Rumbo del avión expresado en grados.
     */
    public void setRumbo(int rumbo) {
        this.rumbo = rumbo;
    }

    /**
     * Método que establece la altitud del avión, establecediendolo a la altitud
     * mi?ima si la altitud no llega a 1000 metros o se pasa de 3000 metros.
     *
     * @param altitud Altitud que debe estar en el rango 1000 - 3000 metros.
     */
    public void setAltitud(int altitud) {
        if (altitud < ComputadorVuelo.MIN_ALTITUD || altitud > ComputadorVuelo.MAX_ALTITUD) {
            this.altitud = ComputadorVuelo.MIN_ALTITUD;
        } else {
            this.altitud = altitud;
        }
    }

    // Métodos estáticos
    /**
     * Método de clase que devuelve el número de naves que se han creado
     * hasta el momento.
     *
     * @return Número de naves que se han creado.
     */
    public static int getNumAeronaves() {
        return ComputadorVuelo.numAeronaves;
    }

    /**
     * Método de clase que devuelve el número de aeronaves que están volando
     * en un momento dado.
     *
     * @return Número de aeronaves que están volando en ese momento.
     */
    public static int getNumAeronavesVolando() {
        return ComputadorVuelo.numAeronavesVolando;
    }

    /**
     * Método de clase que devuelve el número de horas totales que han realizado
     * todos los vuelos.
     *
     * @return Número de horas totales de todos los vuelos.
     */
    public static double getNumHorasVuelo() {
        return ComputadorVuelo.numHorasVuelo;
    }

    /**
     * Método despegar que hace despegar a un avión.
     *
     * @param tipoVuelo Tipo de vuelo que va a realizar el avión, escuela(0) o
     * privado (1)
     * @param velocidad Velocidad de vuelo inicial del avión en km/h
     * @param altitud Altitud inicial del avión en metros
     *
     * @throws IllegalStateException Si se intenta hacer despegar a un avión que
     * ya esta en vuelo.
     * @throws IllegalArgumentException Si la altitud no esta entre 1000 y 3000
     * metros
     */
    public void despegar(int tipoVuelo, int velocidad, int altitud) throws IllegalStateException, IllegalArgumentException {
        if (altitud < ComputadorVuelo.MIN_ALTITUD || altitud > ComputadorVuelo.MAX_ALTITUD) {
            throw new IllegalArgumentException("La altitud de vuelo de " + altitud + " metros es incorrecta");
        }

        if (this.isVolando()) {
            throw new IllegalStateException(this.getMatricula() + " ya ha despegado y se encuentra fuera del aeropuerto");
        }

        this.setAltitud(altitud);
        this.setVelocidad(velocidad);
        this.tipoVuelo = tipoVuelo;
        this.volando = true;

        ComputadorVuelo.numAeronavesVolando++;
    }

    /**
     * Método que hace aterrizar a un avión.
     *
     * @param aeropuestoSalida Aerupuerto de donde salió el avión.
     * @param aeropuertoDestino Aeropuesto donde aterrizará el avión.
     * @param tiempoVuelo Tiempo de vuelo que ha realizado el avión en horas.
     *
     * @throws IllegalStateException Si se intenta hacer aterrizar a un avión
     * que no esta volando.
     */
    public void aterrizar(String aeropuestoSalida, String aeropuertoDestino, int tiempoVuelo) throws IllegalStateException {
        if (!this.isVolando()) {
            throw new IllegalStateException(this.getMatricula() + " ya ha aterrizado y debe despegar antes de aterrizar de nuevo.");
        }

        this.volando = false;
        this.tiempoTotalVuelo += tiempoVuelo;
        this.setRumbo(0);
        this.setVelocidad(0);
        this.setAltitud(0);

        ComputadorVuelo.numHorasVuelo += tiempoVuelo;
        ComputadorVuelo.numAeronavesVolando--;
    }

    /**
     * Método que formatea la información de un avión y la devuelve en una
     * cadena.
     *
     * @return Información del avión formateada.
     */
    @Override
    public String toString() {
        return String.format(
                "[Matricula=%s, Modelo=%s, isVolando=%s, Piloto=%s, TipoVuelo=%d, TiempoTotal=%d, V=%d km/h Rumbo=%dº, Altitud=%d metros",
                this.getMatricula(),
                this.getModelo(),
                this.isVolando(),
                this.getPiloto(),
                this.getTipoVuelo(),
                this.getTiempoTotalVuelo(),
                this.getVelocidad(),
                this.getRumbo(),
                this.getAltitud()
        );
    }

}
