<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Ubicacion extends Model {

      use HasFactory;

      protected $table = 'ubicaciones';
      protected $fillable = [
          'ubicacion_id',
          'nombre',
          'descripcion',
          'dia_semana',
          'hora_inicio',
          'hora_fin',
          'cupo_maximo'];

      /**
       * Metodo para crear la relación 1 a muchos con taller
       */
      public function talleres() {
          return $this->hasMany(Taller::class);
      }
  }
