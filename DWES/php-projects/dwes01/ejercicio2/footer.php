<?php

  /*
   * Función que genera el pie de página mostrando la última fecha en la que se
   * ha modificado el archivo index.php.
   */

  function generarPie() {
      print '<footer class="footer bold">';
      print 'Ultima Modificación: ' . date("F d Y H:i:s.", filemtime("index.php"));
      print '</footer>';
  }
