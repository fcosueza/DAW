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

  $("#titulo_1").css("letter-spacing", letterSpacing);
  $("#titulo_2").css("letter-spacing", letterSpacing);
}

export { changeLetterSpacing };
