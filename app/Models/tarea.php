<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_tarea',
        'fecha_tarea',
        'lugar',
        'descripcion_tarea',
        'notas',
        'porcentaje',
        'estado',
        'id_user',
    ];
    public function user()
    {
        return $this->belongsTo(tarea::class, 'id_user');
    }
}
