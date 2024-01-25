const PAIS_AGENCIA = ["USA", "URSS", "Reino Unido"];

class Agencia {
  constructor(nombreAgencia, pais) {
    if (!PAIS_AGENCIA.includes(pais))
      throw new Error("Los paises permitidos para las agencias son: " + PAIS_AGENCIA.toString());

    this._agentes = new Array();
    this._nombreAgencia = nombreAgencia;
    this._pais = pais;
  }

  // Get y Set de la propiedad nombreAgencia
  get nombreAgencia() {
    return this._nombreAgencia;
  }

  set nombreAgencia(nombreAgencia) {
    this._nombreAgencia = nombreAgencia;
  }

  // Get y Set de la propiedad pais
  get pais() {
    return this._pais;
  }

  set pais(pais) {
    if (!PAIS_AGENCIA.includes(pais))
      throw new Error("Los paises permitidos para las agencias son: " + PAIS_AGENCIA.toString());

    this._pais = pais;
  }

  /**
   * Método reclutarAgente
   *
   * Es método añade un agente a la lista de agentes si no esta ya incluido. Si la operación
   * ha tenido éxito, devuelve true, en caso contrario devuelve false.
   */

  reclutarAgente(agente) {
    // El método includes va a realizar la comprobación obj1 === obj2
    if (this._agentes.includes(agente)) return false;

    this._agentes.push(agente);
    return true;
  }

  /**
   * Método cesarAgente
   *
   * Este método se encarga de buscar un agente con el nombre dado y eliminarlo del array
   * de agentes. Si se ha encontrado el agente y se ha eliminado devolverá true, sino devolverá
   * false.
   */

  cesarAgente(nombreAgente) {
    // Vamos a usar la función findIndex que viene en la página de w3school que enlazan los apuntes.
    let indice = this._agentes.findIndex(agente => agente.nombre == nombreAgente);

    if (indice == -1) return false;

    this._agentes.splice(indice, 1);
    return true;
  }
  /**
   * Método listadoAgentes
   *
   * Método que busca los agentes con un tipo concreto en los agentes de la agencia y devuelve un string
   * con todos los agentes encontrados.
   */
  listadoAgentes(tipoAgente) {
    let listaAgentes = "";

    this._agentes.forEach(agente => {
      if (tipoAgente == agente.tipoAgente) {
        listaAgentes += agente.toString() + "\n";
      }
    });

    return listaAgentes;
  }

  /**
   * Método listadoOrdenado
   *
   * Método que que ordenará los agentes por nombre o edad según se especifique y devolverá un string con
   * la lista ordenada.
   */
  listadoOrdenado(criterio) {
    let arrayValores = [];
    let listaOrdenada = "";

    // Vamos a pasar los valores del criterio a un array, y vamos a ordenar ese array.

    this._agentes.forEach(agente => {
      if (criterio == "nombre") {
        arrayValores.push(agente.nombre);
      } else {
        arrayValores.push(agente.edad);
      }
    });

    // Ordenamos el array

    arrayValores.sort();

    // Recorremos arrayValores y _agentes y vamos añadiéndolos en orden

    arrayValores.forEach(valorOrden => {
      this._agentes.forEach(agente => {
        if (agente.nombre == valorOrden) listaOrdenada += agente.toString() + "\n";
      });
    });

    return listaOrdenada;
  }

  /**
   * Método toString
   *
   * Este método devuelve una tabla con la información sobre la agencia. Para ello, crea 2 elementos
   * para mostrar el nombre y pais de la agencia a continuación llama al método #_formateaInfo, que generará
   * una tabla con todos los agentes que tenemos en la agencia.
   *
   * Es decir, este método no devuelve una cadena, sino un nodo HTML.
   */

  toString() {
    // Vamos a crear un par de elementos HTMl para mostrar el nombre y pais de la agencia antes de la tabla.

    let nombreAgencia = document.createElement("h3");
    let paisAgencia = document.createElement("h3");

    nombreAgencia.classList.add("subtitle");
    paisAgencia.classList.add("subtitle");

    nombreAgencia.innerHTML = "Nombre: " + this._nombreAgencia;
    paisAgencia.innerHTML = "Pais: " + this._pais;

    document.body.appendChild(nombreAgencia);
    document.body.appendChild(paisAgencia);

    // Llamamos a #_formateaInfo para que nos genere la tabla

    return this.#_formateaInfo();
  }

  /**
   * Método privado #_formateaInfo que crea una tabla HTML y añade la información
   * de todos los agentes que tiene la agencia para que se muestre de forma ordenada.
   *
   * NOTA: No se si es exactamente esto lo que pedía el ejercicio, pero no se me ocurre otra forma
   *       de que se muestre la información en una tabla.
   */

  #_formateaInfo() {
    // Creamos los diferentes nodos que va a tener la tabla

    let nodoTabla = document.createElement("table");
    let nodoCabecera = document.createElement("thead");
    let nodoCuerpo = document.createElement("tbody");
    let nodoFila = document.createElement("tr");

    let nodoPais = document.createElement("th");
    let nodoNombre = document.createElement("th");
    let nodoEdad = document.createElement("th");
    let nodoTipo = document.createElement("th");

    // Introducimos el nombre de cada elementos de la cabecera

    nodoPais.innerHTML = "País";
    nodoNombre.innerHTML = "Nombre";
    nodoEdad.innerHTML = "Edad";
    nodoTipo.innerHTML = "Tipo";

    // Añadimos los nodos a la tabla

    nodoFila.appendChild(nodoPais);
    nodoFila.appendChild(nodoNombre);
    nodoFila.appendChild(nodoEdad);
    nodoFila.appendChild(nodoTipo);

    nodoCabecera.appendChild(nodoFila);
    nodoTabla.appendChild(nodoCabecera);

    // Vamos a recorrer todos los agentes y a ir añadiendo los datos.

    this._agentes.forEach(agente => {
      nodoFila = document.createElement("tr");

      // Creamos nuevos elementos para cada dato

      nodoNombre = document.createElement("td");
      nodoPais = document.createElement("td");
      nodoNombre = document.createElement("td");
      nodoEdad = document.createElement("td");
      nodoTipo = document.createElement("td");

      // Añadimos los datos del agente

      nodoPais.innerHTML = agente.pais;
      nodoNombre.innerHTML = agente.nombre;
      nodoEdad.innerHTML = agente.edad;
      nodoTipo.innerHTML = agente.tipo;

      // Añadimos los nodos a la fila y esta al cuerpo de la tabla

      nodoFila.appendChild(nodoPais);
      nodoFila.appendChild(nodoNombre);
      nodoFila.appendChild(nodoEdad);
      nodoFila.appendChild(nodoTipo);

      nodoCuerpo.appendChild(nodoFila);
    });

    // Añadimos el cuerpo de la tabla a la tabla

    nodoTabla.appendChild(nodoCuerpo);

    // Por  ultimo, devolvemos la tabla completa

    return nodoTabla;
  }
}

export default Agencia;
