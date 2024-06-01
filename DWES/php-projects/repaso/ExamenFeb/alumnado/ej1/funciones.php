<?php

  /*
    DNI: 75131618W
    NOMBRE y APELLIDOS: Francisco Sueza Rodríguez
   */

  /**
   *
   * @return bool
   */
  function getEmotions() {
      $emociones = array();

      if (($fichero = fopen("datos.csv", "r")) != FALSE) {
          fgetcsv($fichero);

          while ($linea = fgetcsv($fichero, 0, ",")) {
              if (!in_array($linea[1], $emociones)) {
                  $emociones[] = $linea[1];
              }
          }

          return $emociones;
      } else {
          return false;
      }
  }

  /**
   *
   * @param type $emotion
   * @return bool
   */
  function getSentence($emotion) {
      $frases = array();

      if (($fichero = fopen("datos.csv", "r")) != FALSE) {
          fgetcsv($fichero);

          while ($linea = fgetcsv($fichero, 0, ",")) {
              if (($emotion == $linea[1])) {
                  $frases[] = $linea[2];
              }
          }
          fclose($fichero);
      }


      if (count($frases) == 0) {
          return false;
      } else {
          return $frases[array_rand($frases, 1)];
      }
  }
