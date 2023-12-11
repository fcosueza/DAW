/*
 * Ejercicio 5
 */

function calcularCasquete() {
  let radio, altura;
  let area, volumen;

  /* Pedimos los datos hasta que los dos sean positivos */

  do {
    radio = Number(window.prompt("Introduzca el radio en cm(tiene que ser positivo): "));
    altura = Number(window.prompt("Introduzca la altura en cm(debe ser positivo): "));
  } while (radio <= 0 || altura <= 0);

  /* Calculamos el area y el volumen usando las formulas apropiadas */

  area = 2 * Math.PI * radio * altura;
  volumen = (Math.PI * Math.pow(altura, 2) * (3 * radio - altura)) / 3;

  /* Mostramos los resultados */

  document.write("<h2>Los datos del casquete esférico son: </h2>");
  document.write("<p>El area es de: " + area.toPrecision(8) + " cm²");
  document.write("<p>El volumen es de: " + volumen.toPrecision(8) + " cm³</p>");
}
