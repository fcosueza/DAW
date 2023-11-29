<?php

  function generarPie() {
      print '<footer class="footer bold">';
      print 'Ultima Modificación: ' . date("F d Y H:i:s.", filemtime("index.php"));
      print '</footer>';
  }
