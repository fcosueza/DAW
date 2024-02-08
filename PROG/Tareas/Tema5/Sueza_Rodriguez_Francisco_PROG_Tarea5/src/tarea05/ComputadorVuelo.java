package tarea05;

/**
 * Clase ComputadorVuelo
 *
 * Esta clase representa un computador de vuelo y nos permite la creaci�n de
 * aeronaves, haciendolas despegar y controlando su altitud, rumbo y velocidad,
 * para posteriormente hacerlas aterrizar.
 *
 * @author Francisco Sueza Rodr�guez
 */
public class ComputadorVuelo {

    /**
     * Piloto por defecto: {@value PILOTO_DEFECTO}
     */
    public static final String PILOTO_DEFECTO = "Juan P�rez";

    /**
     * Matr�cula delavion defecto: {@value MATRICULA_DEFECTO}
     */
    public static final String MATRICULA_DEFECTO = "EC-ABC";

    /**
     * Modelo de avi�n por defecto: {@value MODELO_DEFECTO}
     */
    public static final String MODELO_DEFECTO = "Cesna 152";

    /**
     * Altitud m�nima del avi�n: {@value MIN_ALTITUD} metros
     */
    public static final int MIN_ALTITUD = 1000; // metros

    /**
     * Altitud m�xima del avi�n: {@value MAX_ALTITUD} metros
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

    // Declaraci�n de atributos de clase
    private static int numAeronaves;
    private static int numAeronavesVolando;
    private static double numHorasVuelo;

    // Declaraci�n de atributos de instancia
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
     * @param matricula Matricula del avi�n en el formato "EC-XXX"
     * @param piloto Nombre del piloto
     * @param modelo Modelo del avi�n
     * @throws IllegalArgumentException Si la matricula o el modelo son
     * incorrectos.
     * @throws NullPointerException Si alguno de los parametros es nulo.
     */
    public ComputadorVuelo(String matricula, String modelo, String piloto) throws IllegalArgumentException, NullPointerException {
        String patron = "EC-[A-Z0-9]{3}";

        // Comprobamos que ning�n valor es nulo
        if (matricula == null) {
            throw new NullPointerException("La matr�cula de la aeronave no puede ser nula.");
        }
        if (modelo == null) {
            throw new NullPointerException("El modelo de la aeronave no puede ser nula.");
        }
        if (piloto == null) {
            throw new NullPointerException("El piloto de la aeronave no puede ser nula.");
        }

        // Comprobamos que la m�tricula y el modelo sean correctos
        if (matricula.equals("")) {
            throw new IllegalArgumentException("La matr�cula contiene la cadena vac�a.");
        } else if (!matricula.matches(patron)) {
            throw new IllegalArgumentException("El formato de la matr�cula es incorrecto: " + matricula);
        }

        if (modelo.equals("")) {
            throw new IllegalArgumentException("El modelo contiene la cadena vac�a.");
        }

        // Si no se ha lanzado ninguna excepci�n, asignamos los valores
        this.matricula = matricula;
        this.modelo = modelo;
        this.piloto = piloto;

        // Incrementamos el n�mero de aeronaves creadas
        ComputadorVuelo.numAeronaves++;
    }

    // Contructor con 2 par�metros
    /**
     * Constructor con 2 parametros
     *
     *
     * @param matricula Matr�cula del avi�n
     * @param modelo Modelo del avi�n
     * @throws IllegalArgumentException Si la m�tricula o el modelo son
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

    // M�todo fabrica crearArrayComputadorVuelo
    /**
     * M�todo ComputadorVuelo que crea un array de aviones empleando el
     * constructor sin parametros.
     *
     * @param cantidadAviones Cantidad de aviones a crear, entre 1 y 10.
     * @return Un array con todos los aviones creados.
     * @throws IllegalArgumentException Si la cantidad no es correcta.
     */
    public static ComputadorVuelo[] crearArrayComputadorVuelo(int cantidadAviones) throws IllegalArgumentException {
        if (cantidadAviones < 1 || cantidadAviones > 10) {
            throw new IllegalArgumentException("N�mero de aviones incorrecto " + cantidadAviones + ", debe ser mayor o igual que 1 y menor o igual que 10");
        }

        ComputadorVuelo vuelos[] = new ComputadorVuelo[cantidadAviones];

        for (int i = 0; i < cantidadAviones; i++) {
            vuelos[i] = new ComputadorVuelo();
        }

        return vuelos;
    }

