/**
 * Función showTitle
 *
 * Función que procesa el cambio de título y de colores de la fuente y el contenedor. Para ello, primero
 * extrae la velocidad a la que se realiza la animación de cambio y a continuación aplica un slideUp al
 * título 1, para aplicar un slideDown, así como el cambio del color del segundo título y del contenedor
 * dentro de este efecto.
 *
 * Por último, oculta los controles para realizar el cambio de texto.
 *
 * @param {*} e Objeto de tipo Event con información sobre el evento disparado
 */

function showTitle(e) {
  let element = e.currentTarget;
  let speed = parseInt($("#velocidad").val());

  // Aplicamos el efecto slideUp y dentro realizamos los cambios necesarios
  $("#titulo_1").slideUp(speed, function () {
    $("#titulo_2").css("color", "white");
    $(".visual_txt").css("background-color", "black");
    $("#titulo_2").slideDown(speed);
  });

  // Ocultamos los controles del cambio de texto
  $(element).hide();
  $("#div_velocidad").hide();
}

/**
 * Función changeFont
 *
 * Función que procesa el valor del select donde se elige la fuente de los títulos y realiza
 * el cambio de la propiedad font-family en cada uno de ellos.
 *
 * @param {*} e Objeto de tipo Event con información sobre el evento disparado
 */

function changeFont(e) {
  let fontFamily = $(e.currentTarget).val();

  // Actualizamos la propiedad font-family de ambos títulos
  $("#titulo_1").css("font-family", fontFamily + ", serif");
  $("#titulo_2").css("font-family", fontFamily + ", serif");

  addToHistory("Cambiar fuente", fontFamily);
}

/**
 * Función changeLetterSpacing
 *
 * Esta función se encarga de obtener el valor del elemento que lanza el evento, en este
 * caso del input que determina el espaciado entre letras de los títulos, y a continuación
 * actualiza esta propiedad CSS en ambos títulos.
 *
 * @param {*} e Objeto de tipo Event con información sobre el evento disparado
 */

function changeLetterSpacing(e) {
  let letterSpacing = parseInt($(e.currentTarget).val());

  // Actualizamos el espaciado de letras de ambos títulos
  $("#titulo_1").css("letter-spacing", letterSpacing);
  $("#titulo_2").css("letter-spacing", letterSpacing);

  addToHistory("Cambiar espaciado letras", letterSpacing);
}

/**
 * Función addToHistory
 *
 * Función auxiliar que se encarga de añadir un elemento HTML con la acción que se le pasa como primer
 * parámetro al valor que se le pasa como segundo.
 *
 * @param {*} action Cadena de texto con la acción a añadir al historial
 * @param {*} value Cadena con el valor al que se ha realizado el cambio
 */
function addToHistory(action, value) {
  let htmlElement = "<li>" + action + " al valor " + value + "</li>";

  $("#historial_lista").prepend(htmlElement);
}

export { changeLetterSpacing, changeFont, showTitle };
