<?php

  /*
   * Datos de conexión con la base de datos.
   */
  define('DB_DSN', 'mysql:host=localhost;dbname=respira');
  define('DB_USER', 'dwes');
  define('DB_PASSWD', '%DWES4dwes%');

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
