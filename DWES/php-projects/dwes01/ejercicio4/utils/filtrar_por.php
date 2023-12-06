<?php

  /**
   * Filtra los registros de un array bidimensional
   *
   * Esta función filtra los registros de un array bidimensional generado por
   * la funcón cargar_archivo(), en concreto filtra por curso.
   *
   * @param $termino Termino por el que se quieren filtrar los registros
   * @param array[] $registros Array bidimensinal con los registros
   *
   * @return array[] Array bidimensional con el conjunto de registros filtrado.
   */
  function filtrar_por_curso($termino, $registros) {
      $resultado = [];

      foreach ($registros as $registro) {
          if ($registro['curso'] == $termino) {
              $resultado[] = $registro;
          }
      }

      return $resultado;
  }
