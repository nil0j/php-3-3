<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuaris')->insert([
            'nom' => 'Anna',
            'email' => 'anna@example.com',
        ]);

        DB::table('usuaris')->insert([
            'nom' => 'Joan',
            'email' => 'joan@example.com',
        ]);

        DB::table('usuaris')->insert([
            'nom' => 'Marta',
            'email' => 'marta@example.com',
        ]);
    }
}
