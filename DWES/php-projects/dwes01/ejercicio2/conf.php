<?php

  /*
   * Definimos los datos de las diferentes secciones así como la sección por
   * defecto. Al final devolvemos la variable $secciones para que se pueda usar
   * desde otros archivos sin problema.
   */

  define("SECCION_DEFECTO", "portada");

  $secciones = [];

  $secciones[] = [
      "nombre" => "Portada",
      "link" => "portada",
      "archivo" => "secciones/portada.html"
  ];

  $secciones[] = [
      "nombre" => "Nosotros",
      "link" => "nosotros",
      "archivo" => "secciones/nosotros.html"
  ];

  $secciones[] = [
      "nombre" => "Servicios",
      "link" => "servicios",
      "archivo" => "secciones/servicios.html"
  ];

