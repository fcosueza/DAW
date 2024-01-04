<?php

  define('SECCION_DEFECTO', 'Principal');

  $secciones = [];
  $secciones[] = ['nombre' => 'Contacto', 'link' => 'ver contactos', 'contenido' => 'aquí se mostrará una lista de contactos'];
  $secciones[] = ['nombre' => 'Desarrollador', 'link' => 'ver desarrollador', 'archivo' => 'fragmentos/desarrollador.html'];
  $secciones[] = ['nombre' => 'Principal', 'link' => 'ver contenido principal', 'archivo' => 'fragmentos/principal.html'];
