import { validateQueryForm } from "./utils/validation.js";
import { showPass, onFocus, resetForm } from "./utils/formUtils.js";

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

  let name = document.getElementById("name").value;
  let country = document.getElementById("country").value;
  let pass = document.getElementById("pass").value;

  let result = document.getElementById("result");

  event.preventDefault();

  if (validateQueryForm(formNode)) {
    result.innerHTML = `<h3 class="result__title">Formulario Correcto</h3>
     <p class="result__para">El formulario se ha enviado correctamente, los datos son: </p>
     <ul class="result__list">
       <li class="result__data">Nombre: ${name}</li>
       <li class="result__data">Nacionalidad: ${country}</li>
       <li class="result__data">Contraseña: ${pass}</li>
     </ul>`;
  } else {
    result.innerHTML = `<h3 class="result__title">Formulario Incorrecto</h3>
    <p class="result__para">Los datos son incorrectos, corrija los campos indicados.</p>`;
  }
}
