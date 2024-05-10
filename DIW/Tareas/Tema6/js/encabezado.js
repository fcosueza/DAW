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

export default headerChange;
