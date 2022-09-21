<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiglasDocumentos extends Model
{
    use HasFactory;

    protected $table = "siglas_documentos";

    protected $fillable = [
        'documento',
        'sigla',
    ];
}
