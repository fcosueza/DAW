/*
 * Ejercicio 1
 */

function bruja() {
  let pregunta = "";
  let respuesta = "";

  let salir = false;
  let rand;

  /*
   * Realizamos la pregunta hasta que se introduzca la cadena DWEC.
   */

  do {
    /* Realizamos la pregunta y generamos el número aleatorio */

    pregunta = window.prompt("Introduzca una pregunta (incluya DWEC para acabar): ");
    rand = Math.random();

    /* Procesamos la pregunta. Si incluye DWEC, almacenamos la respuesta y salimos */

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
