<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elementos_cesta_personal extends Model
{
    use HasFactory;
    protected $table = "elementos_cesta";
    //Relacion mucho a mucho con cestas personalizadas
    public function cesta_personal() {
        return $this->belongsTo(Cestas_personal::class);
    }
    //Relacion mucho a mucho con elementos
    public function elemento() {
        return $this->belongsTo(Elementos::class);
    }
}
