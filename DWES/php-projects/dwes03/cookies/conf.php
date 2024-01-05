<?php

  define('SECCION_DEFECTO', 'Principal');

  $secciones = [];
  $secciones[] = ['nombre' => 'Contacto', 'link' => 'ver contactos', 'contenido' => 'aquí se mostrará una lista de contactos'];
  $secciones[] = ['nombre' => 'Desarrollador', 'link' => 'ver desarrollador', 'archivo' => 'fragmentos/desarrollador.html'];
  $secciones[] = ['nombre' => 'Principal', 'link' => 'ver contenido principal', 'archivo' => 'fragmentos/principal.html'];
  $secciones[] = ['nombre' => 'Visita Ex1', 'link' => 'ver visitaEx1', 'contenido' => 'sección adicional 1'];
  $secciones[] = ['nombre' => 'Visita Ex2', 'link' => 'ver visitaEx2', 'contenido' => 'sección adicional 2'];
  $secciones[] = ['nombre' => 'Visita Ex3', 'link' => 'ver visitaEx3', 'contenido' => 'sección adicional 3'];
