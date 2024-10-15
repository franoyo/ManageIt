<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoja extends Model
{
    use HasFactory;
    
    protected $fillable = [
     'titulo_hoja',
        'fecha_hoja',
        'sede',
        'ubicacion',
        'marca',
        'referencia',
        'notas',
        'preventivo_fecha1',
        'preventivo1',
         'preventivo_fecha2',
        'preventivo2',
         'preventivo_fecha3',
        'preventivo3',
         'preventivo_fecha4',
        'preventivo4',
         'preventivo_fecha5',
        'preventivo5',
         'preventivo_fecha6',
        'preventivo6',
        'preventivo_fecha7',
        'preventivo7',
        'preventivo_fecha8',
        'preventivo8',
        'correctivo_fecha1',
        'correctivo1',
        'correctivo_fecha2',
        'correctivo2',
        'correctivo_fecha3',
        'correctivo3',
        'correctivo_fecha4',
        'correctivo4',
        'correctivo_fecha5',
        'correctivo5',
        'correctivo_fecha6',
        'correctivo6',
        'correctivo_fecha7',
        'correctivo7',
        'correctivo_fecha8',
        'correctivo8',
        'estado',
        'id_user',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
