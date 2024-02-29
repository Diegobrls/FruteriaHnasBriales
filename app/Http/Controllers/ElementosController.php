<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Elementos;

class ElementoController extends Controller
{
    // Función para mostrar todos los elementos disponibles
    public function AllElementos()
    {
        $elementos = Elementos::all();
        return view('elementos.index', compact('elementos'));
    }
}