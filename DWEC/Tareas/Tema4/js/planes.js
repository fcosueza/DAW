import { toUpperInput, resetForm } from "./utils/formUtils.js";

window.onload = onPageLoad;

/**
 * Función que se encarga de asignar los listener a los diferentes
 * elementos y de actualizar o crear la variable que se encarga de llevar el
 * registros de las visitas a la página.
 *
 */
function onPageLoad() {
  let planName = document.getElementById("planName");
  let sendButton = document.getElementById("sendButton");
  let deleteButton = document.getElementById("deleteButton");

  // Añadimos el evento para procesar en cambio de valor en el campo nombre
  planName.addEventListener("input", toUpperInput, true);
  sendButton.addEventListener("click", sendForm, true);
  deleteButton.addEventListener("click", resetForm, true);

  /*
   * Comprobamos si existe el contador en el localStorage y lo
   * incrementamos. Sino lo inicializamos.
   */

  if (localStorage.visits) {
    localStorage.visits = parseInt(localStorage.visits) + 1;
  } else {
    localStorage.setItem("visits", 1);
  }
}

function sendForm() {}
