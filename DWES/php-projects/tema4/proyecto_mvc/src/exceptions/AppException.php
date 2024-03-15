<?php

  namespace DWES04\exceptions;

  class AppException extends \Exception {

      public const DB_UNABLE_TO_CONNECT = 100;
      public const DB_NOT_CONNECTED = 101;
      public const DB_QUERY_EXECUTION_FAILURE = 102;
      public const DB_CONSTRAINT_VIOLATION_IN_QUERY = 103;
      public const DB_ERROR_IN_QUERY = 104;
      public const RESTRICTED_AREA = 101;

      public static function restrictedArea() {
          return new self("Está intentando acceder a un área restringida. Login necesario.", self::RESTRICTED_AREA);
      }
  }
