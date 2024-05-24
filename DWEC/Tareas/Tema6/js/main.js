// Constante con la clave para la API de Visual Crossing
const API_KEY = "K8JKJB2DY35CGV24Y6QDXNGYL";

// Parte constante de la URI de la API de Visual Crossing
const BASE_URI = "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/";

// Opciones por defecto para la API de Visual Crossing, como el lenguaje o el tipo de unidades
const API_OPT = "&lang=es&unitGroup=metric";

// País por defecto cuando se no especifica uno
const DEFAULT_COUNTRY = "ES";

// Ciudad por defecto si no se incluye ninguna
const DEFAULT_CITY = "Granada";

// Evitamos que el formulario se envíe por defecto
$(".form").on("submit", e => e.preventDefault());

// Añadimos el handler del evento en el botón de la previsión de hoy
$("#btnActual").on("click", showTodayForecast);

// Añadimos el handler del evento en el botón de la previsión de 10 días
$("#btnDays").on("click", showDaysForecast);

/**
 * Función showTodayForecast
 *
 * @param {*} event
 */
function showTodayForecast(event) {
  let { ciudad, pais } = getInput();

  // Realizamos la consulta empleando la API fetch
  fetch(BASE_URI + ciudad + "," + pais + "/today?key=" + API_KEY + API_OPT)
    .then(response => response.json())
    .then(result => console.log(result))
    .catch(console.warn);
}

/**
 * Función showDaysForecast
 *
 * Función que muestra una previsión meteorológica de los próximos 10 días, incluyendo el
 * día de actual. Para ello realiza una petición a la API de Visual Crossing empleando
 * la API Fetch de Javascript y crea diferentes elementos para visualizar el resultado.
 *
 * @param {*} event Objeto de tipo Event con información sobre el evento disparado
 */
function showDaysForecast(event) {
  let { ciudad, pais } = getInput();

  // Realizamos la consulta empleando la API fetch
  fetch(BASE_URI + ciudad + "," + pais + "/next9days?key=" + API_KEY + "&lang=es&unitGroup=metric")
    .then(response => response.json())
    .then(result => {
      // Eliminamos todos los hijos del contenedor donde se visualizan los resultados, para que no se pisen
      $(".container-result").empty();

      // Iteramos por todos los días del resultado mostrando los datos
      result["days"].forEach(day => {
        // Creamos los elementos para visualizar cada previsión
        let div = document.createElement("div");
        let iconImg = document.createElement("img");
        let temp = document.createElement("p");

        // Añadimos las clases y contenidos a los elementos creados
        $(div).addClass("smallForecast flex");
        $(iconImg).attr("src", "../img/" + day["icon"] + ".svg");
        $(temp).text(day["tempmax"] + "°C / " + day["tempmin"] + "°C");

        /* Añadimos los elementos al contenedor.

         * Como usamos el selector de clase, que seleccionará todos los elementos,
         * añadimos los nuevos elementos al último elemento con la clase container-result
         * añadido, utilizando el método last().
         */
        $(".container-result").append(div);
        $(".smallForecast").last().append(iconImg);
        $(".smallForecast").last().append(temp);
      });

      // Resaltamos el día de hoy, que es el primer elemento agregado.
      $(".smallForecast").first().css("background-color", "lightblue");
    })
    .catch(console.warn);
}

/**
 * Función getInput
 *
 * Función que se encarga de procesar la entrada y comprobar que datos se han introducido o no.
 * Los datos que no se hayan introducido se rellenarán con los valores por defecto.
 *
 * @returns Un objeto con la ciudad y el país de la localización
 */
function getInput() {
  let input = new Array();

  // Procesamos la entrada
  input = $(".form-input").val().split(",");

  // Se comprueba que parámetros se han introducido, para rellenar los datos por defecto o no
  if (input[0] == "") {
    input[0] = DEFAULT_CITY;
    input[1] = DEFAULT_COUNTRY;
  } else if (input.length == 1) {
    input[1] = DEFAULT_COUNTRY;
  }

  // Devolvemos un objeto con los datos de la localización
  return { ciudad: input[0], pais: input[1] };
}
