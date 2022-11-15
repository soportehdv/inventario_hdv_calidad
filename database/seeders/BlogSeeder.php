<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Blogs')->insert([
            'titulo'        => 'Hospital departamental de villavicencio',
            'subtitulo1'    => 'Bienvenidos al Repositorio de calidad',
            'subtitulo2'    => '¡Aqui encontraras todos los formatos vigente listos para su descarga!',
            'tBoton'        => 'Buscar',
            'imagen1'       => '',
            'imagen2'       => '',
            'imagen3'       => '',
            'parrafo'       => 'Reporitorio de calidad es un directorio global de los formatos de acceso abierto del HOSPITAL DEPARTAMENTAL DE VILLAVICENCIO. Puede buscar y navegar a través de miles de formatos registrados. Puede filtrar por sus difrentes características, como el tipo de proceso, subprocesos y nombre entre otros.',
            'fTitulo'       => 'Pruébelo usted mismo:',
            'logo'          => '',
            'cFondo1'       => '#ffbd50',
            'cFondo2'       => '#2a6eff',
            'cTitulo'       => '#215196',
            'cSubtitulo1'   => '#215196',
            'cSubtitulo2'   => '#4c1c1c',
            'cBoton'        => '#ffbd50',
            'cParrafo'      => '#215196',
            'cTitulo2'      => '#ffffff',
        ]);
    }
}
