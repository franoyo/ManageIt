<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'id_tarea',
        'ruta',
    ];


    public function tarea()
    {
        return $this->belongsTo(tarea::class, 'id_tarea');
    }
    
}
