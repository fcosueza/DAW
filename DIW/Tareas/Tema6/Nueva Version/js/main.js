// Valores por defectos de la cabecera

const AVATAR_SRC = "images/waifu-1.jpeg";
const AVATAR_SIZE = "4rem";

// Valores por defecto de la zona de navegación

const CHECKBOX_CHECKED = "true";

// Valores por defecto del panel de imágenes

const MINI_CLASS = "img_miniaturas--selected";
const RADIO_SELECTED = "#horizontal";
const BG_COLOR = "#808080";

// Valores por defecto del contenedor de imágenes grandes
const BORDER_SIZE = "2";
const BORDER_COLOR = "#000000";

// Valores por defecto de las imágenes grandes
const FILTER = "none";
const SRC = "images/logo_ies_aguadulce.png";

// Mensaje por defecto del panel de visualización de orígenes de imagen
const IMG_SOURCE_MSG = "<p>Inserta orígenes de las imágenes</p>";

// Valores por defecto para la zona de texto
const SPEED = "0";
const LETTER_SPACING = 1;
const FONT = "Arial";

// Valores por defecto del contenedor de texto y el texto
const TXT_COLOR = "black";
const TXT_BG = "white";

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

// Evento para gestionar el cambio de la fuente en los títulos
$("#fuente").on("change", changeFont);

// Evento para procesador el cambio de titulo
$("#mostrar_slide").on("click", showTitle);

/**********************************************************
 *      Funciones Para manejar los diferentes apartados   *
 **********************************************************/

/**
 * Función inicializar
 *
 * Esta función se encarga de cargar todos los valores por defecto en la página
 * web, cambiando su estado al estado original.
 */
function inicializar() {
  /*
   * Estado inicial de la cabecera
   *
   * Se establece la imagen inicial y el tamaño de la cabecera.
   */

  $(".logo_cabecera").attr("src", AVATAR_SRC);
  $(".logo_cabecera").css("width", AVATAR_SIZE);

  /*
   * Estado inicial del menu de navegación
   *
   * Vamos a establecer los checkbox como marcados, ya que por defecto se
   * van a mostrar todas las secciones.
   */

  $("#imagen").prop("checked", CHECKBOX_CHECKED);
  $("#texto").prop("checked", CHECKBOX_CHECKED);

  /*
   * Estado inicial de las secciones de imágenes y texto
   *
   * Por defecto, ambas secciones se mostrarán, por lo que vamos a mostrarlos usando
   * la función fadeIn
   */

  $("section").fadeIn(100);

  /*
   * Estado inicial de las miniaturas de imágenes
   *
   * Vamos a recorrer todas las miniaturas y eliminar la clase que se aplica
   * cuando una de las miniaturas esta seleccionada. Por defecto, se seleccionará
   * la primera imagen.
   *
   * No es necesario usar el método each, ya que jQuery itera implícitamente sobre
   * la colección de objetos devueltos.
   */

  $(".img_miniaturas").removeClass(MINI_CLASS);
  $(".img_miniaturas").first().addClass(MINI_CLASS);

  /*
   * Estado inicial de lo controles sobre el panel de imágenes
   *
   * Establecemos el botón radio horizontal como seleccionado por defecto y el color
   * seleccionado por defecto en el color picker.
   *
   * Para establecer el radio button, vamos a usar trigger, de esa forma,
   * se colocará el panel en la orientación deseada, sin tener que establecerlo a parte.
   */

  $(RADIO_SELECTED).trigger("click");
  $("#seleccion_color").val(BG_COLOR);
  $(".visual_img").css("background-color", BG_COLOR);

  /* Estado inicial de los controles del contenedor de imagen e imagen seleccionada
   *
   * Establecemos el filtro Ninguno seleccionado por defecto, que no aplica ningún filtro,
   * así como el grosor de borde seleccionado a 0 y el color de borde por defecto.
   */

  $("#filtro").val(FILTER);
  $("#borde").val(BORDER_SIZE);
  $("#seleccion_color_borde").val(BORDER_COLOR);

  /*
   * Estado inicial de las imágenes del collage.
   *
   * Cambiamos el src de la imagen al inicial y quitamos los filtros, además de establecer
   * el color y tamaño del borde del contenedor a los valores por defecto.
   */

  $(".div_img_grande").find("img").css("filter", FILTER);
  $(".div_img_grande").find("img").attr("src", SRC);

  $(".div_img_grande").css("border-color", BORDER_COLOR);
  $(".div_img_grande").css("border-width", BORDER_SIZE);

  /*
   * Estado inicial del contenedor de orígenes de las imágenes.
   *
   * En este caso vamos a eliminar todos los párrafos que contenga el contenedor
   * y a añadir el párrafo que se visualizará por defecto. Por último mostramos el contenedor, que puede
   * ser que este oculto, dependiendo de la última interacción con el antes de la inicialización.
   */

  $("#origen_cont p").remove();
  $("#origen_cont").append(IMG_SOURCE_MSG);
  $("#origen_cont").show();

  /*
   * Estado inicial de los controles de la zona de texto
   *
   * Establecemos la velocidad, el espacio entre letras y marcamos una fuente
   * por defecto.
   */

  $("#separacion").val(LETTER_SPACING);
  $("#velocidad").val(SPEED);
  $("#fuente").val(FONT);

  // Cargamos los valores por defecto en los títulos
  $("#titulo_1").css({ "letter-spacing": LETTER_SPACING, "font-family": FONT });
  $("#titulo_2").css({ "letter-spacing": LETTER_SPACING, "font-family": FONT });

  // Mostramos el botón y el input para la velocidad, por si estuvieran ocultos
  $("#mostrar_slide").show();
  $("#div_velocidad").show();

  /*
   * Estado inicial de los títulos de texto y su contenedor
   *
   * Por defecto, el segundo título no se mostrará, y el color de fuente será negro y el fondo
   * del contenedor blanco.
   */

  $("#titulo_1").show();
  $("#titulo_2").hide();

  $(".visual_txt").css("background-color", TXT_BG);
  $("#titulo_1").css("color", TXT_COLOR);
  $("#titulo_2").css("color", TXT_COLOR);
}

