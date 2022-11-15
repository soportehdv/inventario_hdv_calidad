<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiglasDocumentos;
use Illuminate\Support\Facades\Validator;



class TipoDocumentosController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('admin');

        }

    public function getTipoDocumentos(Request $request)
    {
        // dd(Carbon::createFromFormat('Y-m-d', '1975-05-21')->toDateTimeString());
        $SiglasDocumentos = SiglasDocumentos::all();

        return view('TipoDoc/lista', [

            'SiglasDocumentos' => $SiglasDocumentos,

        ]);
    }
    public function create()
    {
        $SiglasDocumentos = SiglasDocumentos::all();

        return view('TipoDoc/create', [
            'SiglasDocumentos'        => $SiglasDocumentos,

        ]);
    }

    public function createTipoDocumentos(Request $request)
    {
        $validate = Validator::make($request->all(), [
        ]);

        if($validate->fails()){
            $request->session()->flash('alert-danger', 'Error en el almacenando los datos');

            return redirect()->back();
        }

        $SiglasDocumentos = new SiglasDocumentos();

        $SiglasDocumentos->documento        = $request->input('documento');
        $SiglasDocumentos->sigla            = $request->input('sigla');
        $SiglasDocumentos->save();


        $request->session()->flash('alert-success', 'Tipo de Documento registrado con exito!');

        return redirect()->route('TipoDocumentos.lista');
    }
    public function update($id)
    {
        $siglasDocumentos = SiglasDocumentos::where('id', $id)->first();

        return view('TipoDoc/editar', [
            'siglasDocumentos'  => $siglasDocumentos,
        ]);
    }
    public function updateTipoDocumentos(Request $request, $documento_id)
    {
        $siglasDocumentos = SiglasDocumentos::where('id', $documento_id)->first();
        $validate = Validator::make($request->all(), [
            'documento'      => 'required',
            'sigla'      => 'required',
        ]);

        if ($validate->fails()) {
            $request->session()->flash('alert-danger', 'Error al actualizar documento');

            return redirect()->back();
        }

        if($siglasDocumentos = SiglasDocumentos::where('id', $documento_id)->first()){

            $siglasDocumentos->documento        = $request->input('documento');
            $siglasDocumentos->sigla            = $request->input('sigla');
            $siglasDocumentos->save();
        }


        $request->session()->flash('alert-success', 'Tipo de Documento actualizado con exito!');

        return redirect()->route('TipoDocumentos.lista');
    }

}
