<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tipo;
use Illuminate\Support\Facades\Validator;

class ProcesoController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('admin');

        }

    public function getProceso(Request $request)
    {
        // dd(Carbon::createFromFormat('Y-m-d', '1975-05-21')->toDateTimeString());
        $Tipo = Tipo::all();

        return view('Proceso/lista', [

            'Tipo' => $Tipo,

        ]);
    }
    public function create()
    {
        $Tipo = Tipo::all();

        return view('Proceso/create', [
            'Tipo'                 => $Tipo,

        ]);
    }

    public function createProceso(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'proceso'      => 'required',
        ]);

        if($validate->fails()){
            $request->session()->flash('alert-danger', 'Error en el almacenando los datos');

            return redirect()->back();
        }

        $Tipo = new Tipo();

        $Tipo->nombre_id        = $request->input('proceso');
        $Tipo->save();


        $request->session()->flash('alert-success', 'Subproceso registrado con exito!');

        return redirect()->route('Proceso.lista');
    }
    public function update($id)
    {
        $Tipo = Tipo::where('id', $id)->first();


        return view('Proceso/editar', [
            'Tipo'           => $Tipo,
        ]);
    }
    public function updateProceso(Request $request, $documento_id)
    {
        $Tipo = Tipo::where('id', $documento_id)->first();
        $validate = Validator::make($request->all(), [
            'proceso'      => 'required',
        ]);

        if ($validate->fails()) {
            $request->session()->flash('alert-danger', 'Error al actualizar Subproceso');

            return redirect()->back();
        }

        $Tipo->nombre_id        = $request->input('proceso');
        $Tipo->save();

        $request->session()->flash('alert-success', 'Proceso actualizado con exito!');

        return redirect()->route('Proceso.lista');
    }
}
