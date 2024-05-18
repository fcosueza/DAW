package tarea09;

import java.io.File;
import javafx.animation.KeyFrame;
import javafx.animation.Timeline;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Control;
import javafx.util.Duration;

import java.net.URL;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.ResourceBundle;
import javafx.application.Platform;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.scene.control.Alert;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.AnchorPane;
import javafx.scene.media.Media;
import javafx.scene.media.MediaPlayer;

/**
 * Clase Controladora
 *
 * @author Francisco Javier Sueza Rodríguez
 */
public class MemoriaController implements Initializable {

    // definición de variables internas para el desarrollo del juego
    private JuegoMemoria juego;         // instancia que controlará el estado del juego (tablero, parejas descubiertas, etc)
    private ArrayList<Button> cartas;   // array para almacenar referencias a las cartas @FXML definidas en la interfaz
    private int segundos = 0;             // tiempoLabel de juego
    private boolean primerBotonPulsado = false, segundoBotonPulsado = false; // indica si se han pulsado ya los dos botones para mostrar la pareja
    private int idBoton1, idBoton2;     // identificadores de los botones pulsados
    private boolean esPareja;           // almacenará si un par de botones pulsados descubren una pareja o no
    private int intentos = 0;           // Número de intentos realizados
    private String tipoPartida = "";    // Tipo de partida que se va a jugar (escudos, personas o plantas)

    // linea de tiempoLabel para gestionar la finalización del intento al pasar 1.5 segundos
    private final Timeline finIntento = new Timeline(new KeyFrame(Duration.seconds(1.5), e -> finalizarIntento()));

    // linea de tiempoLabel para gestionar el contador de tiempoLabel del juego
    private Timeline contadorTiempo;

    // Ficheros con los diferentes sonidos que se van a reproducir en el juego
    private final File archivoFondo = new File("src/tarea09/assets/sonidos/musica.mp3");
    private final File archivoFallo = new File("src/tarea09/assets/sonidos/noPareja.mp3");
    private final File archivoAcierto = new File("src/tarea09/assets/sonidos/pareja.mp3");

    // Creamos los objetos Media con los archivo de los sonidos
    private final Media sonidoFondo = new Media(archivoFondo.toURI().toString());
    private final Media sonidoFallo = new Media(archivoFallo.toURI().toString());
    private final Media sonidoAcierto = new Media(archivoAcierto.toURI().toString());

    // Creamos dos media player, uno para la musica de fondo y otro para los efectos
    private final MediaPlayer playerFondo = new MediaPlayer(sonidoFondo);
    private MediaPlayer playerSonidos;

    // Variables FXML de referencia a a elementos de la interfaz
    @FXML
    private AnchorPane main; // panel principal (incluye la notación @FXML porque hace referencia a un elemento de la interfaz)

    @FXML
    private Label intentosLabel, tiempoLabel; // Label con el número de intentosLabel y el temporizador

    @FXML
    private Button empezar, salir; // Botón para comenzar el juego y salir de él

    @FXML
    private Button carta1, carta2, carta3, carta4, carta5, carta6, carta7, carta8, carta9, carta10, carta11, carta12, carta13, carta14, carta15, carta16;

    /**
     * Método interno que configura todos los aspectos necesarios para inicializar el juego.
     *
     * @param url No utilizaremos este parámetro (null).
     * @param resourceBundle No utilizaremos este parámetro (null).
     */
    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        juego = new JuegoMemoria(); // instanciación del juego (esta instancia gestionará el estado de juego)
        juego.iniciarJuego(); // comienzo de una nueva partida

        // Seleccionamos el tipo de cartas que se van a usar
        this.tipoPartida = juego.getTipoPartida();

        // inicialización del ArrayList de referencias a cartas @FXML (cargamos las cartas en la inicialización)
        cartas = new ArrayList<>(
                Arrays.asList(
                        carta1, carta2, carta3, carta4, carta5, carta6, carta7, carta8,
                        carta9, carta10, carta11, carta12, carta13, carta14, carta15, carta16
                ));

        // Establecemos los intentosLabel a 0 y el tiempoLabel a 0
        intentosLabel.setText(String.valueOf(intentos));
        tiempoLabel.setText("0");

        // contador de tiempoLabel de la partida (Duration indica cada cuanto tiempoLabel se actualizará)
        contadorTiempo = new Timeline(new KeyFrame(Duration.seconds(1), (ActionEvent event) -> {
            this.segundos++;
            tiempoLabel.setText(String.valueOf(this.segundos));
        }));

        contadorTiempo.setCycleCount(Timeline.INDEFINITE);  // reproducción infinita
        contadorTiempo.play(); // iniciar el contador en este momento

