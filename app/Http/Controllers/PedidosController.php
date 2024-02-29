<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Cestas_personal;
use Illuminate\Support\Facades\Auth;

class PedidosController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $pedidos = $usuario->pedidos;
        if ($pedidos->isEmpty()) {
            session()->flash('mensaje', 'No hay ningun pedido realizado');
        }
        return view('mispedidos', compact('pedidos'));
    }

    public function create($cestaId)
    {
        $cesta = Cestas_personal::findOrFail($cestaId);
        return view('crearpedido', compact('cesta'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nota' => 'nullable|string',
            'direccion' => 'required|string',
            'nombre_destinatario' => 'required|string',
            'horario_entrega' => 'nullable|string',
            'fecha_entrega' => 'required|date',
        ]);

        // Crear el pedido
        Pedidos::create([
            'nota' => $request->input('nota'),
            'direccion' => $request->input('direccion'),
            'nombre_destinatario' => $request->input('nombre_destinatario'),
            'horario_entrega' => $request->input('horario_entrega'),
            'fecha_entrega' => $request->input('fecha_entrega'),
            'fecha_realizacion' => now(),
            'cesta_id' => $request->input('cesta_id'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Pedido realizado con éxito.');
    }
}
