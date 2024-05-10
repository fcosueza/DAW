/**
 * Función sectionShow
 *
 * Esta función muestra u oculta las secciones de imágenes y texto cuando se
 * selecciona algunos de los campos checkbox del área de navegación.
 *
 * Para conseguir los efectos se han usado las funciones slideToggle y fadeToggle, que
 * alternan los estados entre visible y no visible de los elementos según su estado
 * actual.
 *
 * Teniendo en cuenta que las secciones se mostrarán por defecto, los checkbox
 * estarán marcados por defecto, por lo que no es necesario aplicar
 * mas comprobaciones ya que cada vez que se haga click en el checkbox se marcará o
 * desmarcará obligatoriamente, alternando correctamente entre un estado y otro.
 *
 * @param {*} e Objeto de tipo Event con información sobre el evento disparado
 */
function sectionShow(e) {
  let value = "#" + $(e.currentTarget).val();

  // Según el valor del objeto, aplicamos slideToggle o fadeToggle
  if (value == "#img") {
    $(value).slideToggle(1000);
  } else {
    $(value).fadeToggle(1000);
  }
}

export default sectionShow;
