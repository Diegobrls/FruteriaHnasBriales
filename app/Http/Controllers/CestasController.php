<?php

namespace App\Http\Controllers;

use App\Models\Cestas;
use App\Models\Elementos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CestasController extends Controller
{
    public function index(Request $request)
    {
        $query = Cestas::query();
    
        $query->with('elementos');
        
        // Filtrar por precio mínimo
        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->precio_min);
        }
    
        // Filtrar por precio máximo
        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }
    
        // Filtrar por cantidad mínima de elementos
        if ($request->filled('elementos')) {
            $query->where('cantidad_elementos', '>=', $request->elementos);
        }
    
        // Ordenar
        if ($request->filled('ordenar_por')) {
            $ordenarPor = $request->ordenar_por;

            switch ($ordenarPor) {
                case 'precio_asc':
                    $query->orderBy('precio', 'asc');
                    break;
                case 'precio_desc':
                    $query->orderBy('precio', 'desc');
                    break;
                case 'elementos_asc':
                    $query->orderBy('cantidad_elementos', 'asc');
                    break;
                case 'elementos_desc':
                    $query->orderBy('cantidad_elementos', 'desc');
                    break;
                default:
                    // No hacer nada
                    break;
            }
        }

        $cestas = $query->get();
    
        if ($cestas->isEmpty()) {
            session()->flash('mensaje', 'No hay ninguna cesta con esas características.');
        }       
    
        return view('dashboard', compact('cestas'));
    }

        /**
     * Metodo para borrar una cesta del catalogo
     * @param $id
     */
    public function borrarCestaadmin($id)
    {
        $cesta = Cestas::find($id);
        if (!$cesta) {
            return redirect()->back()->with('error', 'La cesta no fue encontrada.');
        }
        $cesta->delete();
        return redirect()->route('dashboard')->with('success', 'La cesta fue eliminada correctamente.');
    }

    /**
     * Metodo para editar una cesta
     * @param $id 
     * 
     */
    public function editar($cestaId)
    {
        $cesta = Cestas::findOrFail($cestaId);
        $elementosDisponibles = Elementos::all();
        $elementosCesta = $cesta->elementos;
        return view('editarcestaadmin', compact('cesta', 'elementosDisponibles', 'elementosCesta'));
    }

    /**
     * Metodo para editar una cesta
     * @param $id 
     * 
     */
    public function actualizar(Request $request, $id)
    {
            $cesta = Cestas::find($id);
        if (!$cesta) {
            return redirect()->back()->with('error', 'La cesta no fue encontrada.');
        }
        
        $usuarioId = Auth::id();
        $elementosIds = $request->input('elementos');
        $cantidadElementos = count($elementosIds);
    
        $cesta->nombre = $request->input('nombre');
        $cesta->descripcion = $request->input('descripcion');
        $cesta->foto = $request->file('foto') ? $request->file('foto')->store('cestas_fotos') : $cesta->foto;
        $cesta->precio = $request->input('precio');
        $cesta->cantidad_elementos = $cantidadElementos;
        $cesta->user_id= $usuarioId;

        $cesta->save();
    
        // Redirigir a la página de mis cestas con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Cesta actualizada exitosamente.');
    }
    
}
