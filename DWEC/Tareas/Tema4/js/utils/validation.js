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
 * - (?=^[^\d]*\d?[^\d]*\d[^\d]*\d[^\d]*$): captura entre 1 y 3 dígitos de forma consecutiva o no consecutiva.
 * - (?!^[\,\$\ç]): comprueba que la contraseña no empiece por coma, dólar o cedilla. (,$ç)
 * - (?!.*\;): comprueba que la contraseña no contenga el carácter punto y coma. (;)
 * - (?!.*select): comprueba que la contraseña no contenga la palabra select.
 * - (?!.*where): comprueba que la contraseña no contenga la palabra where.
 * - (^.{8,21}$): establece el rango de caracteres a capturar entre 8 y 21.
 */
const PASSWORD =
  /(?=\D)(?=.*\d\.$)(?=^[^\d]*\d?[^\d]*\d[^\d]*\d[^\d]*$)(?!^[\,\$\ç])(?!.*\;)(?!.*select)(?!.*where)(^.{8,21}$)/;

/**
 * Función que se encarga de validar el formulario, realizando llamadas a las diferentes
 * funciones que validan los campos. Dependiendo del formulario que se le pase, si es el
 * de solicitud o el de planes maléficos, llamará a unas u otras funciones.
 *
 * @param {*} formObject Objecto con el formulario a validad
 * @return true si el formulario se ha validado correctamente o false en caso contrario
 */
function validateForm(formNode) {
  let result = false;

  let nameField = formNode.name;
  let countryField = formNode.country;
  let passField = formNode.pass;
  let passRepField = formNode.passRep;

  if (validateName(nameField, "text") && validateName(passField, "password")) {
    result = true;
  }

  return result;
}

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
function validateName(inputNode, type = "text") {
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
    errorMsg = "* Este campo es obligatorio y no puede estar vacío.";
  } else if (!pattern.test(inputNode.value)) {
    errorMsg = errorMsg + " no cumple con los requisitos.";
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

export { validateForm, NAME, PASSWORD };
