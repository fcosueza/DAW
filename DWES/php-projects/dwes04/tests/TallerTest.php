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
      public function testSetNombreCorrect(): void {
          $name = "Taller de Prueba";
          $taller = new Taller;

          $this->assertTrue($taller->setNombre($name));
      }

      // Test para establecer el nombre incorrectamente
      public function testSetNombreIncorrect(): void {
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
      public function testSetDescriptCorrect(): void {
          $descript = "Taller para la realización de pruebas";
          $taller = new Taller;

          $this->assertTrue($taller->setNombre($descript));
      }

      // Test para establecer la descripción incorrectamente
      public function testSetDescriptIncorrect(): void {
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
  }
