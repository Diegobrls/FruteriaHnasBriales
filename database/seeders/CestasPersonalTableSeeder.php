<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Asegúrate de incluir esta línea


class CestasPersonalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cestas_personal')->insert([
            [
                'nombre' => 'Con amor',
                'descripcion' => 'Las frutas favoritas de mi amiga Carmen',
                'precio' => 29.99,
                'cantidad_elementos' => 5,
            ],
        ]);
    }
}
