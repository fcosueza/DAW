<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
          Schema::create('talleres', function (Blueprint $table) {
              $table->id();
              $table->unsignedBigInteger('ubicacion_id');
              $table->foreign('ubicacion_id')->references('id')->on('ubicaciones');
              $table->timestamps();
              $table->string('nombre', 50);
              $table->text('descripcion');
              $table->set('dia_semana', ['L', 'M', 'X', 'J', 'V', 'S', 'D']);
              $table->time('hora_inicio');
              $table->time('hora_fin');
              $table->unsignedInteger('cupo_maximo');
          });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
          Schema::dropIfExists('talleres');
      }
  };
