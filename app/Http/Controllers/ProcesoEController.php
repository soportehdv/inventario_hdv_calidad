<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Models\Subcategorias;
use Illuminate\Support\Facades\Validator;


class ProcesoEController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('admin');

        }

    public function getProcesoE(Request $request)
    {
        // dd(Carbon::createFromFormat('Y-m-d', '1975-05-21')->toDateTimeString());
        $Subcategorias = Subcategorias::join('tipos', 'tipos.id', '=', 'subcategorias.proceso_f')
        ->select('subcategorias.*', 'tipos.nombre_id as name')
        ->get();

        return view('ProcesoE/lista', [

            'Subcategorias' => $Subcategorias,

        ]);
    }
    public function create()
    {
        $Subcategorias = Subcategorias::all();
        $Tipo = Tipo::all();

        return view('ProcesoE/create', [
            'Subcategorias'        => $Subcategorias,
            'Tipo'                 => $Tipo,

        ]);
    }

    public function createProcesoE(Request $request)
    {
        $validate = Validator::make($request->all(), [
        ]);

        if($validate->fails()){
            $request->session()->flash('alert-danger', 'Error en el almacenando los datos');

            return redirect()->back();
        }

        $Subcategorias = new Subcategorias();

        $Subcategorias->documento        = $request->input('documento');
        $Subcategorias->sigla            = $request->input('sigla');
        $Subcategorias->proceso_f        = $request->input('proceso');
        $Subcategorias->save();


        $request->session()->flash('alert-success', 'Subproceso registrado con exito!');

        return redirect()->route('ProcesoE.lista');
    }
    public function update($id)
    {
        $Subcategorias = Subcategorias::where('id', $id)->first();
        $Tipo = Tipo::all();


        return view('ProcesoE/editar', [
            'Subcategorias'  => $Subcategorias,
            'Tipo'           => $Tipo,
        ]);
    }
    public function updateProcesoE(Request $request, $documento_id)
    {
        $Subcategorias = Subcategorias::where('id', $documento_id)->first();
        $validate = Validator::make($request->all(), [
            'documento'      => 'required',
        ]);

        if ($validate->fails()) {
            $request->session()->flash('alert-danger', 'Error al actualizar Subproceso');

            return redirect()->back();
        }

        $Subcategorias->documento        = $request->input('documento');
        $Subcategorias->sigla            = $request->input('sigla');
        $Subcategorias->proceso_f        = $request->input('proceso');
        $Subcategorias->save();

        $request->session()->flash('alert-success', 'Proceso actualizado con exito!');

        return redirect()->route('ProcesoE.lista');
    }



}
