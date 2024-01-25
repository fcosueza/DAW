/**
 * Función buscaTopo
 *
 * Esta función recibe 2 agencias y un nombre y determina si el agente
 * con el nombre proporcionado es un topo o no.
 */

function buscaTopo(agencia1, agencia2, nombre) {
  let agentesAgencia1 = agencia1.listadoOrdenado("nombre");
  let agentesAgencia2 = agencia2.listadoOrdenado("nombre");

  if (agentesAgencia1.includes(nombre) && agentesAgencia2.includes(nombre)) return true;

  return false;
}
