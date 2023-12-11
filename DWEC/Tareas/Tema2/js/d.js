/*
 * Ejercicio 4
 */

function calcularFecha() {
  let fechaActual = new Date();
  let fechaNueva;
  let diferencia;

  let dias, semanas, años;

  /* Pedimos la fecha por teclado */

  fechaNueva = Date.parse(window.prompt('Introduzca la fecha (formato: "AAAA-MM-DD")'));

  /* Calculamos en primer lugar la diferencia en segundos */

  diferencia = (fechaNueva - fechaActual) / 1000;

  /* Calculamos la diferencia en días, semanas y años */

  dias = diferencia / (60 * 60 * 24);
  semanas = dias / 7;
  años = dias / 365;

  /* Escribimos el resultado */

  document.write("<h2>La diferencia entre las fechas es: </h2>");
  document.write("<p>La diferencia en días es: " + dias.toFixed(0) + " dia/s.</p>");
  document.write("<p>La diferencia en semanas es: " + semanas.toFixed(0) + " semana/s.</p>");
  document.write("<p>La diferencia en años es: " + años.toFixed(0) + " año/s.</p>");
}
