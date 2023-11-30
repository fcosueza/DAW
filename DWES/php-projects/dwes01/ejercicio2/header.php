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


      print '<header class="header flex">';
      print '   <img class="header__logo" src="img/logo.png" alt="Logo" width="50" height="50" />';
      print '   <h3 class="header__title bold">Asociación Respira</h3>';
      print '   <nav class="menu">';
      print '       <ul class="flex menu__list">';
      print '           <li><a class="menu__link" href="index.php?ver=' . urlencode("Portada") . '">Portada</a></li>';
      print '           <li><a class="menu__link " href="index.php?ver=' . urlencode("Nosotros") . '">Nosotros</a></li>';
      print '           <li><a class="menu__link" href="index.php?ver=' . urlencode("Servicios") . '">Servicios</a></li>';
      print '       </ul>';
      print '   </nav>';
      print '</header>';
  }
