<?php

namespace App\Http\Controllers;

use App\Models\Cestas_personal;
use App\Models\Elementos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CestasPersonalController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $cestasPersonal = $usuario->cestas_personal;
        if ($cestasPersonal->isEmpty()) {
            session()->flash('mensaje', 'No hay ninguna cesta creada aún.');
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'elementos' => 'required|array|min:5',
            'foto' => 'nullable|image',
        ], [
            'nombre.required' => 'El nombre de la cesta es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'elementos.required' => 'Debes seleccionar al menos 5 elementos.',
            'elementos.min' => 'Debes seleccionar al menos 5 elementos.',
            'foto.image' => 'El archivo debe ser una imagen.',
        ]);

        $usuarioId = Auth::id();
        $precioBase = 15;
        $elementosIds = $request->input('elementos');
        $elementos = Elementos::whereIn('id', $elementosIds)->get();
        $costoElementos = $elementos->sum('valor');
        $precioTotal = $precioBase + $costoElementos;

        $cantidadElementos = count($elementosIds);

        if( $request->hasfile('foto') ){
            $archivo = $request->file('foto');
            $rutadestino = 'img/cestas_fotos/';
            $nombrearchivo = time() . '-' . $archivo->getClientOriginalName();
            $subidaarchivo = $request->file('foto')->move($rutadestino, $nombrearchivo);
            } else {
                $subidaarchivo = null;
            }

        $cesta = Cestas_Personal::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $precioTotal,
            'cantidad_elementos' => $cantidadElementos,
            'foto' => $subidaarchivo,
            'user_id' => $usuarioId,
        ]);

        $cesta->elementos()->attach($elementosIds);

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
     * @param $cestaId 
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
     * @param Request $request
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
        $cesta->user_id = $usuarioId;

        $cesta->save();

        $cesta->elementos()->sync($elementosIds);

        return redirect()->route('miscestas')->with('success', 'Cesta actualizada exitosamente.');
    }
}
