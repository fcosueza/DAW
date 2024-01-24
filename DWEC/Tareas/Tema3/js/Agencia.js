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

  toString() {}

  /**
   * Método privado #_formateaInfo que crea una tabla HTML y añade la información
   * de todos los agentes que tiene la agencia.
   */

  #_formateaInfo() {
    let tabla = document.createElement("table");
    let cabecera = document.createElement("thead");
    let cuerpo = document.createElement("tbody");
    let fila = document.createElement("tr");
  }
}

export default Agencia;
