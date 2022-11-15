<?php

namespace App\Exports;

use App\Models\Documentos;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class DocumentosExport implements FromQuery , WithHeadings , WithMapping, WithEvents
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $fechaInicio, string $fechaFin)
    {

        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;

    }

    public function query()
    {
        return Documentos::query()
        ->join('tipos', 'tipos.id', '=', 'documentos.tipoProceso')
        ->join('subcategorias', 'subcategorias.id', '=', 'documentos.proceso')
        ->join('siglas_documentos', 'siglas_documentos.id', '=', 'documentos.tipoDocumento')
        ->join('estados', 'estados.id', '=', 'documentos.estado')
        ->select('documentos.*', 'tipos.nombre_id as nombre_id', 'subcategorias.documento as documento', 'siglas_documentos.documento as siglas', 'documentos.codigo as codigo', 'documentos.nombre as nombre' , 'documentos.versionActual as versionActual' , 'documentos.fechaAprobacion as fechaAprobacion' , 'estados.estado as status', 'documentos.updated_at as updated_at')
        ->where('documentos.updated_at','>=',$this->fechaInicio);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tipo de proceso',
            'Proceso / Subproceso',
            'Tipo de documento',
            'Codigo',
            'Nombre',
            'Versión actual',
            'Fecha de aprobación',
            'Estado',
            'Fecha de actualización',
        ];
    }
    public function map($row): array
    {
        $fecha = Carbon::parse($row->fecha)->format('d/m/Y H:i:s');

        return [
            $row->id,
            $row->nombre_id,
            $row->documento,
            $row->siglas,
            $row->codigo,
            $row->nombre,
            $row->versionActual,
            $row->fechaAprobacion,
            $row->status,
            $row->updated_at,
        ];
    }

    public function registerEvents(): array
    {

        return array(
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->setAutoFilter();
            }
        );
    }

    // public function collection()
    // {
    //     return Documentos::join('tipos', 'tipos.id', '=', 'documentos.tipoProceso')
    //     ->join('subcategorias', 'subcategorias.id', '=', 'documentos.proceso')
    //     ->join('siglas_documentos', 'siglas_documentos.id', '=', 'documentos.tipoDocumento')
    //     ->join('estados', 'estados.id', '=', 'documentos.estado')
    //     ->select('documentos.*', 'tipos.nombre_id as nombre_id', 'subcategorias.documento as documento', 'siglas_documentos.documento as siglas', 'codigo', 'nombre' , 'versionActual' , 'fechaAprovacion' , 'estados.estado as status')
    //     ->get();
    // }
}
