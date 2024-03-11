window.onload = onPageLoad;

/**
 * Función que se encarga de asignar los listener a los diferentes
 * elementos y de actualizar o crear la variable que se encarga de llevar el
 * registros de las visitas a la página.
 *
 */
function onPageLoad() {
  let planName = document.getElementById("planName");
  let formElements = document.getElementById("form").elements;

  // Añadimos el evento para procesar en cambio de valor en el campo nombre
  planName.addEventListener("input", updateValue, true);

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

/**
 * Función que cambia el valor del elemento input que lo llama a
 * mayúsculas mientras se esta escribiendo.
 *
 * @param { } event Evento que llama a la función
 */
function updateValue(event) {
  event.currentTarget.value = event.currentTarget.value.toUpperCase();
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
    currentNode.classList.add("focus");
  } else {
    currentNode.classList.remove("focus");
  }
}
