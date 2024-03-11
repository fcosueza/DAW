/*
 * Definición de las constantes con las diferentes expresiones
 * regulares que van a emplearse para la validación de los formularios.
 */

/*
 * Expresión que captura los caracteres de la A a la Z
 * tanto en mayúsculas como en minúsculas, con una tamaño de
 * entre 10 y 25 caracteres.
 */
const NAME = /^[a-zñçA-ZÑÇ]{10,25}$/;

/**
 * Expresión para validar el password. Vamos a explicar grupo por grupo, ya que es una expresión
 * regular bastante larga:
 *
 * - (?=\D): captura cualquier carácter que no sea un dígito.
 * - (?=.*\d\.$): se asegura de que la contraseña finaliza con un dígito y un punto.
 * - (?=^[^\d]*\d?[^\d]*\d?[^\d]*\d[^\d]*$): captura entre 1 y 3 dígitos de forma consecutiva o no consecutiva.
 * - (?!^[\,\$\ç]): comprueba que la contraseña no empiece por coma, dólar o cedilla. (,$ç)
 * - (?!.*\;): comprueba que la contraseña no contenga el carácter punto y coma. (;)
 * - (?!.*select): comprueba que la contraseña no contenga la palabra select.
 * - (?!.*where): comprueba que la contraseña no contenga la palabra where.
 * - (^.{8,21}$): establece el rango de caracteres a capturar entre 8 y 21.
 */
const PASSWORD =
  /(?=\D)(?=.*\d\.$)(?=^[^\d]*\d?[^\d]*\d[^\d]*\d?[^\d]*$)(?!^[\,\$\ç])(?!.*\;)(?!.*select)(?!.*where)(^.{8,21}$)/;

/**
 * Constante con todos los países aceptados en la selección de nacionalidad.
 */
const COUNTRIES = ["Alemania", "España", "Italia", "Francia", "Inglaterra"];

/**
 * Función que se encarga de validar el formulario, realizando llamadas a las diferentes
 * funciones que validan los campos. Dependiendo del formulario que se le pase, si es el
 * de solicitud o el de planes maléficos, llamará a unas u otras funciones.
 *
 * @param {*} formObject Objecto con el formulario a validad
 * @return true si el formulario se ha validado correctamente o false en caso contrario
 */
function validateQueryForm(formNode) {
  let result = false;

  let nameValidation = validateText(formNode.name, "text");
  let countryValidation = validateCountry(formNode.country);
  let passValidation = validateText(formNode.pass, "password");
  let passRepValidation = validatePassRep(formNode.passRep, formNode.pass);

  if (nameValidation && countryValidation && passValidation && passRepValidation) {
    result = true;
  }

  return result;
}

function validatePlanForm(formNode) {}

/**
 * Función que valida el campo del nombre o de la contraseña del formulario. Recibe como
 * parámetros el nodo del campo a validar y una cadena con el tipo de campo, pudiendo tener
 * los valores "text" o "password", para indicar que se va a validar un nombre o una
 * contraseña respectivamente.
 *
 * @param {*} inputNode Objecto con el nodo del campo a validar
 * @param string type  Indica si el campo a validar es de tipo nombre o contraseña.
 * @returns true si la validación a tenido éxito y false en caso contrario
 */
function validateText(inputNode, type = "text") {
  let result = false;
  let pattern;
  let errorNode;
  let errorMsg = "";

  // Comprobamos el tipo de campo que es y asignamos algunas variables
  if (type == "text") {
    pattern = NAME;
    errorNode = document.getElementById("nameError");
    errorMsg = "* El nombre ";
  } else {
    pattern = PASSWORD;
    errorNode = document.getElementById("passError");
    errorMsg = "* La contraseña ";
  }

  // Comprobamos si el campo es correcto y almacenamos el mensaje de error adecuado
  if (!inputNode.value || inputNode.value == "") {
    errorMsg = "* Este campo es obligatorio y no puede estar vacío";
  } else if (!pattern.test(inputNode.value)) {
    errorMsg = errorMsg + " no cumple con los requisitos";
  } else {
    errorMsg = "";
  }

  // Se comprueba si ha habido error y se cargan las clases y mensajes oportunos
  if (errorMsg != "") {
    inputNode.focus();
    inputNode.classList.add("error");
    errorNode.innerHTML = errorMsg;
  } else {
    inputNode.classList.add("valid");
    errorNode.innerHTML = "";
    result = true;
  }

  return result;
}

/**
 * Función que valida el campo de la nacionalidad. Aunque en este campo es menos
 * probable que recibamos valores incorrectos, ya que es un select, no esta de mas
 * comprobarlo.
 *
 * @param {*} formNode Nodo del formulario donde se quiere validar el campo.
 * @returns true si la validación ha sido correcta o false en caso contrario
 */
function validateCountry(formNode) {
  let result = false;
  let countryField = formNode.country;

  if (countryField == "" || COUNTRIES.includes(countryField) || !countryField) {
    result = true;
  } else {
    countryField.classList.add("error");
  }

  return result;
}

/**
 * Función que valida el campo donde se repite la contraseña. Recibe el nodo de
 * la contraseña y de dicho campo como parámetros, comprobando, además de la
 *  existencia de la contraseña, que las dos coinciden.
 *
 * @param {*} repNode Nodo con el campo de repetición de la contraseña
 * @param {*} passNode Nodo con el campo de al contraseña
 *
 * @returns true si al validación es correcta y false en caso contrario
 */
function validatePassRep(repNode, passNode) {
  let result = false;
  let errorNode = document.getElementById("passRepError");
  let errorMsg = "";

  // Comprobamos si el campo es correcto y almacenamos el mensaje de error adecuado
  if (!repNode.value || repNode.value == "") {
    errorMsg = "* Este campo es obligatorio y no puede estar vacío";
  } else if (!PASSWORD.test(repNode.value)) {
    errorMsg = "* La contraseña no cumple los requisitos";
  } else if (passNode.value != repNode.value) {
    errorMsg = "* Las contraseñas deben coincidir";
  }

  // Se comprueba si ha habido error y se cargan las clases y mensajes oportunos
  if (errorMsg != "") {
    repNode.focus();
    repNode.classList.add("error");
    errorNode.innerHTML = errorMsg;
  } else {
    repNode.classList.add("valid");
    errorNode.innerHTML = "";
    result = true;
  }

  return result;
}
export { validateQueryForm, validatePlanForm };
