<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Taller extends Model {

      use HasFactory;

      protected $table = 'talleres';
      protected $fillable = ['nombre', 'descripcion', 'dias'];

      /*
       * Méotodo para crear la relación uno a muchos inversa
       */

      public function ubicacion() {
          return $this->belongsTo(Ubicacion::class);
      }
  }
