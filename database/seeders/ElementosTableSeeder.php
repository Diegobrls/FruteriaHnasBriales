<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Asegúrate de incluir esta línea


class ElementosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('elementos')->insert([
            [
                'nombre' => 'Manzana',
                'descripcion' => 'Manzana fresca y jugosa',
            ],
            [
                'nombre' => 'Peras',
                'descripcion' => 'Peras maduras y deliciosas',
            ],
            [
                'nombre' => 'Plátanos',
                'descripcion' => 'Plátanos maduros y dulces',
            ],
            [
                'nombre' => 'Fresas',
                'descripcion' => 'Fresas rojas y sabrosas',
            ],
            [
                'nombre' => 'Uvas',
                'descripcion' => 'Uvas frescas y jugosas',
            ],
            [
                'nombre' => 'Naranjas',
                'descripcion' => 'Naranjas jugosas y llenas de vitamina C',
            ],
            [
                'nombre' => 'Pera asiática (Nashi)',
                'descripcion' => 'Pera asiática crujiente y refrescante',
            ],
            [
                'nombre' => 'Piña',
                'descripcion' => 'Piña tropical dulce y jugosa',
            ],
            [
                'nombre' => 'Kiwi',
                'descripcion' => 'Kiwi verde y refrescante',
            ],
            [
                'nombre' => 'Mango',
                'descripcion' => 'Mango maduro y exótico',
            ],
            [
                'nombre' => 'Coco',
                'descripcion' => 'Coco fresco y tropical',
            ],
            [
                'nombre' => 'Limón',
                'descripcion' => 'Limón ácido y refrescante',
            ],
            [
                'nombre' => 'Bombones de chocolate',
                'descripcion' => 'Exquisitos bombones de chocolate rellenos',
            ],
            [
                'nombre' => 'Champagne',
                'descripcion' => 'Botella de champagne premium',
            ],
            [
                'nombre' => 'Membrillo',
                'descripcion' => 'Delicioso membrillo en almíbar',
            ],
            [
                'nombre' => 'Mermelada de frambuesa',
                'descripcion' => 'Mermelada casera de frambuesa',
            ],
            [
                'nombre' => 'Café gourmet',
                'descripcion' => 'Café de gran calidad y aroma intenso',
            ],
            [
                'nombre' => 'Queso Gouda',
                'descripcion' => 'Queso Gouda holandés',
            ],
            [
                'nombre' => 'Aceitunas verdes rellenas de pimiento',
                'descripcion' => 'Aceitunas verdes rellenas de pimiento rojo',
            ],
            [
                'nombre' => 'Tarta de frutas',
                'descripcion' => 'Tarta artesanal de frutas frescas',
            ],
            [
                'nombre' => 'Vino tinto reserva',
                'descripcion' => 'Botella de vino tinto reserva',
            ],
            [
                'nombre' => 'Almendras tostadas',
                'descripcion' => 'Almendras tostadas y crujientes',
            ],
        ]);
    }
}
