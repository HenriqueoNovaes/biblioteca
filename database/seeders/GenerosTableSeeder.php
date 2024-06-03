<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('generos')->insert([
            ['id' => 1, 'name' => 'Aventuras', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 2, 'name' => 'Biografia', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 3, 'name' => 'Ciência', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 4, 'name' => 'Ciência Ficcional', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 5, 'name' => 'Clássico', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 6, 'name' => 'Conto', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 7, 'name' => 'Drama', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 8, 'name' => 'Fantasia', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 9, 'name' => 'Ficção Histórica', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 10, 'name' => 'Horror', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 11, 'name' => 'Mistério', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 12, 'name' => 'Poesia', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 13, 'name' => 'Policial', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 14, 'name' => 'Romance', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 15, 'name' => 'Suspense', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 16, 'name' => 'Terror', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
            ['id' => 17, 'name' => 'Thriller', 'created_at' => '2024-06-01 20:03:54', 'updated_at' => '2024-06-01 20:03:54'],
        ]);
    }
}
