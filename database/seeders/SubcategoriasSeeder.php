<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubcategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION FINANCIERA',
            'sigla'=> 'GF',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'PRESUPUESTO',
            'sigla'=> 'PRE',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'CONTABILIAD',
            'sigla'=> 'CON',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'FACTURACION',
            'sigla'=> 'FAC',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'TESORERIA',
            'sigla'=> 'TES',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'CARTERA',
            'sigla'=> 'CAR',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'COSTOS',
            'sigla'=> 'COS',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'AUITORIA INTEGRAL',
            'sigla'=> 'AUD',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'APOYO LOGISTICO',
            'sigla'=> 'AL',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'MANTENIMIENTO  BIOMEDICO',
            'sigla'=> 'MNB',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'MANTENIMIENTO HOSPITALARIO',
            'sigla'=> 'MNH',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'SERVICIO DE ALIMENTOS',
            'sigla'=> 'SA',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'ASEO Y DESINFECCION',
            'sigla'=> 'SG',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION DE TALENTO HUMANO',
            'sigla'=> 'RH',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'SEGURIDAD Y SALUD EN EL TRABAJO Y MEDIO AMBIENTE',
            'sigla'=> 'SOM',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'ALMACEN',
            'sigla'=> 'ALM',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION DOCUMENTAL',
            'sigla'=> 'GD',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'CONTROL INTERNO DISCIPLINARIO',
            'sigla'=> 'CID',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION JURIDICA Y CONTRACTUAL',
            'sigla'=> 'JUR',
            'proceso_f' => 3
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION ASISTENCIAL',
            'sigla'=> 'GA',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'VIGILANCIA EN SALUD PUBLICA Y EGURIDAD EL PACIENTE',
            'sigla'=> 'EPI',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'ENFERMERIA',
            'sigla'=> 'ENF',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'COORDINACION MEDICA',
            'sigla'=> 'MED',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'DOCENCIA SERVICIO E INVETIGACION',
            'sigla'=> 'DSI',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'CONSULTA EXTERNA',
            'sigla'=> 'CE',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'URGENCIAS',
            'sigla'=> 'URG',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'REFERENCIA Y CONTRAREFERENCIA',
            'sigla'=> 'REF',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'TRASLADO ASISTENCIAL',
            'sigla'=> 'TAS',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'HOSPITALIZACION',
            'sigla'=> 'HOS',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'ATENCION DOMICILIARIA',
            'sigla'=> 'DOM',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'MEDICINA CRITICA',
            'sigla'=> 'MC',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'UNIDAD DE CUIDADO INTENSIVO ADULTOS',
            'sigla'=> 'UCIA',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'UNIDAD DE CUIDADO INTENSIVO NEONATAL',
            'sigla'=> 'UCIN',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'UNIDAD DE CUIDADO INTENSIVO PEDIATRICO',
            'sigla'=> 'UCIP',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'CIRUGIA',
            'sigla'=> 'QP',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GINECOOBSTETRICIA',
            'sigla'=> 'GO',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'SALUD MENTAL',
            'sigla'=> 'USM',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'APOYO DIAGNOSTICO Y TERAPEUTICO',
            'sigla'=> 'ADX',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'LABORATORIO CLINICO',
            'sigla'=> 'LAB',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'LABORATORIO DE PATOLOGIA',
            'sigla'=> 'PAT',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'IMAGENOLOGIA',
            'sigla'=> 'IMG',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'HEMODINAMIA Y DIAGNOSTICO CARDIOVASCULAR',
            'sigla'=> 'HEM',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'SOPORTE TERAPEUTICO',
            'sigla'=> 'ST',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'TERAPIAS',
            'sigla'=> 'TER',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'NUTRICION CLINICA',
            'sigla'=> 'NC',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'SERVICIO FARMACEUTICO',
            'sigla'=> 'SF',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'BANCO DE SANGRE Y SERVICIO TRANSFUSIONAL',
            'sigla'=> 'BS',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'UNIDAD DE SERVICIOS ONCOLOGICOS',
            'sigla'=> 'USC',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'ATENCION AL USUARIO Y TRABAJO SOCIAL',
            'sigla'=> 'AU',
            'proceso_f' => 2
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'CONTROL INTERNO DE GESTION',
            'sigla'=> 'CI',
            'proceso_f' => 4,
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION GERENCIAL',
            'sigla'=> 'GER',
            'proceso_f' => 1
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION E PLANEACION Y DESARROLLO INSTITUCIONAL',
            'sigla'=> 'PDI',
            'proceso_f' => 1
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION DE LA CALIDAD',
            'sigla'=> 'GC',
            'proceso_f' => 1
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION DE ESTADISTICA',
            'sigla'=> 'SIE',
            'proceso_f' => 1
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION DE TECNOLOGIAS INFORMACION Y COMUNICACIONES',
            'sigla'=> 'TIC',
            'proceso_f' => 1
        ]);
        DB::table('subcategorias')->insert([
            'documento'    => 'GESTION COMERCIAL',
            'sigla'=> 'CC',
            'proceso_f' => 1
        ]);
    }
}
