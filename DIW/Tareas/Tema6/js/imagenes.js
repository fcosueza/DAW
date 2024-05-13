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

  // Aplicamos el efecto slideIn a la imagen y cambiamos dentro los valores CSS y atributos
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

export { selectMini, panelDirection, backgroundColor, applyImageConfig };
