/*
 * Ejercicio 2
 */

function cadenas() {
  let cadena = "";
  let cadenaResultado = "";
  let caracter = "";
  let número = 0;

  /*******************************************
   *                                         *
   *     Primera Parte del Ejercicio         *
   *                                         *
   * *****************************************/

  /*
   * Pedimos la cadena y el carácter. Si se introduce más de un carácter, solo se tendrá
   * en cuenta el primero.
   */

  cadena = window.prompt("Introduzca una cadena: ");
  caracter = window.prompt("Introduzca el carácter que quiere eliminar: ");
  caracter = caracter.charAt(0);

  /*
   * Para realizar este ejercicio vamos a recorrer la cadena carácter a carácter
   * comprobando si coincide con el introducido. Si es así, no se añadirá a la
   * cadena resultado, que iremos creando carácter a carácter.
   *
   * No se van a diferenciar entre mayúsculas y minúsculas.
   */

  for (let i = 0; i < cadena.length; i++) {
    if (!(cadena.charAt(i).toLowerCase() == caracter.toLowerCase())) cadenaResultado += cadena[i];
  }

  /* Mostramos el resultado */

  document.write("<h2>Eliminación de caracteres: </h2>");
  document.write(
    "<p>La cadena resultante es: " +
      '<span style="font-weight: bold;">' +
      cadenaResultado +
      "</span></p>"
  );

  /*******************************************
   *                                         *
   *     Segunda Parte del Ejercicio         *
   *                                         *
   * *****************************************/

  /*
   * Pedimos la cadena y el número. Como prompt devuelve una cadena, hacemos un casting
   * para transformalo en un número, además, eliminamos los decimales con toFixed. Pediremos
   * los datos hasta que el número introducido sea positivo.
   */

  cadenaResultado = "";
  cadena = window.prompt("Introduzca una cadena: ");

  do {
    numero = Number(window.prompt("Introduzca un entero positivo: ")).toFixed();
  } while (numero < 1);

  /*
   * Ahora vamos a realizar la conversión. Solo se van a pasar a mayúsculas o minúsculas
   * las letras, no tiene sentido hacerlo con los números o caracteres de puntuación.
   *
   * Para determinar si una letra esta esta en mayúsculas o minúsculas y hay que pasarla a una u otra,
   * tendremos en cuenta que en la tabla unicode, las mayúsculas se encuentran entre los valores 65
   *  y 90, estando las minúsculas entre 97 y 122.
   */

  for (let i = 0; i < cadena.length; i++) {
    if ((i + 1) % numero == 0) {
      if (cadena.charCodeAt(i) >= 65 && cadena.charCodeAt(i) <= 90) {
        cadenaResultado += cadena.charAt(i).toLowerCase();
      } else if (cadena.charCodeAt(i) >= 97 && cadena.charCodeAt(i) <= 122) {
        cadenaResultado += cadena.charAt(i).toUpperCase();
      } else {
        cadenaResultado += cadena.charAt(i);
      }
    } else {
      cadenaResultado += cadena.charAt(i);
    }
  }

  /* Mostramos el resultado */

  document.write("<h2>Invertir Mayúsculas y Minúsculas: </h2>");
  document.write(
    "<p>La cadena resultante es: " +
      '<span style="font-weight: bold;">' +
      cadenaResultado +
      "</span></p>"
  );
}
