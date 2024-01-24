import Ciudadano from "./Ciudadano.js";
import Espia from "./Espia.js";
import Agencia from "./Agencia.js";

let arrayCiudadanos = [];
let arrayEspias = [];
let arrayAgencias = [];

// Creamos los 4 ciudadanos
try {
  arrayCiudadanos.push(new Ciudadano("Stewart", "Reino Unido", 6));
  arrayCiudadanos.push(new Ciudadano("Bobby", "USA", 18));
  arrayCiudadanos.push(new Ciudadano("Hanks", "RFA", 50));
  arrayCiudadanos.push(new Ciudadano("Ivanov", "URSS", 80));
} catch (e) {
  console.error("Error: " + e);
}

// Mostramos la información, creando un elemento p y añadiendo el texto
arrayCiudadanos.forEach(ciudadano => {
  let parrafo = document.createElement("p");

  parrafo.classList.add("para");
  parrafo.innerHTML = ciudadano.toString();

  document.body.appendChild(parrafo);
});

// Probamos algunos de los métodos de la clase Ciudadanos

try {
  arrayCiudadanos[0].nombre = "Linda";
  arrayCiudadanos[1].edad = 99;
  arrayCiudadanos[2].pais = "RDA";
  arrayCiudadanos[3].nombre = "Tarjum";
  arrayCiudadanos[3].edad = 66;
} catch (e) {
  console.error("Error: " + e);
}

// Añadimos espacio y una línea horizontal para visualizar mejor cada apartado.
document.body.appendChild(document.createElement("br"));
document.body.appendChild(document.createElement("hr"));
document.body.appendChild(document.createElement("br"));

// Mostramos los cambios
arrayCiudadanos.forEach(ciudadano => {
  let parrafo = document.createElement("p");

  parrafo.classList.add("para");
  parrafo.innerHTML = ciudadano.toString();

  document.body.appendChild(parrafo);
});

// Creamos los 10 espías
try {
  arrayEspias.push(new Espia("Jhonny", "USA", 25, "diplomático"));
  arrayEspias.push(new Espia("Vladimir", "URSS", 60, "desestabilizador"));
  arrayEspias.push(new Espia("Schubert", "RDA", 16, "infiltrado"));
  arrayEspias.push(new Espia("Marie", "Francia", 51, "ilegal"));
  arrayEspias.push(new Espia("Linda", "Reino Unido", 20, "diplomático"));
  arrayEspias.push(new Espia("Michael", "USA", 89, "operativo"));
  arrayEspias.push(new Espia("Lapatique", "Francia", 45, "provocador"));
  arrayEspias.push(new Espia("Schools", "Suiza", 18, "infiltrado"));
  arrayEspias.push(new Espia("Marlene", "RFA", 23, "durmiente"));
  arrayEspias.push(new Espia("Tarkov", "URSS", 30, "ilegal"));
} catch (e) {
  console.error("Error: " + e);
}

document.body.appendChild(document.createElement("br"));
document.body.appendChild(document.createElement("hr"));
document.body.appendChild(document.createElement("br"));

// Mostramos los espías creados
arrayEspias.forEach(espia => {
  let parrafo = document.createElement("p");

  parrafo.classList.add("para");
  parrafo.innerHTML = espia.toString();

  document.body.appendChild(parrafo);
});

// Creamos las 2 agencias

try {
  arrayAgencias.push(new Agencia("CIA", "USA"));
  arrayAgencias.push(new Agencia("KGB", "URSS"));
} catch (e) {
  console.error("Error: " + e);
}

document.body.appendChild(document.createElement("br"));
document.body.appendChild(document.createElement("hr"));
document.body.appendChild(document.createElement("br"));

// Mostramos las agencias creadas.
arrayAgencias.forEach(agencia => {
  let parrafo = document.createElement("p");

  parrafo.classList.add("para");
  parrafo.innerHTML = agencia.nombreAgencia + " " + agencia.pais;

  document.body.appendChild(parrafo);
});

arrayAgencias[0].reclutarAgente(arrayEspias[0]);
arrayAgencias[0].reclutarAgente(arrayEspias[1]);
arrayAgencias[0].reclutarAgente(arrayEspias[5]);

console.log(arrayAgencias[0].listadoAgentes());
console.log(arrayAgencias[0].listadoOrdenado("nombre"));

arrayAgencias[0].cesarAgente("Michael");

console.log(arrayAgencias[0].listadoAgentes());
