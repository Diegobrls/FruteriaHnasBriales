<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cestas extends Model
{
    use HasFactory;
    //relacion 1 a muchos con pedidos
    public function pedidos() {
        return $this->hasMany(Pedidos::class);
    }
    //relacion mucho a mucho con elementos
    public function elementos() {
        return $this->belongsToMany(Elementos::class, 'elementos_cesta', 'cesta_id', 'elemento_id');
    }

    protected $fillable = [
        'nombre',
        'descripcion',
        'foto',
        'precio',
        'cantidad_elementos',
    ];
}
