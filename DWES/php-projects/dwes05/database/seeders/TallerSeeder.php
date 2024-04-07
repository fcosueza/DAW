<?php

  namespace Database\Seeders;

  use App\Models\Taller;
  use Illuminate\Database\Seeder;

  class TallerSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
          if (Taller::where('nombre', 'Taller de Manualidades')->count() == 0) {
              $t = new Taller;
              $t->ubicacion_id = 2;
              $t->nombre = 'Taller de Manualidades';
              $t->descripcion = 'Taller para la realización de manualidades';
              $t->dia_semana = 'L';
              $t->hora_inicio = '10:00';
              $t->hora_fin = '12:00';
              $t->cupo_maximo = '15';
              $t->save();
          }

          if (Taller::where('nombre', 'El Curriculum Vitae')->count() == 0) {
              $t = new Taller;
              $t->ubicacion_id = 3;
              $t->nombre = 'El Curriculum Vitae';
              $t->descripcion = 'Taller para la confección de curriculums';
              $t->dia_semana = 'V';
              $t->hora_inicio = '15:00';
              $t->hora_fin = '17:00';
              $t->cupo_maximo = '25';
              $t->save();
          }

          if (Taller::where('nombre', 'Uso Básico de Microsoft Office')->count() == 0) {
              $t = new Taller;
              $t->ubicacion_id = 4;
              $t->nombre = 'Uso Básico de Microsoft Office';
              $t->descripcion = 'Taller donde aprenderemos a usar la suite de Microsoft';
              $t->dia_semana = 'M';
              $t->hora_inicio = '9:00';
              $t->hora_fin = '12:00';
              $t->cupo_maximo = '17';
              $t->save();
          }
      }
  }
