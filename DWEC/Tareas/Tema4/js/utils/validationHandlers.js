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

export { NAME, PASSWORD };
