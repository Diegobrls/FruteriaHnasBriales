<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Asegúrate de incluir esta línea


class CestasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cestas')->insert([
            [
                'nombre' => 'Caribe',
                'descripcion' => 'Llena de frutas frescas tropicales',
                'precio' => 29.99,
                'cantidad_elementos' => 5,
            ],
            [
                'nombre' => 'Suiza',
                'descripcion' => 'Mezcla de frutas de temporada con buen chocolate',
                'precio' => 39.99,
                'cantidad_elementos' => 7,
            ],
            [
                'nombre' => 'Colombia',
                'descripcion' => 'Frutas deliciosas y un fuerte aroma del mejor cafe',
                'precio' => 49.99,
                'cantidad_elementos' => 10,
            ],
            [
                'nombre' => 'España',
                'descripcion' => 'Productos autóctonos al 100%',
                'precio' => 59.99,
                'cantidad_elementos' => 13,
            ],
        ]);
    }
}
