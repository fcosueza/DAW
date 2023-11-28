<?php

  /*
   * Función que genera la cabecera de la página. Tiene como parametro la sección
   * actual en la que nos encontramos.
   *
   * Emplea el archivo conf.php para generar los enlaces a las diferentes secciones
   * y añadir una clase al elemento html para poner el enlace en engrita, si coincide
   * con la sección actual.
   */

  function generarCabecera($seccionActual) {


      print '<header>';
      print '   <img src="img/placeholder.jpg" alt="Logo de la Asociación Respira" width="100" height="100"/>';
      print '   <nav>';
      print '       <ul>';
      print '           <li><a href="index.php?ver=' . urlencode("Portada") . '">Portada</a></li>';
      print '           <li><a href="index.php?ver=' . urlencode("Nosotros") . '">Nosotros</a></li>';
      print '           <li><a href="index.php?ver=' . urlencode("Servicios") . '">Servicios</a></li>';
      print '       </ul>';
      print '   </nav>';
      print '</header>';
  }
