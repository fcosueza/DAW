// Definición de constantes
const CSS_FOCUS_CLASS = "focus";

// Ejecutamos la función onPageLoad cuando se carga la página
window.onload = onPageLoad;

/**
 * Función que se encarga de asignar todos los eventos a los diferentes elementos
 * de la página cuando ésta se carga.
 */
function onPageLoad() {
  let sendButton = document.getElementById("sendButton");
  let resetButton = document.getElementById("resetButton");
  let passButton = document.getElementById("showpass");

  let formElements = sendButton.form.elements;

  // Añadimos los eventos a los botones de enviar y reset.

  sendButton.addEventListener("click", sendForm, false);
  resetButton.addEventListener("click", resetForm, false);

  passButton.addEventListener("mousedown", showPass, false);
  passButton.addEventListener("mouseup", showPass, false);

  /*
   * Vamos a usar los eventos focusin y focusout pasar saber cuando
   * coge o pierde el focus un elemento de tipo input.
   */

  for (let i = 0; i < formElements.length; i++) {
    if (formElements[i].type == "text" || formElements[i].type == "password") {
      formElements[i].addEventListener("focusin", onFocus, true);
      formElements[i].addEventListener("focusout", onFocus, true);
    }
  }
}

function sendForm(event) {
  event.preventDefault();
}

/**
 * Función que reinicia el formulario borrando todos los datos introducidos.
 * Se podría haber incluido simplemente el tipo "reset" en el botón, pero como se
 * pedía hacerlo con JS se ha usado la función reset() del elemento form, que tiene el mismo efecto.
 *
 * @param {*} event Evento que llama a la función
 */
function resetForm(event) {
  event.currentTarget.form.reset();
}
/**
 * Función que cambia el tipo del elemento input para repetir el password. Para ello
 * comprueba si el evento es de tipo mousedown, en cuyo caso cambia el tipo a text, cambiándolo
 * de nuevo al tipo password cuando se deja de pulsar el botón.
 *
 * @param {*} event Evento que llama a la función
 */
function showPass(event) {
  let passButton = document.getElementById("pass-rep");

  if (event.type == "mousedown") {
    passButton.type = "text";
  } else {
    passButton.type = "password";
  }
}

/**
 * Función que añade una clase al elemento que la llama, que cambia el color del
 * fondo. Según su el evento es focusin o focusout, la función añadirá o eliminará dicha
 * clase, para que solo se cambie el color del elemento cuando tiene el focus, pero no
 * cuando lo pierde.
 *
 * @param {*} event Evento que llama a la función
 */
function onFocus(event) {
  let currentNode = event.currentTarget;

  if (event.type == "focusin") {
    currentNode.classList.add(CSS_FOCUS_CLASS);
  } else {
    currentNode.classList.remove(CSS_FOCUS_CLASS);
  }
}
