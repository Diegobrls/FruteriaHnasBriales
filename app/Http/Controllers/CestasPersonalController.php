<?php

namespace App\Http\Controllers;

use App\Models\Cestas_personal;
use App\Models\Elementos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CestasPersonalController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $cestasPersonal = $usuario->cestas_personal;
        if ($cestasPersonal->isEmpty()) {
            session()->flash('mensaje', 'No hay ninguna cesta creada aun.');
        }
        return view('miscestas', compact('cestasPersonal'));
    }


    /*
     * Redirige a la página para crear cesta
     */
    public function crear()
    {
        $elementos = Elementos::all();
        return view('crearcesta', compact('elementos'));
    }


    /**
     * Método para procesar el formulario y guardar la cesta
     * @param Request $request
     */
    public function guardarCesta(Request $request)
    {
        $usuarioId = Auth::id();
        $precioBase = 15;
        $elementosIds = $request->input('elementos');
        $elementos = Elementos::whereIn('id', $elementosIds)->get();
        $costoElementos = $elementos->sum('valor');
        $precioTotal = $precioBase + $costoElementos;

        $cantidadElementos = count($elementosIds);

        if ($cantidadElementos < 5) {
            return redirect()->route('crearcesta')->with('alert', 'Debes marcar al menos 5 elementos.');
        }

        Cestas_Personal::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'foto' => $request->file('foto') ? $request->file('foto')->store('cestas_fotos') : null,
            'precio' => $precioTotal,
            'cantidad_elementos' => $cantidadElementos,
            'user_id' => $usuarioId,
        ]);
        return redirect()->route('miscestas')->with('success', 'Cesta creada exitosamente.');
    }


    /**
     * Metodo para borrar la cesta que el usuario ha creado
     * @param $id
     */
    public function borrarCesta($id)
    {
        $cesta = Cestas_Personal::find($id);
        if (!$cesta) {
            return redirect()->back()->with('error', 'La cesta no fue encontrada.');
        }
        $cesta->delete();
        return redirect()->route('miscestas')->with('success', 'La cesta fue eliminada correctamente.');
    }

    /**
     * Metodo para editar una cesta
     * @param $id 
     * 
     */
    public function editar($cestaId)
    {
        $cesta = Cestas_Personal::findOrFail($cestaId);
        $elementosDisponibles = Elementos::all();
        $elementosCesta = $cesta->elementos;
        return view('editarcesta', compact('cesta', 'elementosDisponibles', 'elementosCesta'));
    }

    /**
     * Metodo para editar una cesta
     * @param $id 
     * 
     */
    public function actualizar(Request $request, $id)
    {
            $cesta = Cestas_Personal::find($id);
        if (!$cesta) {
            return redirect()->back()->with('error', 'La cesta no fue encontrada.');
        }
        
        $usuarioId = Auth::id();
        $precioBase = 15;
        $elementosIds = $request->input('elementos');
        $elementos = Elementos::whereIn('id', $elementosIds)->get();
        $costoElementos = $elementos->sum('valor');
        $precioTotal = $precioBase + $costoElementos;
    
        $cantidadElementos = count($elementosIds);
    
        $cesta->nombre = $request->input('nombre');
        $cesta->descripcion = $request->input('descripcion');
        $cesta->foto = $request->file('foto') ? $request->file('foto')->store('cestas_fotos') : $cesta->foto;
        $cesta->precio = $precioTotal;
        $cesta->cantidad_elementos = $cantidadElementos;
        $cesta->user_id= $usuarioId;

        $cesta->save();
    
        // Redirigir a la página de mis cestas con un mensaje de éxito
        return redirect()->route('miscestas')->with('success', 'Cesta actualizada exitosamente.');
    }
}
