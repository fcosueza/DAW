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

/*
 * Constante con los países admitidos para la nacionalidad
 */
const COUNTRIES = ["Germany", "Spain", "France", "Italy", "England"];

/**
 * Función que se encarga de validar el formulario, realizando llamadas a las
 * funciones que validan los diferentes campos.
 *
 * @param {*} formObject Objecto con el formulario a validad
 * @return true Si el formulario se ha validado correctamente y false en caso contrario
 */
function validateForm(formNode) {
  let result = [];
}

/**
 * Función que valida el campo del nombre del formulario.
 *
 * @param {*} inputNode Objecto con el nodo del campo a validar
 * @returns true si la validación a tenido éxito y false en caso contrario
 */
function validateName(inputNode) {
  let result = false;
  let errorNode = document.getElementById("nameError");
  let errorMsg = "";

  if (!inputNode.value || inputNode.value == "") {
    errorMsg = "*Este campo es obligatorio y no puede estar vacío.";
  } else if (!NAME.test(inputNode.value)) {
    errorMsg = "*El nombre no cumple con los requisitos";
  }

  if (errorMsg != "") {
    inputNode.focus();
    inputNode.classList.add("error");
    errorNode.innerHTML = errorMsg;
  } else {
    inputNode.classList.add("valid");
    errorNode.innerHTML = "";
  }

  return result;
}

/**
 * Función que se encarga de validar el campo de la contraseña del formulario
 *
 * @param {*} inputNode Objecto con el nodo del campo a validad
 * @returns true si la validación ha sido correcta y false en caso contrario
 */
function validatePass(inputNode) {
  let result = false;
  let errorNode = document.getElementById("passError");
  let errorMsg = "";

  if (!inputNode.value || inputNode.value == "") {
    errorMsg = "*Este campo es obligatorio y no puede estar vacío.";
  } else if (!PASSWORD.test(inputNode.value)) {
    errorMsg = "*La contraseña no cumple con los requisitos";
  }

  if (errorMsg != "") {
    inputNode.focus();
    inputNode.classList.add("error");
    errorNode.innerHTML = errorMsg;
  } else {
    inputNode.classList.add("valid");
    errorNode.innerHTML = "";
  }

  return result;
}

function validateRepPass(passNode, repeNode) {}

export { validateName, validatePass, NAME, PASSWORD };
