<?php

/**
 * Transforma una cadena con un formato de fecha dd/mm/aaaa al formato aaaa-mm-dd 
 * verificando que la fecha dada es correcta temporalmente (checkdate). La fecha proporcionada
 * debe seguir el formato indicado, sino la función dará error.
 * 
 * @param $fechaSpanish cadena de texto con la fecha en formato dd/mm/aaaa (si no sigue ese formato generará error)
 * 
 * @return false si la fecha no es válida según checkdate o la fecha en formato aaaa-mm-dd si todo ha ido bien
 */
function convertirFechaAMySQL($fechaSpanish)
{
    list($dia,$mes,$anyo)=preg_split('/[-\/\.]/',$fechaSpanish);
    if (checkdate($mes,$dia,$anyo))    
        return implode('-',[$anyo,$mes,$dia]);
    else return false;
}
