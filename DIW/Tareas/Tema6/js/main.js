import headerChange from "./encabezado.js";
import sectionShow from "./navegacion.js";
import inicializar from "./inicializar.js";
import { selectMini, panelDirection, backgroundColor, applyImageConfig } from "./imagenes.js";

/*
 * Función a ejecutar cuando se carga la página.
 *
 * Desde la versión 3.0 de jQuery, es la sintaxis recomendada, estando
 * deprecadas el resto.
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