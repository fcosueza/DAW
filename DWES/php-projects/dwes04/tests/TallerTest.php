<?php

  namespace tests;

  use app\classes\model\Taller as Taller;
  use PHPUnit\Framework\TestCase;

  /**
   * Tests para la clase Taller
   */
  final class TallerTest extends TestCase {

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
      public function testSetHoraInicioWrongHour(): void {
          $hour = "24:00";
          $taller = new Taller;

          $this->assertFalse($taller->setHoraInicio($hour));
      }

      // Test para establecer la hora de inicio con los minutos fuera de rango
      public function testSetHoraInicioWrongMin(): void {
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
      public function testSetHoraFinalWrongHour(): void {
          $hour = "24:00";
          $taller = new Taller;

          $this->assertFalse($taller->setHoraFinal($hour));
      }

      // Test para establecer la hora de finacliación con los minutos fuera de rango
      public function testSetHoraFinalWrongMin(): void {
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
  }
