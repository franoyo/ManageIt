<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tarea;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

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
            'email' => 'required|email|string|min:3',
            'password' => 'required|min:8'
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
    public function agregarTarea(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'tarea' => 'required|string|max:250',
        'lugar' => 'required|string|max:250',
        'notas' => 'nullable|string|max:250',
        'fecha' => 'required|string|max:250',
        'descripcion' => 'required|string|max:250',
        'slider' => 'required|integer|max:110',
        'images' => 'array|max:15', // Validar que se suba un máximo de 10 imágenes si existen
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10000',

    ]);

    // Obtener el ID del usuario autenticado
    $userId = Auth::id();

    // Crear la tarea en la base de datos y obtener la instancia creada
    $tarea = tarea::create([
        'nombre_tarea' => $request->tarea,
        'lugar' => $request->lugar,
        'notas' => $request->notas,
        'fecha_tarea' => $request->fecha,
        'descripcion_tarea' => $request->descripcion,
        'porcentaje'=> $request->slider,
        'id_user'=> $userId,
    ]);

    // Si se subieron imágenes, procesarlas
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Guardar la imagen en el almacenamiento
            $path = $image->store('images', 'public'); // Almacena en storage/app/public/images

            // Crear un registro para la imagen en la base de datos
            Photo::create([
                'id_tarea' => $tarea->id, // Relacionar la imagen con la tarea
                'ruta' => 'storage/'.$path, // Guardar la ruta de la imagen
            ]);
        }
    }
  

    // Redirigir de vuelta con un mensaje de éxito
    return redirect()->back()->with('success', 'Tarea añadida correctamente!');
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
    public function obtenerDatosTareasAjax($id)
    {
        $tarea = tarea::with('photos')->find($id); // Utiliza 'with' para cargar las fotos relacionadas
        
        return response()->json([
            'nombre_tarea' => $tarea->nombre_tarea,
            'lugar' => $tarea->lugar,
            'notas' => $tarea->notas,
            'fecha_tarea' => $tarea->fecha_tarea,
            'descripcion_tarea' => $tarea->descripcion_tarea,
            'porcentaje' => $tarea->porcentaje,
            'photos' => $tarea->photos, // Incluye las fotos en la respuesta
        ]);
    }
    public function borrarImagen(Request $request) {
        try {
            $request->validate([
                'id' => 'required|integer|max:10000',
            ]);
            $id = $request->input('id');
    
            $imagen = Photo::find($id);
            
            if ($imagen) {
                // Eliminar el archivo del almacenamiento
                $path = $imagen->ruta;
                $relativePath = str_replace('storage/', '', $path);
                if (Storage::disk('public')->exists($relativePath)) {
                    // Eliminar el archivo del almacenamiento
                    Storage::disk('public')->delete($relativePath);
                    $imagen->delete();
                    return response()->json(['success' => 'Imagen eliminada correctamente!']);
                } else {
                    return response()->json(['error' => 'El archivo no existe en el almacenamiento.'], 404);
                }
            }
            return response()->json(['error' => 'Imagen no encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }
    
    
    public function updateTarea(Request $request){
        $request->validate([
            'tarea' => 'required|string|max:250',
            'lugar' => 'required|string|max:250',
            'notas' => 'nullable|string|max:250',
            'fecha' => 'required|string|max:250',
            'descripcion' => 'required|string|max:250',
            'slider' => 'required|integer|max:110',
            'images' => 'array|max:15', // Validar que se suba un máximo de 10 imágenes si existen
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
    
        ]);
        $id = $request->input('id');
        $tarea = tarea::find($id);
        $tarea->nombre_tarea = $request->input('tarea');
        $tarea->lugar = $request->input('lugar');
        $tarea->notas = $request->input('notas') ;
        $tarea->fecha_tarea = $request->input('fecha');
        $tarea->descripcion_tarea = $request->input('descripcion');
        $tarea->porcentaje = $request->input('slider');
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Guardar la imagen en el almacenamiento
                $path = $image->store('images', 'public'); // Almacena en storage/app/public/images
    
                // Crear un registro para la imagen en la base de datos
                Photo::create([
                    'id_tarea' => $tarea->id, // Relacionar la imagen con la tarea
                    'ruta' => 'storage/'.$path, // Guardar la ruta de la imagen
                ]);
            }
        }
        $tarea->save();

      
        return redirect()->back()->withSuccess("Los datos se han modificado correctamente!");
        ;
    }
    public function verTarea($id){
        $user = auth()->user();
        // Busca la tarea por ID y asegura que pertenece al usuario autenticado
        $tarea = $user->tareas()->with('photos')->where('id', $id)->first();
        if (!$tarea) {
            return redirect()->route("dashboard")->withSuccess("La tarea no existe");
        }  
        return view('seeTarea',['tarea' => $tarea]);
    }
    
    

}
