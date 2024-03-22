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

      // Test para obtener un lista de talleres
      public function testListar(): void {
          $pdo = DB::connect();
          $result = Talleres::listar($pdo);

          $this->assertEquals(count($result), 10);
      }

      // Test para obtener una lista de talleres en un día concreto
      public function testListarPorDia(): void {
          $pdo = DB::connect();
          $day = "Lunes";
          $success = true;
          $result = Talleres::listarPorDia($pdo, $day);

          foreach ($result as $taller) {
              if (!strcmp($taller->getDia(), $day)) {
                  $success = false;
              }
          }

          $this->assertNotFalse($result);
      }

      // Test para comprobar que se devuelve -1 con un dia no valido
      public function testListarPorDiaInvalid(): void {
          $pdo = DB::connect();
          $day = "Miernes";

          $this->assertEquals(Talleres::listarPorDia($pdo, $day), -1);
      }
  }
