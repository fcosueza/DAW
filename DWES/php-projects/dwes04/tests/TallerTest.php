<?php

  namespace tests;

  use app\classes\model\Taller as Taller;
  use app\classes\database\DB as DB;
  use PHPUnit\Framework\TestCase;

  /**
   * Tests para la clase Taller
   */
  final class TallerTest extends TestCase {

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

      // Test para obtener el id cuando no esta establecido
      public function testGetIdNull(): void {
          $taller = new Taller;

          $this->assertNull($taller->getId());
      }

      // Test para establecer el nombre correctamente
      public function testSetNombre(): void {
          $name = "Taller de Prueba";
          $taller = new Taller;

          $this->assertTrue($taller->setNombre($name));
      }

      // Test para establecer el nombre con una cadena vacía
      public function testSetNombreEmpty(): void {
          $name = "";
          $taller = new Taller;

          $this->assertFalse($taller->setNombre($name));
      }

      // Test para obtener el nombre una vez establecido
      public function testGetNombre(): void {
          $name = "Taller de Prueba";
          $taller = new Taller;
          $taller->setNombre($name);

          $this->assertEquals($taller->getNombre(), $name);
      }

      // Test para establecer la descripción correctamente
      public function testSetDescript(): void {
          $descript = "Taller para la realización de pruebas";
          $taller = new Taller;

          $this->assertTrue($taller->setNombre($descript));
      }

      // Test para establecer la descripción con una cadena vacía
      public function testSetDescriptEmpty(): void {
          $descript = "";
          $taller = new Taller;

          $this->assertFalse($taller->setNombre($descript));
      }

      // Test para obtener la descripción una vez establecida
      public function testGetDescript(): void {
          $descript = "Taller para la realización de pruebas";
          $taller = new Taller;
          $taller->setNombre($descript);

          $this->assertEquals($taller->setNombre($descript), $descript);
      }

      // Test para establecer una ubicación correctamente
      public function testSetUbi(): void {
          $ubi = "Sala Audiovisual N";
          $taller = new Taller;

          $this->assertTrue($taller->setUbicacion($ubi));
      }

      // Test para establecer una ubicación con una cadena vacía
      public function testSetUbiEmpty(): void {
          $ubi = "";
          $taller = new Taller;

          $this->assertFalse($taller->setUbicacion($ubi));
      }

      // Test para obtener la ubicación una vez establecida
      public function tesGettUbi(): void {
          $ubi = "Sala Comun A";
          $taller = new Taller;

          $taller->setUbicacion($ubi);
          $this->assertEquals($taller->getUbicacion(), $ubi);
      }

      // Test para establecer un día de forma correcta
      public function testSetDia(): void {
          $day = "Lunes";
          $taller = new Taller;

          $this->assertTrue($taller->setDia($day));
      }

      // Test para establecer un día con una cadena vacía
      public function testSetDiaEmpty(): void {
          $day = "";
          $taller = new Taller;

          $this->assertFalse($taller->setDia($day));
      }

      // Test para establecer un día con un día no váido
      public function testSetDiaInvalid(): void {
          $day = "Miernes";
          $taller = new Taller;

          $this->assertFalse($taller->setDia($day));
      }

      // Test para establecer la hora de inicio de forma correcta
      public function testSetHoraInicio(): void {
          $hour = "10:25";
          $taller = new Taller;

          $this->assertTrue($taller->setHoraInicio($hour));
      }

      // Test para establecer la hora de inicio con una cadena vacía
      public function testSetHoraInicioEmpty(): void {
          $hour = "";
          $taller = new Taller;

          $this->assertFalse($taller->setHoraInicio($hour));
      }

      // Test para establecer la hora de inicio con la hora fuera de rango
      public function testSetHoraInicioInvalidHour(): void {
          $hour = "24:00";
          $taller = new Taller;

          $this->assertFalse($taller->setHoraInicio($hour));
      }

      // Test para establecer la hora de inicio con los minutos fuera de rango
      public function testSetHoraInicioInvalidMin(): void {
          $hour = "20:60";
          $taller = new Taller;

          $this->assertFalse($taller->setHoraInicio($hour));
      }

      // Test para obtener la hora de inicio despues de establecerla
      public function testGetHoraInicio(): void {
          $hour = "10:25";
          $taller = new Taller;

          $taller->setHoraInicio($hour);
          $this->assertEquals($taller->getHoraInicio(), $hour);
      }

      // Test para establecer la hora de finalización de forma correcta
      public function testSetHoraFinal(): void {
          $hour = "11:05";
          $taller = new Taller;

          $this->assertTrue($taller->setHoraFinal($hour));
      }

      // Test para establecer la hora de finalización con una cadena vacía
      public function testSetHoraFinalEmpty(): void {
          $hour = "";
          $taller = new Taller;

          $this->assertFalse($taller->setHoraFinal($hour));
      }

      // Test para establecer la hora finalización con la hora fuera de rango
      public function testSetHoraFinalInvalidHour(): void {
          $hour = "24:00";
          $taller = new Taller;

          $this->assertFalse($taller->setHoraFinal($hour));
      }

      // Test para establecer la hora de finacliación con los minutos fuera de rango
      public function testSetHoraFinalInvalidMin(): void {
          $hour = "01:60";
          $taller = new Taller;

          $this->assertFalse($taller->setHoraFinal($hour));
      }

      // Test para obtener la hora de finalización despues de establecerla
      public function testGetHoraFinal(): void {
          $hour = "11:45";
          $taller = new Taller;

          $taller->setHoraFinal($hour);
          $this->assertEquals($taller->getHoraFinal(), $hour);
      }

      // Test para establecer el cupo de forma correcta
      public function testSetCupo(): void {
          $quota = 6;
          $taller = new Taller;

          $this->assertTrue($taller->setCupo($quota));
      }

      // Test para establecer el cupo con un valor fuera de rango
      public function testSetCupoInvalidRange(): void {
          $quota = 1;
          $taller = new Taller;

          $this->assertFalse($taller->setCupo($quota));
      }

      // Test para guardar un taller que no existe y comprobar que se crea el Id
      public function testGuardarInsert(): void {
          $taller = new Taller;
          $pdo = DB::connect();

          $name = "Creación de Curriculums";
          $descript = "Taller para la creación de currciulums laborales";
          $place = "Sala Comun 5";
          $day = "Lunes";
          $hourIni = "10:50";
          $hourEnd = "12:50";
          $quota = 15;

          $taller->setNombre($name);
          $taller->setDescription($descript);
          $taller->setUbicacion($place);
          $taller->setDia($day);
          $taller->setHoraInicio($hourIni);
          $taller->setHoraFinal($hourEnd);
          $taller->setCupo($quota);

          $this->assertEquals($taller->guardar($pdo), 1);
          $this->assertNotNull($taller->getId());
      }

      // Test para actualizar la información de un objeto despues de guardarlo  // Test para guardar un taller que no existe y comprobar que se crea el Id
      public function testGuardarUpdate(): void {
          $taller = new Taller;
          $pdo = DB::connect();

          $name = "La entrevista de trabajo";
          $descript = "Taller con pautas para afrontar una entrevista de trabajo";
          $place = "Auditorio 1";
          $day = "Martes";
          $hourIni = "12:00";
          $hourEnd = "14:00";
          $quota = 30;

          $taller->setNombre($name);
          $taller->setDescription($descript);
          $taller->setUbicacion($place);
          $taller->setDia($day);
          $taller->setHoraInicio($hourIni);
          $taller->setHoraFinal($hourEnd);
          $taller->setCupo($quota);

          $taller->guardar($pdo);
          $taller->setUbicacion("Sala Común 2");

          $this->assertEquals($taller->guardar($pdo), 1);
      }

      // Test para comprobar que se devuelve el código de error (-1)
      public function testGuardarError(): void {
          $taller = new Taller;
          $pdo = DB::connect();

          $name = "Creación de Curriculums";
          $descript = "Taller para la creación de curriculums laborales";
          $place = "Sala Comun 5";
          $hourIni = "10:50";
          $hourEnd = "12:50";
          $quota = 15;

          $taller->setNombre($name);
          $taller->setDescription($descript);
          $taller->setUbicacion($place);
          $taller->setHoraInicio($hourIni);
          $taller->setHoraFinal($hourEnd);
          $taller->setCupo($quota);

          $this->assertEquals($taller->guardar($pdo), -1);
      }

      // Test para comprobar que se devuelve uns instancia de Taller con rescatar
      public function testRescatar(): void {
          $pdo = DB::connect();
          $id = 1;
          $result = Taller::rescatar($pdo, $id);

          $this->assertInstanceOf(Taller::class, $result);
      }

      // Test para comprobar que se devuelve el código de error si no hay resultados
      public function testRescatarError(): void {
          $pdo = DB::connect();
          $id = 100;
          $result = Taller::rescatar($pdo, $id);

          $this->assertEquals($result, -1);
      }

      // Test para comprobar que se elimina un taller correctamente
      public function testBorrar(): void {
          $pdo = DB::connect();
          $id = 1;

          $this->assertEquals(Taller::borrar($pdo, $id), 1);
      }

      // Tes para comprobar que se devuelve 0 cuando no existe la fila a eliminar
      public function testBorrarError(): void {
          $pdo = DB::connect();
          $id = 30;

          $this->assertEquals(Taller::borrar($pdo, $id), 0);
      }
  }
