import headerChange from "./encabezado.js";
import sectionShow from "./navegacion.js";

// Evento de click para el logo de la cabecera
$(".logo_cabecera").on("click", headerChange);

// Evento de click para los checkbox del menú de navegación
$("#imagen").on("click", sectionShow);
$("#texto").on("click", sectionShow);
