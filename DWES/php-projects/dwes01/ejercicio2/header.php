<?php

  /*
   * Función que genera la cabecera de la página. Tiene como parametro la sección
   * actual en la que nos encontramos.
   *
   * Como parametros recibe la sección actual y las secciones para generar los
   * enlaces.
   */

  function generarCabecera($seccionActual, $secciones) {


      print '<header class="header flex">';
      print '   <img class="header__logo" src="img/logo.png" alt="Logo" width="50" height="50" />';
      print '   <h3 class="header__title bold">Asociación Respira</h3>';
      print '   <nav class="menu">';
      print '       <ul class="flex menu__list">';

      /*
       * Generamos los enlaces. Si la sección actual coincide con un enlace,
       * se genera un parrafo en vez de un enlace.
       */

      foreach ($secciones as $seccion) {
          if ($seccion['link'] == $seccionActual) {
              print '<li><p class="paraLink bold">' . $seccion['nombre'] . '</p></li>';
          } else {
              print '<li><a class="menu__link" href="index.php?ver=' . urlencode($seccion['link']) . '">'
                      . $seccion['nombre']
                      . '</a></li>';
          }
      }

      print '       </ul>';
      print '   </nav>';
      print '</header>';
  }
