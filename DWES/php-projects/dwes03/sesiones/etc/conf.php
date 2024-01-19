<?php

  /*
   * Datos de conexión con la base de datos.
   */
  define('DB_DSN', 'mysql:host=localhost;dbname=respira');
  define('DB_USER', 'respira');
  define('DB_PASSWD', 'AbC1234.');

  /*
   * Definimos diferentes constantes con los roles permitidos para cada acción,
   * de esta forma será mucho más sencillo añadir o eliminar permisos.
   */

  define('ALLOW_SEE_DETAILS', ["admin", "coord", "trasoc"]);
  define('ALLOW_SEE_TRACKING', ["coord", "trasoc"]);
  define('ALLOW_REG_TRACKING', ["coord", "trasoc"]);
  define('ALLOW_FILL_REPORT', ["coord", "trasoc"]);
  define('ALLOW_STORE_REPORT', ["coord"]);

  /*
   * Otras constantes
   */
  define('MEDIOS_CONTACTO', ['TLF' => 'Teléfono', 'EMAIL' => 'Correo electrónico',
      'MAIL' => 'Correo ordinario', 'PRESENCIAL' => 'Reunión presencial',
      'VIDEOCONF' => 'Reunión por videoconfencia',
      'OTRO' => 'Otro medio (indicar)']);

  define('REGEX_VALIDATE_FECHA', ['options' => ['regexp' => '/^(0[1-9]|[12][0-9]|[3][01])([-\/\.])([0][1-9]|[1][012])\2([0-9]{4})$/']]);
  define('DATE_SPLIT', '[-\/\.]');
  define('REGEX_VALIDATE_HORA', ['options' => ['regexp' => '/^(?:[0-1][0-9]|2[0-3]):[0-5][0-9]$/']]);
  define('REGEX_VALIDATE_CONTACTO', ['options' => ['regexp' => '/^(' . implode('|', array_keys(MEDIOS_CONTACTO)) . ')$/']]);
