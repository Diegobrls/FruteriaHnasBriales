<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elementos_cesta extends Model
{
    use HasFactory;

    protected $table = "elementos_cesta";
    //Relacion mucho a mucho con cestas
    public function cesta() {
        return $this->belongsTo(Cestas::class);
    }
    //Relacion mucho a mucho con elementos
    public function elemento() {
        return $this->belongsTo(Elementos::class);
    }
}
