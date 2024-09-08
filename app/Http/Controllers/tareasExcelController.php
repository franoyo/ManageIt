<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TareasExport;
use App\Models\tarea;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class tareasExcelController extends Controller
{
    public function exportExcelTareas() 
    {
    if (session()->has('resultados_busqueda')) {
        $tareas = collect(session('resultados_busqueda'))->map(function ($tarea) {
            // Excluye los campos 'id_user' y 'estado'
            return collect($tarea)->except(['id_user', 'estado']);
        });
    } else {
        // Si no hay resultados en la variable de sesión, obtener todos los usuarios
        $tareas = tarea::select('id', 'nombre_tarea', 'fecha_tarea','lugar','descripcion_tarea','notas','porcentaje','created_at','updated_at')
        ->where('estado', 1)
        ->where('id_user', Auth::id())
        ->get();
    }

    // Generar el reporte en Excel y pasar los resultados
    $timezone = 'America/Bogota';
    return Excel::download(new TareasExport($tareas), 'tareasReport_' . Carbon::now($timezone)->format('Y-m-d_H.i.s') . '.xlsx');
    
    }
}
