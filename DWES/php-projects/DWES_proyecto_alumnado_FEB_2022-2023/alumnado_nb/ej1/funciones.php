<?php

  // Vamos a crear una variable global con los candidatos elegidos

  /**
   * Función que, a partir de la lista de participantes, ubicada en la variable de ámbito global
   * $participantes, genera un array de $n candidatos finalistas de manera aleatoria
   *
   * @param $num Número de candidatos que serán seleccionados
   *
   * @return: Array con los $n candidatos seleccionados
   */
  function getCandidatos($num) {
      global $participantes;

      $indexes = array_rand($participantes, $num);

      foreach ($indexes as $index) {
          $candidatos[] = $participantes[$index];
      }

      return $candidatos;
  }

  /**
   * Función que, a partir de la lista de candidatos seleccionados, ubicada en la variable pasada como parámetro $candidatos,
   * genera una cadena HTML con el formulario para poder elegir el ganador final
   *
   * @param $candidatos Un array con los seleccionados a ganador.
   *
   * @return: Cadena con el formulario que se imprimirá en el html con los candidatos seleccionados.
   */
  function getFormularioCandidatosMarkup($candidatos) {
      //Debes modificar esta función para que el formulario se construya dinámicament con los datos de $candidatos
      $output = '<form action="ganador.php" method="post">
    <div class="candidatoContainer">
      <h2>' . $candidatos[0]["nombre"] . '</h2>
      <img src="' . $candidatos[0]["imagen_url"] . '"><br><input type="submit" value="Seleccionar" name="seleccionar[ ' . $candidatos[0]["nombre"] . ']">
    </div>
    <div class="candidatoContainer">
      <h2>' . $candidatos[1]["nombre"] . '</h2>
      <img src="' . $candidatos[1]["imagen_url"] . '"><br><input type="submit" value="Seleccionar" name="seleccionar[' . $candidatos[1]["nombre"] . ']">
    </div>
    <div class="candidatoContainer">
      <h2>' . $candidatos[2]["nombre"] . '</h2>
      <img src="' . $candidatos[2]["imagen_url"] . '"><br><input type="submit" value="Seleccionar" name="seleccionar[' . $candidatos[2]["nombre"] . ']">
    </div>
    <div class="candidatoContainer">
      <h2>' . $candidatos[3]["nombre"] . '</h2>
      <img src="' . $candidatos[3]["imagen_url"] . '"><br><input type="submit" value="Seleccionar" name="seleccionar[' . $candidatos[3]["nombre"] . ']">
    </div>
  </form>';

      return $output;
  }
