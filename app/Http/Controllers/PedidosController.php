<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Cestas;
use App\Models\Cestas_personal;
use Illuminate\Support\Facades\Auth;


class PedidosController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $pedidos = $usuario->pedidos;
        if ($pedidos->isEmpty()) {
            session()->flash('mensaje', 'No hay ningun pedido aún.');
        }
        return view('mispedidos', compact('pedidos'));
    }

    /**
     * Coge una cesta o cesta personalizada y la envia a crear pedido
     * @param $cestaId
     */
    public function create($cestaId)
    {
        try {
            $cesta = Cestas::findOrFail($cestaId);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            try {
                $cesta_personal = Cestas_personal::findOrFail($cestaId);
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'No se ha encontrado la cesta con el ID proporcionado.');
            }
            return view('crearpedido', compact('cesta_personal'));
        }
        return view('crearpedido', compact('cesta'));
    }


    /**
     * Método para crear un pedido al que se le pasa la cesta y la info como request
     * @param Request $request
     */
    public function crear(Request $request)
    {
        $request->validate([
            'nota' => 'nullable|string',
            'direccion' => 'required|string',
            'nombre_destinatario' => 'required|string',
            'horario_entrega' => 'nullable|string',
            'fecha_entrega' => 'required|date|before:' . now()->addMonths(1)->format('Y-m-d'),
            'cesta_id' => 'nullable',
            'foto' => 'nullable',
            'cesta_personal_id' => 'nullable',
        ],[
            'direccion.required' => 'La dirección de entrega es obligatoria.',
            'nombre_destinatario.required' => 'El nombre del destinatario es obligatorio.',
            'fecha_entrega.required' => 'La fecha de entrega es obligatoria.',
            'fecha_entrega.before' => 'La fecha de entrega debe ser antes de un mes a partir de hoy.',
        ]);

        // Depuración de los datos recibidos
        $cestaPersonalId = $request->input('cesta_personal_id');
        $cestaId = $request->input('cesta_id');

        Pedidos::create([
            'nota' => $request->input('nota'),
            'direccion' => $request->input('direccion'),
            'nombre_destinatario' => $request->input('nombre_destinatario'),
            'horario_entrega' => $request->input('horario_entrega'),
            'fecha_entrega' => $request->input('fecha_entrega'),
            'fecha_realizacion' => now(),
            'cesta_personal_id' => $cestaPersonalId, 
            'cesta_id' => $cestaId, 
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('mispedidos')->with('success', 'Pedido realizado con éxito.');
    }


}
