<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'estado' => 'VIGENTE'
        ]);

        DB::table('estados')->insert([
            'estado' => 'OBSOLETO'
        ]);
        DB::table('estados')->insert([
            'estado' => 'ESCANEADO'
        ]);

    }
}
