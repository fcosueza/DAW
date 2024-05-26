<?php

  namespace Database\Seeders;

  use App\Models\Ubicacion;
  use Illuminate\Database\Seeder;

  class UbicacionSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
          if (Ubicacion::where('nombre', 'Biblioteca Municipal Distrito 4')->count() == 0) {
              $u = new Ubicacion;
              $u->nombre = 'Biblioteca Municipal Distrito 4';
              $u->descripcion = 'Biblioteca Municipal Distrito 4, 6ª Avenida';
              $u->dias = 'L,M,X';
              $u->save();
          }

          if (Ubicacion::where('nombre', 'Aula Magna')->count() == 0) {
              $u = new Ubicacion;
              $u->nombre = 'Aula Magna';
              $u->descripcion = 'Aula Magna de la Asociación Respira';
              $u->dias = 'J,V';
              $u->save();
          }

          if (Ubicacion::where('nombre', 'Aula de Tecnología 1')->count() == 0) {
              $u = new Ubicacion;
              $u->nombre = 'Aula de Tecnología 1';
              $u->descripcion = 'Aula de Tecnología 1 en el Centro Cívico';
              $u->dias = 'M,V';
              $u->save();
          }
      }
  }
