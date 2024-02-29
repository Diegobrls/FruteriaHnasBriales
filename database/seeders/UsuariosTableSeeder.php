<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Asegúrate de incluir esta línea

class namesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('names')->insert([
            [
                'name' => 'juanito123',
                'email' => 'juanito@example.com',
                'password' => bcrypt('contraseña123'),
            ],
            [
                'name' => 'mariagarcia',
                'email' => 'maria@example.com',
                'password' => bcrypt('secreto456'),
            ],
            [
                'name' => 'pedroperez',
                'email' => 'pedro@example.com',
                'password' => bcrypt('password789'),
            ],
        ]);
    }
}
