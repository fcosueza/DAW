<?php

  namespace Database\Seeders;

  use Illuminate\Database\Seeder;
  use App\Models\Taller;

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

          if (Taller::where('nombre', 'La Entrevista Laboral')->count() == 0) {
              $t = new Taller;
              $t->ubicacion_id = 3;
              $t->nombre = 'La Entrevista Laboral';
              $t->descripcion = 'Taller para preparanos al afrontar una entrevista laboral';
              $t->dia_semana = 'J';
              $t->hora_inicio = '11:00';
              $t->hora_fin = '12:00';
              $t->cupo_maximo = '20';
              $t->save();
          }
      }
  }
