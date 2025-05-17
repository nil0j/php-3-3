<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comandas')->insert([
            'usuari_id' => 1,
            'producte' => 'Portàtil',
            'preu' => 1200.50,
        ]);

        DB::table('comandas')->insert([
            'usuari_id' => 2,
            'producte' => 'Auriculars',
            'preu' => 50.00,
        ]);

        DB::table('comandas')->insert([
            'usuari_id' => 1,
            'producte' => 'Ratolí',
            'preu' => 25.99,
        ]);
    }
}
