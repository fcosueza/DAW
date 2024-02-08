<?php

  require_once('./vars.php');

  /**
   * Función que, a partir de la lista de participantes, ubicada en la variable de ámbito global
   * $participantes, genera un array de $n candidatos finalistas de manera aleatoria
   *
   * @param $n: Número de candidatos que serán seleccionados
   *
   * @return: Array con los $n candidatos seleccionados
   */
  function getCandidatos($num) {
      $randomHistory = [];
      $heroes = [];

      for ($i = 0; $i < 4; $i++) {
          $random = rand(1, 8);

          if (!in_array($i, $randomHistory)) {
              $heroes[] = $participantes[$i];
          }
      }

      return $participantes;
  }

  /**
   * Función que, a partir de la lista de candidatos seleccionados, ubicada en la variable pasada como parámetro $candidatos, genera una cadena HTML con el formulario para poder elegir el ganador final
   *
   * @param $candidatos: Un array con los seleccionados a ganador.
   *
   * @return: Cadena con el formulario que se imprimirá en el html con los candidatos seleccionados.
   */
  function getFormularioCandidatosMarkup($candidatos) {
      //Debes modificar esta función para que el formulario se construya dinámicament con los datos de $candidatos
      $output = '';
      $output = '<form action="ganador.php" method="post">
    <div class="candidatoContainer">
      <h2>Clark Kent</h2>
      <img src="./img/Henry_Cavill_by_Gage_Skidmore_2.jpg"><br><input type="submit" value="Seleccionar" name="seleccionar[1]">
    </div>
    <div class="candidatoContainer">
      <h2>Bruce Wayne</h2>
      <img src="./img/Christianbale.jpg"><br><input type="submit" value="Seleccionar" name="seleccionar[2]">
    </div>
    <div class="candidatoContainer">
      <h2>Diana Prince</h2>
      <img src="./img/Diana_in_White.png"><br><input type="submit" value="Seleccionar" name="seleccionar[3]">
    </div>
    <div class="candidatoContainer">
      <h2>Barry Allen</h2>
      <img src="./img/Barry-Hallen.png"><br><input type="submit" value="Seleccionar" name="seleccionar[4]">
    </div>
  </form>';
      return $output;
  }
