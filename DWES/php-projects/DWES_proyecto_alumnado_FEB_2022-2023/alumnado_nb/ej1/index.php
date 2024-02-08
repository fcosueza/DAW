<?php
//Punto de entrada a la aplicación. Observa la estructura, pero no es necesario modificar nada.

require_once('./vars.php');
require_once('./funciones.php');

if (!function_exists("getCandidatos"))
{
    $mensaje="Tienes que crear la función getCandidatos en funciones.php";
    $candidatos=[];
}
else
{
    $candidatos = getCandidatos(4);
}
$formulario_candidatos_markup = getFormularioCandidatosMarkup($candidatos); 

include('./candidatos.tpl.php');

?>