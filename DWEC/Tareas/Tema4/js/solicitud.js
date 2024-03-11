import * as validation from "./utils/validation.js";
import { cleanForm, showPass, onFocus, resetForm } from "./utils/formUtils.js";

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

  // Añadimos los eventos al botón para visualizar el password

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
/**
 * Función que se encarga de procesar el formulario. Primero llama a la función
 * para validarlo y a continuación muestra el resultado, en caso de que se haya
 * validado correctamente, o un mensaje de error indicando que el formulario no se
 * ha podido enviar.
 *
 * @param {*} event Evento que llama a la función
 */
function sendForm(event) {
  let formNode = event.currentTarget.form;
  let countryField = document.getElementById("country");
  let passField = document.getElementById("pass");
  let passRepField = document.getElementById("passRep");

  event.preventDefault();

  cleanForm(document.getElementById("form"));

  validation.validateForm(formNode);

  if (
    passRepField.value == "" ||
    passRepField.value != passField.value ||
    !validation.PASSWORD.test(passRepField.value)
  ) {
    passRepField.focus();
    passRepField.classList.add("error");
    document.getElementById("passRepError").innerHTML = "<p>*La contraseña no se ha introducido correctamente.</p>";
  } else {
    passRepField.classList.add("valid");
    document.getElementById("passRepError").innerHTML = "";
  }
}
