<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CarteirasTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $numeroDeCarteiras = 20;

        for ($i = 0; $i < $numeroDeCarteiras; $i++) {
            \DB::table('carteira')->insert([
                'idUsuario' => 1,
                'saldo' => $faker->numberBetween($min = 100, $max = 9000),
            ]);
        }
    }
}
// Comando para rodar as Seeders
//php artisan db:seed --class=CarteirasTableSeeder