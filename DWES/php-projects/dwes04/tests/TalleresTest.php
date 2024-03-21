<?php

  namespace tests;

  use app\classes\model\Taller as Taller;
  use app\classes\model\Talleres as Talleres;
  use app\classes\database\DB as DB;
  use PHPUnit\Framework\TestCase;

  final class TalleresTest extends TestCase {

      // Creamos una conexión e iniciamos una transacción antes de cada test
      public function setUp(): void {
          $pdo = DB::connect();
          $pdo->beginTransaction();
      }

      // Hacemos rollBack a la transacción para que la base de datos quede inalterada
      public function tearDown(): void {
          $pdo = DB::connect();
          $pdo->rollBack();
      }

      public function testListar(): void {
          $pdo = DB::connect();
          $result = Talleres::listar($pdo);

          $this->assertEquals(count($result), 10);
      }
  }
