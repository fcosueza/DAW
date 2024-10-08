/**********************************************************************
 *                                                                    *
 *   En este archivo se incluyen funciones auxiliares para trabajar   *
 *   con los formularios. Como funciones para manejar ciertos eventos *
 *   o funciones para limpiar el formulario y resetearlo.             *
 *                                                                    *
 **********************************************************************/

// Definición de constantes
const CSS_FOCUS_CLASS = "focus";

/**
 * Función que cambia el tipo del elemento input para repetir el password. Para ello
 * comprueba si el evento es de tipo mousedown, en cuyo caso cambia el tipo a text, cambiándolo
 * de nuevo al tipo password cuando se deja de pulsar el botón.
 *
 * @param {*} event Evento que llama a la función
 */
function showPass(event) {
  let passButton = document.getElementById("passRep");

  if (event.type == "mousedown") {
    passButton.type = "text";
  } else {
    passButton.type = "password";
  }
}

/**
 * Función que añade una clase al elemento que la llama, que cambia el color del
 * fondo. Según si el evento es focusin o focusout, la función añadirá o eliminará dicha
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

/**
 * Función que reinicia el formulario borrando todos los datos introducidos.
 * Se podría haber incluido simplemente el tipo "reset" en el botón, pero como se
 * pedía hacerlo con JS se ha usado la función reset() del elemento form, que tiene el mismo efecto.
 * Además limpia el formulario de clases con la función cleanForm.
 *
 * @param {*} event Evento que llama a la función
 */
function resetForm(event) {
  event.currentTarget.form.reset();
  cleanForm(event.currentTarget.form);
}

/**
 * Función que elimina todas las clases asociadas a la validación de un formulario,
 * así como los mensajes de error.
 *
 * @param {} formNode Objecto con el formulario que se desea limpiar
 */
function cleanForm(formNode) {
  let formElements = formNode.elements;
  let errorMsgNodes = document.querySelectorAll(".errorMsg");
  let result = document.getElementById("result");

  // Eliminamos el color de los inputs
  for (let i = 0; i < formElements.length; i++) {
    formElements[i].classList.remove("error");
    formElements[i].classList.remove("valid");
  }

  // Eliminamos los mensajes de error
  errorMsgNodes.forEach(node => {
    node.innerHTML = "";

    // Eliminamos el mensaje del resultado
    result.innerHTML = "";
  });
}

/**
 * Función que cambia el valor del elemento input que lo llama a
 * mayúsculas mientras se esta escribiendo.
 *
 * @param { } event Evento que llama a la función
 */
function toUpperInput(event) {
  event.currentTarget.value = event.currentTarget.value.toUpperCase();
}

export { showPass, onFocus, resetForm, cleanForm, toUpperInput };
