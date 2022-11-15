<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            EstadoSeeder::class,
            TiposSeeder::class,
            SubcategoriasSeeder::class,
            ResponsablesSeeder::class,
            SiglasDocumentoSeeder::class,
            BlogSeeder::class,

          ]);

    }
}
