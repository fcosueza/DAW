<?php

  /**
   * Función que muestra la cantidad de asignaturas de cada tipo que hay en todos los registros
   *
   * La función devuelve el número de elementos de cada asignatura que podemos encontrar
   * en todos los registros que hay almacenados.
   *
   * @param array[] $registros Array bidimensional con el conjunto de registos.
   *
   * @return array[] Devuelve un array con todas las asignaturas como claves y la cantidad como valor.
   *
   */
  function resumen($registros) {

      // Creamos un array con todas las asignaturas posibles

      $asignaturas = ["LCL", "M", "BG", "GH", "FQ", "I"];

      // Creamos el array resultado y lo rellenamos usando array_fill_keys()

      $resumen = array_fill_keys($asignaturas, 0);

      // Iteramos por la asignaturas y registros, comprobando cuales coinciden e incrementado el resultado.

      foreach ($asignaturas as $asignatura) {
          foreach ($registros as $registro) {
              if (in_array($asignatura, $registro['asgs']))
                  $resumen[$asignatura]++;
          }
      }

      return $resumen;
  }
