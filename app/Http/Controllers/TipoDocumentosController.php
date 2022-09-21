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


        $request->session()->flash('alert-success', 'Producto registrado con exito!');

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
        ]);

        if ($validate->fails()) {
            $request->session()->flash('alert-danger', 'Error al actualizar documento');

            return redirect()->back();
        }

        $SiglasDocumentos->documento        = $request->input('documento');
        $SiglasDocumentos->sigla            = $request->input('sigla');
        $SiglasDocumentos->save();

        $request->session()->flash('alert-success', 'Ingreso actualizado con exito!');

        return redirect()->route('TipoDocumentos.lista');
    }

    public function subcategorias(Request $request){
        if(isset($request->texto)){
            $subcategorias = Subcategorias::whereProceso_f($request->texto)->get();
            return response()->json(
                [
                    'lista' => $subcategorias,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }

    // public function subcategorias2(Request $request){
    //     if(isset($request->texto)){
    //         $subcategorias = Subcategorias::whereProceso_f($request->texto)->get();
    //         return response()->json(
    //             [
    //                 'lista' => $subcategorias,
    //                 'success' => true
    //             ]
    //             );
    //     }else{
    //         return response()->json(
    //             [
    //                 'success' => false
    //             ]
    //             );

    //     }

    // }

    public function busqueda(Request $request){
        if(isset($request->texto)){
            $subcategorias = Subcategorias::whereId($request->texto)->get();
            return response()->json(
                [
                    'lista' => $subcategorias,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }

    public function documentos(Request $request){
        if(isset($request->texto)){
            $siglasDocumentos = SiglasDocumentos::whereId($request->texto)->get();
            return response()->json(
                [
                    'lista' => $siglasDocumentos,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );
        }
    }

    public function importar(Request $request){

        $validate = Validator::make($request->all(), [
            'doc'      => 'required',

        ]);

        if($validate->fails()){
            $request->session()->flash('alert-danger', 'Error para importar archivos, asegúrese de haber seleccionado un archivo valido');

            return redirect()->back();
        }

        $file = $request->file('doc');
        Excel::import(new DocumentosImport, $file);

        // return redirect('/')->with('Importación completada!');

        $request->session()->flash('alert-success', 'Importación de archivos con éxito');

        return redirect()->back();

    }

    public function delete($id){
        $documentos = Documentos::find($id);
        unlink(public_path().'/'.'files/biblioteca'.'/'.$documentos->ruta);
        // $documentos->delete();
        $documentos->name = "";
        $documentos->extension = "";
        $documentos->ruta = "";
        $documentos->mime = "";
        $documentos->size = "";

        $documentos->save();

        return back()->with('status','¡Archivo eliminado exitosamente!');
    }
}
