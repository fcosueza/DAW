/*
 * Ejercicio 3
 *
 * NOTA: Para que el ejercicio funcione correctamente deberá ejecutarse con live server,
 * como se indica en el mensaje referente a este ejercicio en el foro de la asignatura,
 * ya que en caso contrario nos aparecerá un error de cross-origin en Chrome o Firefox,
 * al intentar acceder a las propiedades del objeto window.parent desde el iFrame.
 */

function infoNavegador() {
  let pantallaCompleta = "No";
  let dispositivoMovil = "No";

  /* Comprobamos si el navegador esta en pantalla completa */

  if (screen.width == window.parent.outerWidth && screen.height == window.parent.outerHeight)
    pantallaCompleta = "Si";

  /* Comprobamos si el user agent contiene la palabra Mobile */

  if (navigator.userAgent.includes("Mobile")) dispositivoMovil = "Si";

  /* Mostramos los resultados */

  document.write("<h2>Información del Navegador:</h2>");
  document.write(
    "<p>Esta el navegador en Pantalla Completa: " +
      '<span style="font-weight: bold;">' +
      pantallaCompleta +
      "</p>"
  );
  document.write(
    "<p>Se esta ejecutando en un móvil: " +
      '<span style="font-weight: bold;">' +
      dispositivoMovil +
      "</p>"
  );
}
