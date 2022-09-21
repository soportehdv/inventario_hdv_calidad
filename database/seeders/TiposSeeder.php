<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;


class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            'nombre_id'            => 'ESTRATEGICOS',
        ]);
        DB::table('tipos')->insert([
            'nombre_id'            => 'MISIONAL',
        ]);
        DB::table('tipos')->insert([
            'nombre_id'            => 'APOYO',
        ]);
        DB::table('tipos')->insert([
            'nombre_id'            => 'EVALUACION',
        ]);
    }
}
