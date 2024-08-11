<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tarea;
class TareasController extends Controller
{
    public function dashboard(Request $request)
    {
        if (Auth::check()) { 
            $tarea=  tarea::where('estado', 1)
            ->where('id_user', Auth::id())
            ->get();
            
    return view('dashboard',['tareas'=>$tarea]); 
        }
        return  redirect()->route('index')
            ->withErrors([
                'email' => 'Porfavor inicie sesion para acceder al dashboard.',
            ])->onlyInput('email');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]); // Intentar autenticar el usuario desde la tabla "users"
    if (Auth::attempt($credentials)) {
            auth()->user();
            $request->session()->regenerate();
            return redirect()->route('dashboard')->withSuccess('Te has logueado correctamente!');

    }return back()->withErrors([
        'email' => 'Sus credenciales proporcionadas no coinciden en nuestros registros.',
    ])->onlyInput('email');}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
       
        return redirect()->route('index')
            ->withSuccess('Ha cerrado sesión con éxito!');
    }
    public function agregarTarea(Request $request){
        $request->validate([
            'tarea' => 'required|string|max:250',
            'lugar' => 'required|string|max:250',
            'notas' => 'nullable|string|max:250',
            'fecha' => 'required|string|max:250',
            'descripcion' => 'required|string|max:250',
            'slider' => 'required|integer|max:110',
        ]);
        $userId = Auth::id();
    
        tarea::create([
            'nombre_tarea' => $request->tarea,
            'lugar' => $request->lugar,
            'notas' => $request->notas,
            'fecha_tarea' => $request->fecha,
            'descripcion_tarea' => $request->descripcion,
            'porcentaje'=> $request->slider,
            'id_user'=> $userId,
        ]);
        return redirect()->back()->withSuccess("Tarea añadida correctamente!");


    }
    public function inhabilitarTarea(Request $request){
        $request->validate([
            'id' => 'required|integer|max:100',
        ]);
        $id = $request->input('id');
        $cambiarEstado=tarea::findOrfail($id);
        $cambiarEstado->estado=0;
        $cambiarEstado->save();
        return redirect()->back()->withSuccess("Tarea Cancelada Correctamente!");
    }
    public function obtenerDatosTareasAjax($id){
$tarea=tarea::find($id);
return response()->json([
    'nombre_tarea' => $tarea->nombre_tarea,
    'lugar' => $tarea->lugar,
    'notas' => $tarea->notas,
    'fecha_tarea' => $tarea->fecha_tarea,
    'descripcion_tarea' => $tarea->descripcion_tarea,
    'porcentaje'=> $tarea->porcentaje,
]);
    }
    public function updateTarea(Request $request){
        $id = $request->input('id');
        $tarea = tarea::find($id);
        $tarea->nombre_tarea = $request->input('tarea');
        $tarea->lugar = $request->input('lugar');
        $tarea->notas = $request->input('notas') ;
        $tarea->fecha_tarea = $request->input('fecha');
        $tarea->descripcion_tarea = $request->input('descripcion');
        $tarea->porcentaje = $request->input('slider');
        $tarea->save();
        return redirect()->back()->withSuccess("Los datos se han modificado correctamente!");
        ;
    }

}
