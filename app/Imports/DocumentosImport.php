<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Documentos;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DocumentosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Documentos([
            'tipoProceso'       => $row[0],
            'proceso'           => $row[1],
            'tipoDocumento'     => $row[2],
            'codigo'            => $row[3],
            'nombre'            => $row[4],
            'versionActual'     => $row[5],
            'fechaAprobacion'   => Carbon::createFromFormat('Y-m-d',$row[6])->toDateTimeString(),
            'estado'            => $row[7],
            'observacion'       => $row[8],
        ]);
    }
}