        // música de fondo para que se reproduzca cuando se inicia el juego y que se reproduzca en loop
        playerFondo.setCycleCount(MediaPlayer.INDEFINITE);
        playerFondo.play(); // Reproducimos el sonido de inicio
    }

    /**
     * Acción asociada al botón <strong>Comenzar nuevo juego</strong> que permite comenzar una nueva
     * partida.
     *
     * Incluye la notación @FXML porque será accesible desde la interfaz de usuario
     *
     * @param event Evento que ha provocado la llamada a este método
     */
    @FXML
    private void reiniciarJuego(ActionEvent event) {

        // Reiniciamos los segundos a 0, los intentos y paramos contador y la musica
        this.segundos = 0;
        this.intentos = 0;
        playerFondo.stop();
        contadorTiempo.stop();

        // Mostramos todas las cartas del tablero y ocultamos las imágenes
        for (Button carta : cartas) {
            carta.setVisible(true);
            carta.setGraphic(null);
        }
        // llamar al método initialize para terminar de configurar la nueva partida
        initialize(null, null);
    }

    /**
     * Este método deberá llamarse cuando el jugador haga clic en cualquiera de las cartas del
     * tablero.
     *
     * Incluye la notación @FXML porque será accesible desde la interfaz de usuario
     *
     * @param event Evento que ha provocado la llamada a este método (carta que se ha pulsado)
     */
    @FXML
    private void mostrarContenidoCasilla(ActionEvent event) {
        Button botonPulsado = (Button) event.getSource(); // Botón que ha lanzado el evento
        int indiceCarta = cartas.indexOf(botonPulsado); // indice de la carta pulsada

        // Creamos la ruta de la imagen a cargar
        String rutaImagen = "assets/cartas/" + tipoPartida + "/" + juego.getCartaPosicion(indiceCarta) + ".png";

        // Creamos el objeto con la imagen
        Image carta = new Image(getClass().getResourceAsStream(rutaImagen));
        ImageView visorCarta = new ImageView(carta);

        // Comprobamos si es la primera carta descubierta del intento o no
        if (this.primerBotonPulsado) {
            this.segundoBotonPulsado = true;
            this.idBoton2 = indiceCarta;
        } else {
            this.primerBotonPulsado = true;
            this.idBoton1 = indiceCarta;
        }

        // Establecemos el tamaño de la imagen, vamos a dejar un pequeño marco alrededor
        visorCarta.setFitWidth(125.0);
        visorCarta.setFitHeight(130.0);

        // Añadimos la imagen al botón
        botonPulsado.setGraphic(visorCarta);

        // identificar si se ha encontrado una pareja y reproducimos el sonido adecuado
        if (this.segundoBotonPulsado) {
            this.esPareja = juego.compruebaJugada(this.idBoton1, this.idBoton2);

            if (esPareja) {
                playerSonidos = new MediaPlayer(sonidoAcierto);
            } else {
                playerSonidos = new MediaPlayer(sonidoFallo);
            }

            playerSonidos.play();
            finIntento.play();
        }
    }

    /**
     * Este método permite finalizar un intento realizado. Se pueden dar dos situaciones:
     * <ul>
     * <li>Si se ha descubierto una pareja: en este caso se ocultarán las cartas desapareciendo del
     * tablero. Además,
     * se debe comprobar si la pareja descubierta es la última pareja del tablero y en ese caso
     * terminar la partida.</li>
     * <li>Si NO se ha descubierto una pareja: las imágenes de las cartas deben volver a ocultarse
     * (colocando su imagen a null).</li>
     * </ul>
     * Este método será interno y NO se podrá acceder desde la interfaz, por lo que NO incorpora
     * notación @FXML.
     */
    private void finalizarIntento() {
        // Reinicialmos los botones pulsados
        this.primerBotonPulsado = false;
        this.segundoBotonPulsado = false;

        // Incrementamos los intentos realizados
        this.intentos++;
        this.intentosLabel.setText(String.valueOf(intentos));

        // Ocultamos las imágenes seleccinoados si no son pareja, si son pareja, ocultamos la carta
        if (!esPareja) {
            cartas.get(idBoton1).setGraphic(null);
            cartas.get(idBoton2).setGraphic(null);
        } else {
            cartas.get(idBoton1).setVisible(false);
            cartas.get(idBoton2).setVisible(false);
        }

        // comprobar el final de partida
        // si es final de partida mostra el mensaje de victoria y detener el temporizador y la música
    }

    /**
     * Este método permite salir de la aplicación.
     * Debe mostrar una alerta de confirmación que permita confirmar o rechazar la acción
     * Al confirmar la acción la aplicación se cerrará (opcionalmente, se puede incluir algún efecto
     * de despedida)
     * Incluye la notación @FXML porque será accesible desde la interfaz de usuario
     */
    @FXML
    private void salir() {

        // Alerta de confirmación que permita elegir si se desea salir o no del juego
        // SOLO si se confirma la acción se cerrará la ventana y el juego finalizará.
        Platform.exit();
    }
}
