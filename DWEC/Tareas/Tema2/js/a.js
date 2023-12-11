/*
 * Ejercicio 1
 */

function bruja() {
  let pregunta = "";
  let respuesta = "";
  let count = 1;

  let salir = false;
  let rand;

  /*
   * Realizamos la pregunta hasta que se introduzca la cadena DWEC
   */

  do {
    pregunta = window.prompt("Introduzca una pregunta (incluya DWEC para acabar: ");
    rand = Math.random();

    if (pregunta.includes("DWEC")) {
      respuesta = "A esas preguntas no respondo. Adios";
      salir = true;
    } else {
      respuesta = rand > 0.49 ? "Si" : "No";
    }

    /*
     * Una vez procesada la pregunta, se muestra la pregunta y la respuesta.
     */

    document.write('<p><span style="font-weight: bold;">Pregunta:</span> ¿' + pregunta + "?</p>");
    document.write('<p><span style="font-weight: bold;">BrujaIA:</span> ' + respuesta + "</p>");
  } while (!salir);
}
