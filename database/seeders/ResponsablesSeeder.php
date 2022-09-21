<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ResponsablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('responsables')->insert([
            'proceso'    => 'Gestión Gerencial',
            'responsable'=> 'Gerente',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Gestión de Planeación y Desarrollo Institucional',
            'responsable'=> 'Jefe Oficina Asesora de Planeación y Desarrollo Institucional',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Gestión Comercial',
            'responsable'=> 'Jefe Oficina Comercial',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Gestión de Tecnologías, Información y Comunicaciones',
            'responsable'=> 'Jefe Oficina Asesora de Planeación y Desarrollo Institucional/Coordinador Unidad Funcional de Tecnologías de la Información y las Comunicaciones',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Gestión Asistencial',
            'responsable'=> 'Subgerente Asistencial',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Medicina Crítica',
            'responsable'=> 'Coordinador Unidad Funcional de Medicina Crítica',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Apoyo Diagnóstico',
            'responsable'=> 'Coordinador Unidad Funcional de Apoyo Diagnóstico y Terapéutico',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Soporte Terapéutico',
            'responsable'=> 'Coordinador Unidad Funcional de Apoyo Diagnóstico y Terapéutico',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Urgencias',
            'responsable'=> 'Coordinador Unidad Funcional de Urgencias',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Cirugía',
            'responsable'=> 'Coordinador Unidad Funcional de Cirugía',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Banco de Sangre y Servicio Transfusional',
            'responsable'=> 'Coordinador Unidad Funcional de Apoyo Diagnóstico y Terapéutico',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Ginecoobstetricia',
            'responsable'=> 'Coordinador Unidad Funcional de Ginecoobstetricia',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Hospitalización',
            'responsable'=> 'Coordinador Unidad Funcional de Hospitalización',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Consulta Externa',
            'responsable'=> 'Coordinador Unidad Funcional de Consulta Externa',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Atención al Usuario y Trabajo Social',
            'responsable'=> 'Coordinador Unidad Funcional de Atención al Usuario',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Atención Domiciliaria',
            'responsable'=> 'Coordinador Unidad Funcional de Hospitalización',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Salud Mental',
            'responsable'=> 'Coordinador Unidad Funcional de Salud Mental',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Servicio Farmacéutico',
            'responsable'=> 'Coordinador Unidad Funcional de Apoyo Diagnóstico y Terapéutico',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Unidad de Servicios Oncológicos',
            'responsable'=> 'Coordinador Unidad Funcional de Servicios Oncológicos',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Docencia, Servicio e Investigación',
            'responsable'=> 'Coordinador Docencia y Servicio ',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Gestión Financiera',
            'responsable'=> 'Subgerente Financiero',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Gestión de Talento Humano',
            'responsable'=> 'Jefe Unidad Funcional de Talento Humano',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Apoyo Logístico',
            'responsable'=> 'Subgerente Administrativo',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Gestión Documental',
            'responsable'=> 'Jefe Unidad Funcional Gestión Documental',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Gestión Jurídica y Contractual',
            'responsable'=> 'Jefe Oficina Asesora Jurídica',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Almacén',
            'responsable'=> 'Subgerente Administrativo',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Auditoría Integral',
            'responsable'=> 'Subgerente Financiero',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Control Interno Disciplinario',
            'responsable'=> 'Jefe Oficina de Control Interno Disciplinario',
        ]);
        DB::table('responsables')->insert([
            'proceso'    => 'Control Interno de Gestión',
            'responsable'=> 'Jefe Oficina de Control Interno de Gestión',
        ]);
    }
}

