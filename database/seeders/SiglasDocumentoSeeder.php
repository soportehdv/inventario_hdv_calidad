<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SiglasDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siglas_documentos')->insert([
            'documento'    => 'POLITICA',
            'sigla'=> 'POL',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'PLAN',
            'sigla'=> 'PL',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'REGLAMENTO',
            'sigla'=> 'RG',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'PROGRAMA',
            'sigla'=> 'PG',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'MANUAL',
            'sigla'=> 'MN',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'MODELO DE GESTION O CARACTERIZACION DE PROCESO',
            'sigla'=> 'MG',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'MAPA DE RIESGOS',
            'sigla'=> 'MR',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'PROCEDIMIENTO',
            'sigla'=> 'PR',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'PROTOCOLO',
            'sigla'=> 'PRO',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'GUIA',
            'sigla'=> 'GUI',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'INSTRUCTIVOS',
            'sigla'=> 'INS',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'PLANOS',
            'sigla'=> 'PLN',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'FORMATOS',
            'sigla'=> 'FR',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'ANEXOS',
            'sigla'=> 'ANEXO',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'RESOLUCION',
            'sigla'=> 'RES',
        ]);
        DB::table('siglas_documentos')->insert([
            'documento'    => 'RUTA',
            'sigla'=> 'RUTA',
        ]);
    }
}
