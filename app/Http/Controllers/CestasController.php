<?php

namespace App\Http\Controllers;

use App\Models\Cestas;
use App\Models\Elementos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CestasController extends Controller
{
    /**
     * @param Request $request
     * Muestra la página principal con todas las cestas e implementando las funciones de filtrado
     */
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
                    break;
            }
        }

        $cestas = $query->get();

        if ($cestas->isEmpty()) {
            session()->flash('mensaje', 'No hay ninguna cesta con esas características.');
        }

        return view('dashboard', compact('cestas'));
    }

    /*
     * Redirige a la página para crear cesta
     */
    public function crearcatalogo()
    {
        $elementos = Elementos::all();
        return view('crearcestacatalogo', compact('elementos'));
    }

    /**
     * Método para procesar el formulario y guardar la cesta
     * @param Request $request
     */
    public function guardarCestaCatalogo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'elementos' => 'array|min:5',
            'nombre' => 'required|string|min:3',
            'descripcion' => 'required|string|min:3',
            'precio' => 'required|numeric|min:0',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ], [
            'elementos.min' => 'Selecciona al menos 5 elementos.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'precio.min' => 'El precio no puede ser negativo.',
            'foto.image' => 'El archivo debe ser una imagen.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('crearcestacatalogo')->withErrors($validator)->withInput();
        }
    
        $elementosIds = $request->input('elementos');
        $elementos = Elementos::whereIn('id', $elementosIds)->get();
        $cantidadElementos = count($elementosIds);

        if( $request->hasfile('foto') ){
            $archivo = $request->file('foto');
            $rutadestino = 'img/cestas_fotos/';
            $nombrearchivo = time() . '-' . $archivo->getClientOriginalName();
            $subidaarchivo = $request->file('foto')->move($rutadestino, $nombrearchivo);
            } else {
                $subidaarchivo = 'img/cestas_fotos/cesta_predefinida.jpg';
            }
    
        $cesta = Cestas::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'foto' => $subidaarchivo,
            'precio' => $request->input('precio'),
            'cantidad_elementos' => $cantidadElementos,
        ]);
    
        $cesta->elementos()->attach($elementosIds);
    
        return redirect()->route('dashboard')->with('success', 'Cesta creada exitosamente.');
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
        $validator = Validator::make($request->all(), [
            'elementos' => 'array|min:5',
            'nombre' => 'required|string|min:3',
            'descripcion' => 'required|string|min:3',
            'precio' => 'required|numeric|min:0',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ], [
            'elementos.min' => 'Selecciona al menos 5 elementos.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'precio.min' => 'El precio no puede ser negativo.',
            'foto.image' => 'El archivo debe ser una imagen.',
        ]);
        if ($validator->fails()) {
            return redirect()->route('crearcesta')->withErrors($validator)->withInput();
        }

        $cesta = Cestas::find($id);
        if (!$cesta) {
            return redirect()->back()->with('error', 'La cesta no fue encontrada.');
        }
        if( $request->hasfile('foto') ){
            $archivo = $request->file('foto');
            $rutadestino = 'img/cestas_fotos/';
            $nombrearchivo = time() . '-' . $archivo->getClientOriginalName();
            $subidaarchivo = $request->file('foto')->move($rutadestino, $nombrearchivo);

            $cesta->foto = $subidaarchivo;
        }

        $elementosIds = $request->input('elementos');
        $cantidadElementos = count($elementosIds);

        $cesta->nombre = $request->input('nombre');
        $cesta->descripcion = $request->input('descripcion');
        $cesta->precio = $request->input('precio');
        $cesta->cantidad_elementos = $cantidadElementos;

        $cesta->save();

        $cesta->elementos()->sync($elementosIds);

        return redirect()->route('dashboard')->with('success', 'Cesta actualizada exitosamente.');
    }

}
