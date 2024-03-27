<?php

  /*
   * Archivo donde se definen todas la variables globales de la aplicación,
   * como los datos de la base de datos o los directorios de Smarty,
   *
   */


  // Constantes de la base de datos

  define("DB_DSN", "mysql:host=localhost;dbname=respira");
  define("DB_USER", "root");
  define("DB_PASS", "H0l0caust0");

  // Constantes para Smarty

  define("TEMPLATE_DIR", "/templates");
  define("TEMPLATE_COMPILE_DIR", "/templates_build");
  define("CACHE_DIR", "/cache");

  /*
   * Constante con los días de la semana.
   *
   * En el enunciado se nos dice que los días tienen que ser en minúsculas,
   * pero en la base de datos están almacenados con el primer carácter en mayusculas,
   * por lo quedebe haber una errata en el enunciado. Se ha includio un array
   * asociativo porque así podemos usarlo también para las plantillas con smarty,
   * y que genere automáticamente las opciones de los select.
   *
   * Se han especificado como se almacenan en la base de datos.
   */

  define("DIAS_SEMANA", array(
      "Lunes" => "Lunes",
      "Martes" => "Martes",
      "Miércoles" => "Miércoles",
      "Jueves" => "Jueves",
      "Viernes" => "Viernes"));
