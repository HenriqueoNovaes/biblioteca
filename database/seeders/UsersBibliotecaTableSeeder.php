<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersBibliotecaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        foreach (range(1, 40) as $index) {
            DB::table('users_biblioteca')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'registration_number' => $faker->unique()->regexify('[0-9]{10}'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

//COMPOSTO DE NUMEROS E LETRAS
//'registration_number' => $faker->unique()->regexify('[A-Za-z0-9]{10}'),
