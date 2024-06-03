<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LivrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        foreach (range(1, 170) as $index) {
            DB::table('livros')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'registration_number_book' => $faker->unique()->regexify('[0-9]{10}'),
                'genre_id' => $faker->numberBetween(1, 17),
                'status' => $faker->randomElement(['Disponível']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
