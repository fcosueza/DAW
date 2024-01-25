import Ciudadano from "./Ciudadano.js";

const TIPO_ESPIA = ["desestabilizador", "diplomático", "infiltrado", "ilegal", "operativo", "provocador", "durmiente"];

/**
 * Clase Espia
 *
 * Clase que hereda de ciudadano y añade el atributo tipo, que define el
 * tipo de espía que es.
 */
class Espia extends Ciudadano {
  constructor(nombre, pais, edad, tipo) {
    super(nombre, pais, edad);

    // Comprobamos si el tipo de espía es correcto

    if (!TIPO_ESPIA.includes(tipo))
      throw new Error("El tipo de espía tiene que ser alguno de lo siguiente: " + TIPO_ESPIA.toString());

    if (edad < 16 || edad > 125) throw new Error("La edad tiene que estar comprendida entre 1 y 125");

    this._tipo = tipo;
    this._edad = edad;
  }

  // Get y Set del atributo tipo.

  get tipo() {
    return this._tipo;
  }

  set tipo(tipo) {
    if (!TIPO_ESPIA.includes(tipo))
      throw new Error("El tipo de espía tiene que ser alguno de lo siguiente: " + TIPO_ESPIA.toString());

    this._tipo = tipo;
  }

  // Método que devuelve una cadena con la información del ciudadano

  toString() {
    return this._nombre + " es un agente " + this._tipo + " de " + this._pais + " y tiene " + this._edad + " años.";
  }
}

export default Espia;
