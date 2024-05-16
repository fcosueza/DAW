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
 * @author INDICAR NOMBRE DEL ALUMNO
 */
public class MemoriaController implements Initializable {

    // definición de variables internas para el desarrollo del juego
    private JuegoMemoria juego;         // instancia que controlará el estado del juego (tablero, parejas descubiertas, etc)
    private ArrayList<Button> cartas;   // array para almacenar referencias a las cartas @FXML definidas en la interfaz 
    private int segundos = 0;             // tiempo de juego
    private boolean primerBotonPulsado = false, segundoBotonPulsado = false; // indica si se han pulsado ya los dos botones para mostrar la pareja
    private int idBoton1, idBoton2;     // identificadores de los botones pulsados
    private boolean esPareja;           // almacenará si un par de botones pulsados descubren una pareja o no
    
    @FXML private AnchorPane main;      // panel principal (incluye la notación @FXML porque hace referencia a un elemento de la interfaz)

    // linea de tiempo para gestionar la finalización del intento al pasar 1.5 segundos
    private final Timeline finIntento = new Timeline(new KeyFrame(Duration.seconds(1.5), e -> finalizarIntento()));
    
    // linea de tiempo para gestionar el contador de tiempo del juego
    private Timeline contadorTiempo;

    
    
    /**
     * Método interno que configura todos los aspectos necesarios para inicializar el juego.
     *
     * @param url No utilizaremos este parámetro (null).
     * @param resourceBundle No utilizaremos este parámetro (null).
     */
    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {

        juego = new JuegoMemoria(); // instanciación del juego (esta instancia gestionará el estado de juego)
        juego.iniciarJuego();       // comienzo de una nueva partida
        cartas = new ArrayList<>(); // inicialización del ArrayList de referencias a cartas @FXML
        
        // guarda en el ArrayList "cartas" todas las referencias @FXML a las cartas para gestionarlo cómodamente

        
        // inicialización de todos los aspectos necesarios
        
        
        // contador de tiempo de la partida (Duration indica cada cuanto tiempo se actualizará)
        contadorTiempo = new Timeline(new KeyFrame(Duration.seconds(1), event -> {
              /// acciones a realizar (este código se ejecutará cada segundo)

        }));
        contadorTiempo.setCycleCount(Timeline.INDEFINITE);  // reproducción infinita
        contadorTiempo.play();                                // iniciar el contador en este momento

       
        // música de fondo para que se reproduzca cuando se inicia el juego

        
        
    }
    
    /**
     * Acción asociada al botón <strong>Comenzar nuevo juego</strong> que permite comenzar una nueva partida.
     *
     * Incluye la notación @FXML porque será accesible desde la interfaz de usuario
     * @param event Evento que ha provocado la llamada a este método
     */
    @FXML  private void reiniciarJuego(ActionEvent event) {
        
        // detener el contador de tiempo 
        
        
        // detener la reproducción de la música de fondo

        /* hacer visibles las 16 cartas de juego ya que es posible que no todas estén visibles 
           si se encontraron parejas en la partida anterior */
        
        
        // llamar al método initialize para terminar de configurar la nueva partida
        initialize(null,null);
    }

    /**
     * Este método deberá llamarse cuando el jugador haga clic en cualquiera de las cartas del tablero.
     *
     * Incluye la notación @FXML porque será accesible desde la interfaz de usuario
     * @param event Evento que ha provocado la llamada a este método (carta que se ha pulsado)
     */
    @FXML  private void mostrarContenidoCasilla(ActionEvent event) {

        String cartaId = ((Button) event.getSource()).getId(); // obtener el ID de la carta pulsada

        // gestionar correctamente la pulsación de las cartas (si es la primera o la segunda)
        // descubrir la imagen asociada a cada una de las cartas (y ajustar su tamaño al tamaño del botón)
        // identificar si se ha encontrado una pareja o no
        // reproducir el efecto de sonido correspondiente
        // finalizar intento (usar el timeline para que haga la llamada transcurrido el tiempo definido)

    }

    
    
    /**
     * Este método permite finalizar un intento realizado. Se pueden dar dos situaciones:
     * <ul>
     *    <li>Si se ha descubierto una pareja: en este caso se ocultarán las cartas desapareciendo del tablero. Además, 
     *    se debe comprobar si la pareja descubierta es la última pareja del tablero y en ese caso terminar la partida.</li>
     *    <li>Si NO se ha descubierto una pareja: las imágenes de las cartas deben volver a ocultarse (colocando su imagen a null).</li>
     * </ul>
     * Este método será interno y NO se podrá acceder desde la interfaz, por lo que NO incorpora notación @FXML.
     */  
    private void finalizarIntento() {
        
        // hacer desaparecer del tablero las cartas seleccionadas si forman una pareja
        // ocultar las imágenes de las cartas seleccionadas si NO forman una pareja
        // comprobar el final de partida 
        // si es final de partida mostra el mensaje de victoria y detener el temporizador y la música


    }

    
    
    /**
     * Este método permite salir de la aplicación.
     * Debe mostrar una alerta de confirmación que permita confirmar o rechazar la acción
     * Al confirmar la acción la aplicación se cerrará (opcionalmente, se puede incluir algún efecto de despedida)
     * Incluye la notación @FXML porque será accesible desde la interfaz de usuario
     */      
    @FXML   private void salir() {       
        
        // Alerta de confirmación que permita elegir si se desea salir o no del juego
        
        

        // SOLO si se confirma la acción se cerrará la ventana y el juego finalizará. 
        Platform.exit();
    }
}
