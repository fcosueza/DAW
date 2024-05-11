import headerChange from "./encabezado.js";
import sectionShow from "./navegacion.js";
import inicializar from "./inicializar.js";

// Evento para que se inicialice el estado original de la página.
$(document).on("load", inicializar);

// Evento de click para el logo de la cabecera
$(".logo_cabecera").on("click", headerChange);

// Evento de click para los checkbox del menú de navegación
$("#imagen").on("click", sectionShow);
$("#texto").on("click", sectionShow);

// Evento para el botón Inicializar
$("#inicializar").on("click", inicializar);
