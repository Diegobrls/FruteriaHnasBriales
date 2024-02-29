<?php

namespace App\Http\Controllers;

use App\Models\Cestas;
use Illuminate\Http\Request;

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
    
}