/**
 * Función headerChange
 *
 * Función que aplica un efecto fadeOut en el elemento que ha disparado
 * el evento para posteriormente cambiar la imagen y su tamaño, aplicando
 * un efecto fadeIn para mostrar la nueva imagen.
 *
 * @param {*} e Objeto de tipo Event con información sobre el evento disparado
 */
function headerChange(e) {
  let element = e.currentTarget;

  // Realizamos el fadeOut y el cambio de imagen y tamaño
  $(element).fadeOut(1000, function () {
    $(element).attr("src", "images/logo_ies_aguadulce.png");
    $(element).css("width", "7rem");
  });

  // Realizamos el fadeIn
  $(element).fadeIn(1000);
}
/**
 * Función sectionShow
 *
 * Esta función muestra u oculta las secciones de imágenes y texto cuando se
 * selecciona algunos de los campos checkbox del área de navegación.
 *
 * Para conseguir los efectos se han usado las funciones slideToggle y fadeToggle, que
 * alternan los estados entre visible y no visible de los elementos según su estado
 * actual.
 *
 * Ya que por defecto los controles de navegación están marcados, para mostrar
 * las 2 secciones, no es necesario comprobar si están marcados o no, ya que cada
 * vez que se haga click en uno este se marcará o desmarcará y la sección pasará
 * al estado adecuado.
 *
 * @param {*} e Objeto de tipo Event con información sobre el evento disparado
 */
function sectionShow(e) {
  let value = "#" + $(e.currentTarget).val();

  // Según el valor del objeto, aplicamos slideToggle o fadeToggle
  if (value == "#img") {
    $(value).slideToggle(1000);
  } else {
    $(value).fadeToggle(1000);
  }
}

/**
 * Función selectMini
 *
 * Función que procesa el evento click en las miniaturas, eliminando la
 * class CSS correspondiente de todas las miniaturas y añadiéndola a la imagen
 * que ha lanzado el evento.
 *
 * @param { } e Objeto de tipo Event con información sobre el evento disparado
 */

