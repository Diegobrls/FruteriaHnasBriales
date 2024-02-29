<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elementos extends Model
{
    use HasFactory;
    //relacion mucho a mucho con cestas
    public function cestas() {
        return $this->belongsToMany(Cestas::class, 'elementos_cesta');
    }
    //relacion mucho a mucho con cestas personalizadas
    public function cestas_personal() {
        return $this->belongsToMany(Cestas_personal::class, 'elementos_cesta_personal', 'elemento_id', 'cesta_id');
    }
}