    // Getters de la clase ComputadorVuelo
    /**
     * M�todo que devuelve la matr�cula del avi�n
     *
     * @return Matr�cula del avi�n
     */
    public String getMatricula() {
        return this.matricula;
    }

    /**
     * M�todo que devuelve el modelo del avi�n
     *
     * @return Modelo del avi�n
     */
    public String getModelo() {
        return this.modelo;
    }

    /**
     * M�todo que devuelve si el avi�n esta volando o no
     *
     * @return True si el avi�n esta volando o false en caso contrario.
     */
    public boolean isVolando() {
        return this.volando;
    }

    /**
     * M�todo que devuelve el nombre del piloto
     *
     * @return Nombre del piloto
     */
    public String getPiloto() {
        return this.piloto;
    }

    /**
     * M�todo que devuelve el tipo de vuelo
     *
     * @return 0 si el tipo es Escela y 1 si el tipo es Privado
     */
    public int getTipoVuelo() {
        return this.tipoVuelo;
    }

    /**
     * M�todo que devuelve el tiempo total de vuelo
     *
     * @return Tiempo total que ha estado volando el avi�n en horas.
     */
    public int getTiempoTotalVuelo() {
        return this.tiempoTotalVuelo;
    }

    /**
     * M�todo que devuelve la velocidad del avi�n
     *
     * @return La velocidad del avi�n en km/h
     */
    public int getVelocidad() {
        return this.velocidad;
    }

    /**
     * M�todo que devuelve el rumbo del avi�n.
     *
     * @return Rumbo del avi�n expresado en grados.
     */
    public int getRumbo() {
        return this.rumbo;
    }

    /**
     * M�todo que devuelve la altitud del avi�n.
     *
     * @return Altitud del avi�n en metros.
     */
    public int getAltitud() {
        return this.altitud;
    }

    // Setters de la clase ComputadorVuelo
    /**
     * M�todo que permite establecer la velocidad del avi�n.
     *
     * @param velocidad Velocidad del avi�n en km/h.
     */
    public void setVelocidad(int velocidad) {
        this.velocidad = velocidad;
    }

    /**
     * M�todo que permite establecer el rumbo del avi�n.
     *
     * @param rumbo Rumbo del avi�n expresado en grados.
     */
    public void setRumbo(int rumbo) {
        this.rumbo = rumbo;
    }

    /**
     * M�todo que establece la altitud del avi�n, establecediendolo a la altitud
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

    // M�todos est�ticos
    /**
     * M�todo de clase que devuelve el n�mero de naves que se han creado
     * hasta el momento.
     *
     * @return N�mero de naves que se han creado.
     */
    public static int getNumAeronaves() {
        return ComputadorVuelo.numAeronaves;
    }

    /**
     * M�todo de clase que devuelve el n�mero de aeronaves que est�n volando
     * en un momento dado.
     *
     * @return N�mero de aeronaves que est�n volando en ese momento.
     */
    public static int getNumAeronavesVolando() {
        return ComputadorVuelo.numAeronavesVolando;
    }

    /**
     * M�todo de clase que devuelve el n�mero de horas totales que han realizado
     * todos los vuelos.
     *
     * @return N�mero de horas totales de todos los vuelos.
     */
    public static double getNumHorasVuelo() {
        return ComputadorVuelo.numHorasVuelo;
    }

    /**
     * M�todo despegar que hace despegar a un avi�n.
     *
     * @param tipoVuelo Tipo de vuelo que va a realizar el avi�n, escuela(0) o
     * privado (1)
     * @param velocidad Velocidad de vuelo inicial del avi�n en km/h
     * @param altitud Altitud inicial del avi�n en metros
     *
     * @throws IllegalStateException Si se intenta hacer despegar a un avi�n que
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
     * M�todo que hace aterrizar a un avi�n.
     *
     * @param aeropuestoSalida Aerupuerto de donde sali� el avi�n.
     * @param aeropuertoDestino Aeropuesto donde aterrizar� el avi�n.
     * @param tiempoVuelo Tiempo de vuelo que ha realizado el avi�n en horas.
     *
     * @throws IllegalStateException Si se intenta hacer aterrizar a un avi�n
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
     * M�todo que formatea la informaci�n de un avi�n y la devuelve en una
     * cadena.
     *
     * @return Informaci�n del avi�n formateada.
     */
    @Override
    public String toString() {
        return String.format(
                "[Matricula=%s, Modelo=%s, isVolando=%s, Piloto=%s, TipoVuelo=%d, TiempoTotal=%d, V=%d km/h Rumbo=%d�, Altitud=%d metros",
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
