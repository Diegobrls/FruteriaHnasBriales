<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    use HasFactory;

    protected $table = "pedidos";
    //relacion de mucho a 1 con usuarios
    public function usuario() {
        return $this->belongsTo(User::class);
    }
    //relacion de mucho a 1 con Cestas
    public function cesta() {
        return $this->belongsTo(Cestas::class);
    }

    public function cesta_personal() {
        return $this->belongsTo(Cestas_personal::class, 'cesta_personal_id');
    }

    protected $fillable = [
        'nota',
        'direccion',
        'nombre_destinatario',
        'horario_entrega',
        'fecha_entrega',
        'fecha_realizacion',
        'cesta_id',
        'user_id',
    ];
}
