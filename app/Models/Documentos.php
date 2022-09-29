<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;

    protected $table = "documentos";

    protected $fillable = [

        'tipoProceso',
        'proceso',
        'tipoDocumento',
        'codigo',
        'nombre',
        'versionActual',
        'fechaAprobacion',
        'estado',
        'observacion',

        // files pdf
        'extension',
        'name',
        'ruta',
        'mime',
        'size',

        // files editor
        'extension_edit',
        'name_edit',
        'ruta_edit',
        'size_edit',


    ];

}
