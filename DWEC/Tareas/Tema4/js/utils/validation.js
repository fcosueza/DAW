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
 * Función que se encarga de validar el formulario de solicitud, realizando llamadas a las diferentes
 * funciones que validan los campos.
 *
 * @param {*} formObject Objecto con el formulario a validad
 * @return true si el formulario se ha validado correctamente o false en caso contrario
 */
function validateQueryForm(formNode) {
  let result = false;

  let nameValidation = validateName(formNode.name);
  let countryValidation = validateCountry(formNode.country);
  let passValidation = validatePassword(formNode.pass, formNode.passRep);

  if (nameValidation && countryValidation && passValidation) {
    result = true;
  }

  return result;
}

/**
 * Función que se encarga de validar el formulario del plan maligno. Este formulario ya
 * se está validando con HTML5, por lo que no vamos a necesitar funciones de validación a parte,
 * ya que casi todo el trabajo lo realiza HTML5. Aquí solo vamos a comprobar que los campos no estén
 * en blanco.
 *
 * @param {*} formNode Nodo del formulario que se quiere validar.
 */
function validatePlanForm(formNode) {
  let planName = formNode.planName;
  let planCode = formNode.planCode;
  let planType = document.querySelector("input:checked");

  let result = true;

  // Comprobamos si los valores obligatorios están en blanco
  if (planName.value == "") {
    planName.setCustomValidity("Este campo es obligatorio.");
    result = false;
  } else {
    planName.setCustomValidity("");
  }

  if (planCode.value == "") {
    planCode.setCustomValidity("Este campo es obligatorio.");
    result = false;
  } else {
    planCode.setCustomValidity("");
  }

  if (planType == null) {
    result = false;
  }

  return result;
}
/**
 * Función que valida el campo del nombre del formulario.
 *
 * @param {*} inputNode Objecto con el nodo del campo a validar
 * @returns true si la validación a tenido éxito y false en caso contrario
 */
function validateName(inputNode) {
  let result = false;
  let pattern = NAME;
  let errorNode = document.getElementById("nameError");

  // Comprobamos si el campo es correcto y cargamos las clases adecuadas.
  if (!inputNode.value || inputNode.value == "" || !pattern.test(inputNode.value)) {
    setInvalid(inputNode);
    errorNode.innerHTML = "* Este campo es incorrecto";
  } else {
    setValid(inputNode);
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
 * Función que se encarga de validar la contraseña. Valida tanto el campo
 * donde se introduce la contraseña como el campo donde se tiene que repetir.
 * Si ambos son correctos, la contraseña de dará por válida.
 *
 * @param {*} repNode Nodo con el campo de repetición de la contraseña
 * @param {*} passNode Nodo con el campo de al contraseña
 *
 * @returns true si al validación es correcta y false en caso contrario
 */
function validatePassword(passNode, passRepNode) {
  let result = false;

  let errorPass = document.getElementById("passError");
  let errorRep = document.getElementById("passRepError");
  let pattern = PASSWORD;

  // Comprobamos si la contraseña es correcta y cargamos los mensajes y clases adecuados.
  if (!passNode.value || passNode.value == "" || !pattern.test(passNode.value)) {
    setInvalid(passNode);
    errorPass.innerHTML = "* Este campo es incorrecto.";
  } else {
    setValid(passNode);
    errorPass.innerHTML = "";
  }

  // Por último, comprobamos si el campo donde se repite la contraseña es correcto.
  if (passNode.value != passRepNode.value || (passNode.value == passRepNode.value && errorPass.innerHTML != "")) {
    setInvalid(passRepNode);
    errorRep.innerHTML = "* Este campo es incorrecto.";
  } else {
    setValid(passRepNode);
    errorRep.innerHTML = "";
    result = true;
  }

  return result;
}
/**
 * Función que carga las clases de un campo válido
 *
 * @param {*} node Nodo donde se quieren cargar las clases
 */
function setValid(node) {
  node.classList.remove("error");
  node.classList.add("valid");
}

/**
 * Función que carga las clases de un campo erróneo
 *
 * @param {*} node Nodo donde se quieren cargar las clases
 */
function setInvalid(node) {
  node.focus();
  node.classList.remove("valid");
  node.classList.add("error");
}

export { validateQueryForm, validatePlanForm };
