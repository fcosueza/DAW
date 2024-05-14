import * as defState from "./default.js";

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

  $(".logo_cabecera").attr("src", defState.AVATAR_SRC);
  $(".logo_cabecera").css("width", defState.AVATAR_SIZE);

  /*
   * Estado inicial del menu de navegación
   *
   * Vamos a establecer los checkbox como marcados, ya que por defecto se
   * van a mostrar todas las secciones.
   */

  $("#imagen").prop("checked", defState.CHECKBOX_CHECKED);
  $("#texto").prop("checked", defState.CHECKBOX_CHECKED);

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

  $(".img_miniaturas").removeClass(defState.MINI_CLASS);
  $(".img_miniaturas").first().addClass(defState.MINI_CLASS);

  /*
   * Estado inicial de lo controles sobre el panel de imágenes
   *
   * Establecemos el botón radio horizontal como seleccionado por defecto y el color
   * seleccionado por defecto en el color picker.
   *
   * Para establecer el radio button, vamos a usar trigger, de esa forma,
   * se colocará el panel en la orientación deseada, sin tener que establecerlo a parte.
   */

  $(defState.RADIO_SELECTED).trigger("click");
  $("#seleccion_color").val(defState.BG_COLOR);
  $(".visual_img").css("background-color", defState.BG_COLOR);

  /* Estado inicial de los controles del contenedor de imagen e imagen seleccionada
   *
   * Establecemos el filtro Ninguno seleccionado por defecto, que no aplica ningún filtro,
   * así como el grosor de borde seleccionado a 0 y el color de borde por defecto.
   */

  $("#filtro").val(defState.FILTER);
  $("#borde").val(defState.BORDER_SIZE);
  $("#seleccion_color_borde").val(defState.BORDER_COLOR);

  /*
   * Estado inicial de las imágenes del collage.
   *
   * Cambiamos el src de la imagen al inicial y quitamos los filtros, además de establecer
   * el color y tamaño del borde del contenedor a los valores por defecto.
   */

  $(".div_img_grande").find("img").css("filter", defState.FILTER);
  $(".div_img_grande").find("img").attr("src", defState.SRC);

  $(".div_img_grande").css("border-color", defState.BORDER_COLOR);
  $(".div_img_grande").css("border-width", defState.BORDER_SIZE);

  /*
   * Estado inicial del contenedor de orígenes de las imágenes.
   *
   * En este caso vamos a eliminar todos los párrafos que contenga el contenedor
   * y a añadir el párrafo que se visualizará por defecto. Por último mostramos el contenedor, que puede
   * ser que este oculto, dependiendo de la última interacción con el antes de la inicialización.
   */

  $("#origen_cont p").remove();
  $("#origen_cont").append(defState.IMG_SOURCE_MSG);
  $("#origen_cont").show();

  /*
   * Estado inicial de los controles de la zona de texto
   *
   * Establecemos la velocidad, el espacio entre y marcamos una fuente
   * por defecto.
   */

  $("#separacion").val(defState.LETTER_SPACING);
  $("#velocidad").val(defState.SPEED);
  $("#fuente").val(defState.FONT);

  /*
   * Estado inicial de los títulos de texto
   *
   * Por defecto, el segundo título no se mostrará, utilizamos el método fadeOut
   * para ocultarlo.
   */

  $("#titulo_2").fadeOut(1);
}

export default inicializar;
