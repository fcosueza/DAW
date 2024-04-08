<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Ubicacion extends Model {

      use HasFactory;

      protected $table = 'ubicaciones';
      protected $fillable = ['nombre', 'descripcion', 'dias'];

      /*
       * Metodo para crear la relación 1 a muchos con taller
       */

      public function talleres(): HasMany {
          return $this->hasMany(Taller::class);
      }
  }
  