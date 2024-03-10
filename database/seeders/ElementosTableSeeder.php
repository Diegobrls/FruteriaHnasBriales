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
                'valor' => 1.5,
            ],
            [
                'nombre' => 'Peras',
                'descripcion' => 'Peras maduras y deliciosas',
                'valor' => 2.0,
            ],
            [
                'nombre' => 'Plátanos',
                'descripcion' => 'Plátanos maduros y dulces',
                'valor' => 1.8,
            ],
            [
                'nombre' => 'Fresas',
                'descripcion' => 'Fresas rojas y sabrosas',
                'valor' => 3.5,
            ],
            [
                'nombre' => 'Uvas',
                'descripcion' => 'Uvas frescas y jugosas',
                'valor' => 3,
            ],
            [
                'nombre' => 'Naranjas',
                'descripcion' => 'Naranjas jugosas y llenas de vitamina C',
                'valor' => 1.2,
            ],
            [
                'nombre' => 'Pera asiática (Nashi)',
                'descripcion' => 'Pera asiática crujiente y refrescante',
                'valor' => 2.5,
            ],
            [
                'nombre' => 'Piña',
                'descripcion' => 'Piña tropical dulce y jugosa',
                'valor' => 5.0,
            ],
            [
                'nombre' => 'Kiwi',
                'descripcion' => 'Kiwi verde y refrescante',
                'valor' => 4.8,
            ],
            [
                'nombre' => 'Mango',
                'descripcion' => 'Mango maduro y exótico',
                'valor' => 3.8,
            ],
            [
                'nombre' => 'Coco',
                'descripcion' => 'Coco fresco y tropical',
                'valor' => 1.3,
            ],
            [
                'nombre' => 'Limón',
                'descripcion' => 'Limón ácido y refrescante',
                'valor' => 0.8,
            ],
            [
                'nombre' => 'Bombones de chocolate',
                'descripcion' => 'Exquisitos bombones de chocolate rellenos',
                'valor' => 9.0,
            ],
            [
                'nombre' => 'Champagne',
                'descripcion' => 'Botella de champagne pequeña',
                'valor' => 5.5,
            ],
            [
                'nombre' => 'Membrillo',
                'descripcion' => 'Delicioso membrillo en almíbar',
                'valor' => 4.5,
            ],
            [
                'nombre' => 'Mermelada de frambuesa',
                'descripcion' => 'Mermelada casera de frambuesa',
                'valor' => 6.0,
            ],
            [
                'nombre' => 'Café gourmet',
                'descripcion' => 'Café de gran calidad y aroma intenso',
                'valor' => 4.3,
            ],
            [
                'nombre' => 'Queso Gouda',
                'descripcion' => 'Queso Gouda holandés',
                'valor' => 7.4,
            ],
            [
                'nombre' => 'Aceitunas verdes rellenas de pimiento',
                'descripcion' => 'Aceitunas verdes rellenas de pimiento rojo',
                'valor' => 2.4,
            ],
            [
                'nombre' => 'Tarta de frutas',
                'descripcion' => 'Tarta artesanal de frutas frescas',
                'valor' => 4.4,
            ],
            [
                'nombre' => 'Vino tinto reserva',
                'descripcion' => 'Botella de vino tinto reserva',
                'valor' => 12,
            ],
            [
                'nombre' => 'Almendras tostadas',
                'descripcion' => 'Almendras tostadas y crujientes',
                'valor' => 3.6,
            ],
        ]);
    }
}
