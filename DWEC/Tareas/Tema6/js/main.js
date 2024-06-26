// Constante con la clave para la API de Visual Crossing
const API_KEY_VC = "";

// Parte constante de la URI de la API de Visual Crossing
const BASE_URI_VC = "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/";

// Parte constante la URI de la API de GeoDB
const BASE_URI_GEO =
  "http://geodb-free-service.wirefreethought.com/v1/geo/places?limit=5&offset=0&types=CITY&namePrefix=";

// Opciones por defecto para la API de Visual Crossing, como el lenguaje o el tipo de unidades
const API_OPT_VC = "&lang=es&unitGroup=metric";

// Opciones por defecto de la llamada a la API de GeoDB
const API_OPT_GEO = "&languageCode=es";

// País por defecto cuando no se especifica uno
const DEFAULT_COUNTRY = "ES";

// Ciudad por defecto si no se incluye ninguna
const DEFAULT_CITY = "Granada";

// Coordenadas para el mapa por defecto (Granada Capital)
const DEFAULT_LATI = 37.18817;
const DEFAULT_LONG = -3.60667;

// Función que se ejecuta cuando se carga la página por primera vez o se recarga
$(init);

// Evitamos que el formulario se envíe por defecto
$(".form").on("submit", e => e.preventDefault());

// Añadimos el handler del evento en el botón de la previsión de hoy
$("#btnActual").on("click", showTodayForecast);

// Añadimos el handler del evento en el botón de la previsión de 10 días
$("#btnDays").on("click", showDaysForecast);

$("#btnLocal").on("click", mapShow);

// Inicializamos el mapa
let map = L.map("map").setView([DEFAULT_LATI, DEFAULT_LONG], 12);

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

/**
 * Función showTodayForecast
 *
 * @param {*} event
 */
function showTodayForecast(event) {
  init();

  let { ciudad, pais } = getInput();

  // Realizamos la consulta empleando el método .ajax() de JQuery
  $.ajax({
    // Configuración básica de la consulta
    url: BASE_URI_VC + ciudad + "," + pais + "/today?key=" + API_KEY_VC + API_OPT_VC,
    type: "GET",
    dataType: "json",

    // Procesamos los datos si la query tiene éxito
    success: data => {
      let dataToday = data["days"][0];

      // Cargamos los datos principales
      $(".result-icon").attr("src", "../img/" + dataToday["icon"] + ".svg");
      $(".result-temp").text(dataToday["tempmax"] + "°C / " + dataToday["tempmin"] + "°C");
      $(".result-descript").text(data["description"]);

      // Cargamos el resto de datos
      $("#dataUV").text("Indice U.V: " + dataToday["uvindex"]);
      $("#dataVisi").text("Visibilidad: " + dataToday["visibility"] + "km");
      $("#dataHumi").text("Humedad Relativa: " + dataToday["humidity"] + "%");

      // Si la probabilidad de precipitación es 0, el tipo será nulo, mejor mostramos otra cadena
      $("#dataPrec").text(
        "Prob. de Precipitación: " + dataToday["precipprob"] + "% Tipo: " + (dataToday["preciptype"] ?? "Ninguno")
      );

      // Si no hay viento, no se mostrará este dato
      if (dataToday["windspeed" == 0]) {
        $("#dataWind").hide();
        $("#dataWind").text("");
      } else {
        $("#dataWind").text("Vel. viento: " + dataToday["windspeed"] + "Km/h Dirección: " + dataToday["winddir"]);
        $("#dataWind").show();
      }

      // Por último cargamos las estaciones
      $(".result-stations").text("Estaciones: " + Object.keys(data["stations"]).join(" | "));

      // Cargamos la latitud y longitud en el mapa
      map.panTo(new L.LatLng(data["latitude"], data["longitude"]));

      // Mostramos el contenedor con el resultado de la predicción y el map
      $(".result-actual").show();
      $("#map").show();
    },

    error: (xhr, estado) => {
      console.log("Error producido: La ubicación introducida no existe");
      console.log("Estado: " + estado);
    },
  });
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
  init();

  let { ciudad, pais } = getInput();

  // Realizamos la consulta empleando la API fetch
  fetch(BASE_URI_VC + ciudad + "," + pais + "/next9days?key=" + API_KEY_VC + API_OPT_VC)
    .then(response => response.json())
    .then(result => {
      // Eliminamos todos los hijos del contenedor donde se visualizan los resultados, para que no se pisen
      $(".result-days").empty();

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
         * creado, utilizando el método last() para ello.
         */
        $(".result-days").append(div);
        $(".smallForecast").last().append(iconImg);
        $(".smallForecast").last().append(temp);
      });

      // Resaltamos el día de hoy, que es el primer elemento agregado.
      $(".smallForecast").first().css("background-color", "lightblue");
    })
    .catch(console.warn);

  // Mostramos el contenedor de resultados de la previsión de 10 días, por si esta oculto
  $(".result-days").show();
}

/**
 * Función mapShow
 *
 * Función que realiza una llamada a la API de GeoDB empleando para ello la API Fetch.
 * Una vez realizada, recorre todas las localizaciones resultantes hasta encontrar una
 * coincidente con el país introducido y carga los datos en el mapa mostrándolo.
 *
 * @param {*} e Objeto con información sobre el evento que se ha disparado
 */
function mapShow(e) {
  init();

  let { ciudad, pais } = getInput();

  console.log(ciudad + pais);

  fetch(BASE_URI_GEO + ciudad + API_OPT_GEO)
    .then(response => response.json())
    .then(data => {
      data["data"].forEach(location => {
        if (location["countryCode"] == pais) {
          map.panTo(new L.LatLng(location["latitude"], location["longitude"]));
        }
      });
    });

  // Cambiamos el tamaño del mapa y lo mostramos
  $("#map").show();
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

/**
 * Función init
 *
 * Función simple que se encarga de ocultar los resultados de las predicciones,
 * para dejar la interfaz limpia. Se usa tanto en la carga de la página como en cada función
 * que se encarga de mostrar un resultado
 */
function init() {
  $(".result-actual").hide();
  $(".result-days").hide();
  $("#map").hide();
}
