/**
 * Archivo con los script para modificar la cabecera de la pagina.
 */

/**
 * Función headerChange
 *
 * Función que aplica un efecto fadeOut en el elemento que ha disparado
 * el evento para posteriormente cambiar la imagen y su tamaño, aplicando
 * un efecto fadeIn para mostrar la nueva imagen.
 *
 * @param {*} e Evento disparado
 */
function headerChange(e) {
  let current = e.currentTarget;

  // Realizamos el fadeOut y el cambio de imagen y tamaño
  $(current).fadeOut(1000, function () {
    $(this).attr("src", "images/logo_ies_aguadulce.png");
    $(this).css("width", "7rem");
  });

  // Realizamos el fadeIn
  $(current).fadeIn(1000);
}

export default headerChange;
