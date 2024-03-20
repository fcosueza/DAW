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
   * por lo quedebe haber una errata en el enunciado.
   *
   * Se han especificado como se almacenan en la base de datos.
   */

  define("DIAS_SEMANA", array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes"));
