<?php

namespace App\Http\Controllers;

use App\Models\Files;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class fileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }

public function getFiles(Request $request)
{
    // dd(Carbon::createFromFormat('Y-m-d', '1975-05-21')->toDateTimeString());
    $Files = Files::all();

    return view('archivador/lista', [

        'Files' => $Files,

    ]);
}
public function create()
{
    $Files = Files::all();

    return view('archivador/create', [
        'Files'        => $Files,

    ]);
}

public function createArchivador(Request $request)
{
    $validate = Validator::make($request->all(), [
        'nombre'            => 'required',
        'ubicacion'         => 'required',
        'caracteristicas'   => 'required',
    ]);

    if($validate->fails()){
        $request->session()->flash('alert-danger', 'Error en el almacenando los datos');

        return redirect()->back();
    }

    $Files = new Files();

    $Files->nombre              = $request->input('nombre');
    $Files->ubicacion           = $request->input('ubicacion');
    $Files->caracteristicas     = $request->input('caracteristicas');
    $Files->save();


    $request->session()->flash('alert-success', 'Tipo de Documento registrado con exito!');

    return redirect()->route('Archivador.lista');
}
public function update($id)
{
    $Files = Files::where('id', $id)->first();

    return view('Archivador/editar', [
        'Files'  => $Files,
    ]);
}
public function updateArchivador(Request $request, $documento_id)
{
    $Files = Files::where('id', $documento_id)->first();
    $validate = Validator::make($request->all(), [
        'nombre'            => 'required',
        'ubicacion'         => 'required',
        'caracteristicas'   => 'required',
    ]);

    if ($validate->fails()) {
        $request->session()->flash('alert-danger', 'Error al actualizar archivador');

        return redirect()->back();
    }

        $Files->nombre               = $request->input('nombre');
        $Files->ubicacion            = $request->input('ubicacion');
        $Files->caracteristicas      = $request->input('caracteristicas');
        $Files->save();


    $request->session()->flash('alert-success', 'Archivador actualizado con exito!');

    return redirect()->route('Archivador.lista');
}

}
