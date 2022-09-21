<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    use HasFactory;

    protected $table = "subcategorias";

    protected $fillable = [
        'documento',
        'sigla',
        'proceso_f'
    ];

    public function tipo(){
        return $this->hasMany("App\Tipo");
    }
}
