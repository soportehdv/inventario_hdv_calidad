<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'titulo',
        'subtitulo1',
        'subtitulo2',
        'tBoton',
        'imagen1',
        'imagen2',
        'imagen3',
        'parrafo',
        'fTitulo',

        'logo',
        'cFondo1',
        'cFondo2',
        'cTitulo',
        'cSubtitulo1',
        'cSubtitulo2',
        'cBoton',
        'cParrafo',
        'cTitulo2',


    ];
}