function selectMini(e) {
  let element = e.currentTarget;

  $(".img_miniaturas").removeClass("img_miniaturas--selected");
  $(element).addClass("img_miniaturas--selected");
}

/**
 * Función panelDirection
 *
 * Función que procesa la selección de la dirección de las imágenes en el panel,
 * estableciendo el atributo CSS flex-direction en  row o column dependiendo del
 * radio button que se haya seleccionado.
 *
 * @param {*} e Objeto de tipo Event con información sobre el evento disparado
 */
function panelDirection(e) {
  let element = e.currentTarget;

  if ($(element).val() == "1") {
    $(".visual_img").css("flex-direction", "row");
  } else {
    $(".visual_img").css("flex-direction", "column");
  }
}

/**
 * Función backgroundColor
 *
 * Función que procesa el cambio de color en el fondo del panel de imágenes, cambiando
 * el atributo background-color en el elemento.
 *
 * @param {*} e Objeto de tipo Event con información sobre el evento disparado
 */
function backgroundColor(e) {
  let color = $(e.currentTarget).val();

  $(".visual_img").css("background-color", color);
}

/**
 * Función applyImageConfig
 *
 * Función que cambia los valores de la imagen aplicando la selección del usuario
 * sobre los diferentes aspectos configurables.
 *
 * El elemento que debe lanzar el evento debe ser el contenedor de la imagen, ya que es sobre
 * este, sobre el que se aplican el grosor del borde y su color, así como los efectos slide.
 *
 * Será sobre la imagen contenido dentro, usando para ello el método find, sobre la que se
 * se aplique filtro, además de cambiar la imagen fuente por la que este seleccionada en las
 * miniaturas.
 *
 * @param {*} e Objeto de tipo Event con información sobre el evento disparado
 */
function applyImageConfig(e) {
  let element = e.currentTarget;

  // Extraemos los datos de configuración a variables para trabajar más cómodamente
  let imgSource = $(".img_miniaturas--selected").attr("src");
  let filter = $("#filtro").val();
  let borderWidth = $("#borde").val();
  let borderColor = $("#seleccion_color_borde").val();

  // Según el filtro seleccionado, creamos una cadena con el filtro y el porcentaje adecuado
  switch (filter) {
    case "contrast":
      filter = filter + "(200%)";
      break;
    case "saturate":
      filter = filter + "(150%)";
      break;
    case "grayscale":
      filter = filter + "(100%)";
      break;
    case "invert":
      filter = filter + "(100%)";
      break;
    default:
      filter = "none";
  }

  // Aplicamos el efecto slideIn al contenedor y cambiamos dentro los valores CSS y atributos
  $(element).slideUp(500, function () {
    // Aplicamos los atributos al contenedor de la imagen
    $(element).css("border-width", borderWidth);
    $(element).css("border-color", borderColor);

    // Cambiamos el src de la imagen y le aplicamos el filtro
    $(element).find("img").css("filter", filter);
    $(element).find("img").attr("src", imgSource);
  });

  // Aplicamos el efecto slideDown
  $(element).slideDown(500);

  // Ocultamos el contenedor donde se muestran las fuentes de las imágenes
  $("#origen_cont").hide();
}

/**
 * Función showSources
 *
 * Función que se encarga de mostrar las fuentes de las imágenes que hay cargadas en el
 * collage.
 *
 * En primer lugar elimina todos los párrafos dentro del contenedor donde se mostrará
 * el texto y muestra el contenedor, en caso de que estuviera oculto. A continuación itera
 * por las 3 imágenes cargadas generando un párrafo HTML y añadiéndolo como hijo al contenedor.
 *
 * @param {*} e Objeto de tipo Event con información sobre el evento disparado
 */

function showSources(e) {
  // Preparamos el contenedor para mostrar las imágenes
  $("#origen_cont").find("p").remove();
  $("#origen_cont").show();

  // Iteramos por las imágenes generando el elemento HTML y añadiéndolo al contenedor
  $(".img_grande").each(function (index) {
    let para =
      "<p><strong>Imagen - " + (index + 1) + ":</strong> Tiene como origen: <i>" + $(this).attr("src") + "</i></p>";

    $("#origen_cont").append(para);
  });
}

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
