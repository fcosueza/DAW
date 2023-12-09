/*
 * Función loadFrame()
 *
 * Esta función crea un iFrame en la página desde donde se llama en un elemento especificado por elementID.
 *
 * NOTA: Se van a usar las funciones getElementId, createElement, setAttribute y appendChild, que vienen en
 * la documentación extendida para el elemento document en el apartado "Debes Conocer" del punto 1.4 de la
 * teoría del Tema 2.
 *
 * @param htmlFile Nombre del fichero html que hará de fuente para el iFrame.
 * @param elementID Elemento dentro de que se va a crear el iFrame.
 */

function loadFrame(htmlFile, elementID) {
  let element = document.getElementById(elementID);

  /* Creamos el elemento iFrame y sus atributos */

  let frame = document.createElement("iframe");

  frame.setAttribute("class", "frame");
  frame.setAttribute("id", "frame");
  frame.setAttribute("src", htmlFile);

  /* Comprobamos si hay un frame ya cargado en el elemento, en cuyo caso lo eliminamos */

  if (element.childElementCount > 0) {
    element.removeChild(document.getElementById("frame"));
  }

  /* Añadimos el frame creado  al elemento */

  element.appendChild(frame);
}
