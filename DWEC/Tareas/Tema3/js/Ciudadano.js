const PAIS = ["USA", "URSS", "Reino Unido", "RDA", "RFA", "Francia", "Suiza"];

/**
 * Clase Ciudadano
 *
 * Clase que representan un Ciudadano con los atributos nombre, país y edad.
 */

class Ciudadano {
  constructor(nombre, pais, edad) {
    /*
     * Incluimos 3 guard clauses que lanzarán una excepción si los parámetros
     * del constructor no cumplen con los requisitos.
     */

    if (nombre.length < 5) throw new Error("El nombre tiene que tener al menos 5 caracteres.");

    if (!PAIS.includes(pais)) throw new Error("Los países permitidos son:" + PAIS.toString());

    if (edad < 1 || edad > 125) throw new Error("La edad tiene que estar comprendida entre 1 y 125");

    // Si los parámetros son correctos, asignamos los valores.

    this._nombre = nombre;
    this._pais = pais;
    this._edad = edad;
  }

  // Get y Set del atributo nombre.

  get nombre() {
    return this._nombre;
  }

  set nombre(nombre) {
    if (nombre.length < 5) throw new Error("El nombre tiene que tener al menos 5 caracteres.");

    this._nombre = nombre;
  }

  // Get y Set del atributo pais.

  get pais() {
    return this._pais;
  }

  set pais(pais) {
    if (!PAIS.includes(pais)) throw new Error("Los países permitidos son:" + PAIS.toString());

    this._pais = pais;
  }

  // Get y Set del atributo edad.

  get edad() {
    return this._edad;
  }

  set edad(edad) {
    if (edad < 1 || edad > 125) throw new Error("La edad tiene que estar comprendida entre 1 y 125");

    this._edad = edad;
  }

  // Método que devuelve una cadena con la información del ciudadano

  toString() {
    return this._nombre + " es un ciudadano de " + this._pais + " y tiene " + this._edad + " años.";
  }
}

export default Ciudadano;
