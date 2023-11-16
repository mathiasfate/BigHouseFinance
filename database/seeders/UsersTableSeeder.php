<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            \DB::table('users')->insert([
                'name' => 'Matheus Casagrande',
                'email' => 'mccghdev@gmail.com',
                'password' => 'Mccgh@197063'
            ]);
        }
    }
    //php artisan db:seed --class=UsersTableSeeder
