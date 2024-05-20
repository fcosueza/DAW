<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Taller extends Model
{
    use HasFactory;
    protected $table = 'talleres';
    protected $fillable =['ubicacion_id','nombre','descripcion','dia_semana','hora_inicio','hora_fin','cupo_maximo'];
    public function ubicacion(): BelongsTo
    {
        return $this->belongsTo(Ubicacion::class);
    }
}
