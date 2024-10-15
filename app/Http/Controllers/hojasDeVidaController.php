<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hoja;
use Illuminate\Support\Facades\Auth;

class hojasDeVidaController extends Controller
{
public function dashboardHojas(){
    $hoja= hoja::where('estado', 1)
    ->where('id_user', Auth::id())
    ->get();
    return view('dashboardHojas',['hojas'=> $hoja]); 
}
public function storeHoja(Request $request){
    $request->validate([
        'tituloHoja' => 'required|string|max:250',
        'sede' => 'required|string|max:250',
        'ubicacion' => 'required|string|max:250',
        'fecha' => 'required|string|max:250',
        'notas' => 'nullable|string|max:700',
        'marca' => 'required|string|max:250',
        'referencia' => 'required|string|max:250',
        'fecha1' => 'nullable|string|max:150',
        'fecha2' => 'nullable|string|max:150',
        'fecha3' => 'nullable|string|max:150',
        'fecha4' => 'nullable|string|max:150',
        'fecha5' => 'nullable|string|max:150',
        'fecha6' => 'nullable|string|max:150',
        'fecha7' => 'nullable|string|max:150',
        'fecha8' => 'nullable|string|max:150',
        'fecha9' => 'nullable|string|max:150',
        'fecha10' => 'nullable|string|max:150',
        'fecha11' => 'nullable|string|max:150',
        'fecha12' => 'nullable|string|max:150',
        'fecha13' => 'nullable|string|max:150',
        'fecha14' => 'nullable|string|max:150',
        'fecha15' => 'nullable|string|max:150',
        'fecha16' => 'nullable|string|max:150',
        'info1' => 'nullable|string|max:150',
        'info2' => 'nullable|string|max:150',
        'info3' => 'nullable|string|max:150',
        'info4' => 'nullable|string|max:150',
        'info5' => 'nullable|string|max:150',
        'info6' => 'nullable|string|max:150',
        'info7' => 'nullable|string|max:150',
        'info8' => 'nullable|string|max:150',
        'info9' => 'nullable|string|max:150',
        'info10' => 'nullable|string|max:150',
        'info11' => 'nullable|string|max:150',
        'info12' => 'nullable|string|max:150',
        'info13' => 'nullable|string|max:150',
        'info14' => 'nullable|string|max:150',
        'info15' => 'nullable|string|max:150',
        'info16' => 'nullable|string|max:150',
    ]);
    $userId = Auth::id();

    $hoja = hoja::create([
        'titulo_hoja' => $request->tituloHoja,
        'fecha_hoja' => $request->fecha,
        'sede' => $request->sede,
        'ubicacion' => $request->ubicacion,
        'marca' => $request->marca,
        'referencia'=> $request->referencia,
        'notas'=> $request->notas,
        'preventivo_fecha1' => $request->fecha1,
        'preventivo_fecha2' => $request->fecha2,
        'preventivo_fecha3' => $request->fecha3,
        'preventivo_fecha4' => $request->fecha4,
        'preventivo_fecha5' => $request->fecha5,
        'preventivo_fecha6' => $request->fecha6,
        'preventivo_fecha7' => $request->fecha7,
        'preventivo_fecha8' => $request->fecha8,
        'correctivo_fecha1' => $request->fecha9,
        'correctivo_fecha2' => $request->fecha10,
        'correctivo_fecha3' => $request->fecha11,
        'correctivo_fecha4' => $request->fecha12,
        'correctivo_fecha5' => $request->fecha13,
        'correctivo_fecha6' => $request->fecha14,
        'correctivo_fecha7' => $request->fecha15,
        'correctivo_fecha8' => $request->fecha16,
        'preventivo1' => $request->info1,
        'preventivo2' => $request->info2,
        'preventivo3' => $request->info3,
        'preventivo4' => $request->info4,
        'preventivo5' => $request->info5,
        'preventivo6' => $request->info6,
        'preventivo7' => $request->info7,
        'preventivo8' => $request->info8,
        'correctivo1' => $request->info9,
        'correctivo2' => $request->info10,
        'correctivo3' => $request->info11,
        'correctivo4' => $request->info12,
        'correctivo5' => $request->info13,
        'correctivo6' => $request->info14,
        'correctivo7' => $request->info15,
        'correctivo8' => $request->info16,
        'id_user'=> $userId,
    ]);
    return redirect()->route('dashboardHojas')->with('success', 'Hoja añadida correctamente!');

}
public function verHoja($id){
    $user = auth()->user();
    // Busca la tarea por ID y asegura que pertenece al usuario autenticado
    $hoja = $user->hojas()->where('id', $id)->first();
    if (!$hoja) {
        return redirect()->route("dashboardHojas")->withSuccess("La hoja no existe");
    }  
    return view('formularioHojaDeVidaEquipos',['hoja' => $hoja]);
}
}
