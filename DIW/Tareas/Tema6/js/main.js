import inicializar from "./inicializar.js";
import headerChange from "./encabezado.js";
import sectionShow from "./navegacion.js";
import { selectMini, panelDirection, backgroundColor, applyImageConfig, showSources } from "./imagenes.js";
import { changeLetterSpacing } from "./texto.js";

/*
 * Función a ejecutar cuando se carga la página.
 *
 * Desde la versión 3.0 de jQuery, es la sintaxis recomendada, estando
 * marcadas como obsoletas el resto.
 */
$(inicializar);

// Evento de click para el logo de la cabecera
$(".logo_cabecera").on("click", headerChange);

// Evento de click para los checkbox del menú de navegación
$("#imagen").on("click", sectionShow);
$("#texto").on("click", sectionShow);

// Evento para el botón Inicializar
$("#inicializar").on("click", inicializar);

// Evento para seleccionar las miniaturas
$(".img_miniaturas").on("click", selectMini);

// Evento para gestionar la dirección del las imágenes en el panel
$("input[name='alineacion']").on("click", panelDirection);

// Evento para establecer el color del fondo del panel
$("#seleccion_color").on("change", backgroundColor);

// Evento que maneja el click sobre una imagen del collage
$(".div_img_grande").on("click", applyImageConfig);

// Evento que para gestionar la visualización de las fuentes de las imágenes
$(".bot_origen").on("click", showSources);

// Evento para gestionar el cambio de espaciado entre las letras en los títulos
$("#separacion").on("change", changeLetterSpacing);
