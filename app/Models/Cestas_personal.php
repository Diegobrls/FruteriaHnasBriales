<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cestas_personal extends Model
{
    use HasFactory;

    protected $table = "cestas_personal";
    //relacion muchos a 1 con usuario
    public function usuario() {
        return $this->belongsTo(User::class);
    }
    //relacion 1 a muchos con pedidos
    public function pedidos() {
        return $this->hasMany(Pedidos::class);
    }
    //relacion mucho a mucho con elementos
    public function elementos() {
        return $this->belongsToMany(Elementos::class, 'elementos_cesta_personal', 'cesta_id', 'elemento_id');
    }

    protected $fillable = [
        'nombre',
        'descripcion',
        'foto',
        'precio',
        'cantidad_elementos',
        'user_id',
    ];
}
