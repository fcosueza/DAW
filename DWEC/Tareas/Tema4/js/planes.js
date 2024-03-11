import { toUpperInput, resetForm } from "./utils/formUtils.js";
import { validatePlanForm } from "./utils/validation.js";

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

function sendForm(event) {
  let formNode = event.currentTarget.form;

  let planName = document.getElementById("planName").value;
  let planCode = document.getElementById("planCode").value;
  let planType = document.querySelector("input:checked");
  let planCountry = document.getElementById("countryPlan").value;

  let result = document.getElementById("result");

  event.preventDefault();

  if (validatePlanForm(formNode)) {
    result.innerHTML = `<h3 class="result__title">Formulario Correcto</h3>
     <p class="result__para">El formulario se ha enviado correctamente, los datos son: </p>
     <ul class="result__list">
       <li class="result__data">Nombre del Plan: ${planName}</li>
       <li class="result__data">Código del Plan: ${planCode}</li>
       <li class="result__data">Tipo de Plan: ${planType.value}</li>
       <li class="result__data">País de Ejecución: ${planCountry}</li> <br>
       <li class="result__data">Número de Visitas: ${localStorage.visits}</li>
     </ul> <br>`;
  } else {
    result.innerHTML = `<h3 class="result__title">Formulario Incorrecto</h3>
    <p class="result__para">Los datos son incorrectos, corrija los campos indicados.</p>`;
  }
}
