<?php

namespace App\Http\Controllers;


use App\Models\Documentos;
use App\Models\ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TargetController extends Controller
{
    public function gettarget(Request $request)
    {
        $documentos = Documentos::all();
        $ubicacion = ubicacion::all();



        return view('targets/target',[
            'documentos'  => $documentos,
            'ubicacion' => $ubicacion,

        ]);
    }
}
