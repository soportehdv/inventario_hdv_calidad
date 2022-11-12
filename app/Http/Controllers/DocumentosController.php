<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tipo;
use App\Models\Estados;
use App\Models\Documentos;
use App\Models\Responsables;
use Illuminate\Http\Request;
use App\Models\Subcategorias;
use App\Models\Files;
use App\Models\SiglasDocumentos;
// use Excel;
use App\Imports\DocumentosImport;
use App\Exports\DocumentosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;



class DocumentosController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('admin');

        }

    public function getDocumentos(Request $request)
    {
        // dd(Carbon::createFromFormat('Y-m-d', '1975-05-21')->toDateTimeString());
        $documentos = Documentos::join('tipos', 'tipos.id', '=', 'documentos.tipoProceso')
        ->join('subcategorias', 'subcategorias.id', '=', 'documentos.proceso')
        ->join('siglas_documentos', 'siglas_documentos.id', '=', 'documentos.tipoDocumento')
        ->join('estados', 'estados.id', '=', 'documentos.estado')
        ->select('documentos.*', 'tipos.nombre_id as nombre_id', 'subcategorias.documento as documento', 'siglas_documentos.documento as siglas', 'estados.estado as status')
        ->get();
        return view('documento/lista', [

                    'documentos' => $documentos,

                ]);
    }
    public function create()
    {
        $estado = Estados::all();
        $tipo = Tipo::all();
        $responsables = Responsables::all();
        $siglasDocumentos = SiglasDocumentos::all();
        $subcategorias = Subcategorias::all();
        $documentos = Documentos::all();
        $Files = Files::all();

        return view('Documento/create', [
            'estado'            => $estado,
            'tipo'              => $tipo,
            'responsables'      => $responsables,
            'siglasDocumentos'  => $siglasDocumentos,
            'subcategorias'     => $subcategorias,
            'documentos'        => $documentos,
            'Files'             => $Files,
        ]);
    }

    public function createDocumentos(Request $request)
    {
        // dd($request->all());

        //validamos los datos
        $validate = Validator::make($request->all(), [
            'proceso'      => 'required',

        ]);

        if($validate->fails()){
            $request->session()->flash('alert-danger', 'Error en el almacenando los datos');

            return redirect()->back();
        }
        $cT = $request->input('cT');
        $cD = $request->input('cD');
        $cN = $request->input('cN');

// dd($request->file->getClientOriginalName());

        $Documentos = new Documentos();

        $Documentos->tipoProceso        = $request->input('proceso');
        $Documentos->proceso            = $request->input('subproceso');
        $Documentos->tipoDocumento      = $request->input('tipoDoc');
        $Documentos->codigo             = $cT . '-' . $cD . '-' . $cN;
        $Documentos->nombre             = $request->input('nombre');
        $Documentos->versionActual      = $request->input('version');
        $Documentos->fechaAprobacion    = $request->input('fecha');
        $Documentos->estado             = $request->input('estado');
        $Documentos->archivador         = $request->input('archivador');
        $Documentos->observacion        = $request->input('observacion');

        if($request->file != null){

            // $archivo = new Files();
            $Documentos->name       = $request->file->getClientOriginalName();
            $Documentos->extension  = $request->file->getClientOriginalExtension();
            $Documentos->ruta       = str_replace(" ","_",date('Y-m-d').'_'.$Documentos->name);
            $tipo                   = explode('/', $request->file->getClientMimeType() );
            $Documentos->mime       = $tipo[0];
            $Documentos->size       = number_format($request->file->getSize()/1024,2,',','.');
            /*primero muevo el archivo antes de generar un registro en la bd por si se presenta fallos de permisos en la subida, no me genere
            registros basura en la bd*/
            $request->file->move( public_path('files/biblioteca'), $Documentos->ruta);
        }

        if($request->file_edit != null){

            // $archivo = new Files();
            $Documentos->name_edit     = $request->file_edit->getClientOriginalName();
            $Documentos->extension_edit  = $request->file_edit->getClientOriginalExtension();
            $Documentos->ruta_edit       = str_replace(" ","_",date('Y-m-d').'_'.$Documentos->name_edit);
            $tipo_edit                   = explode('/', $request->file_edit->getClientMimeType() );
            $Documentos->size_edit       = number_format($request->file_edit->getSize()/1024,2,',','.');
            /*primero muevo el archivo antes de generar un registro en la bd por si se presenta fallos de permisos en la subida, no me genere
            registros basura en la bd*/
            $request->file_edit->move( public_path('files/biblioteca'), $Documentos->ruta_edit);
        }


        $Documentos->save();


        $request->session()->flash('alert-success', 'Documento registrado con exito!');

        return redirect()->route('documentos.lista');
    }
    public function update($id)
    {
        $estado = Estados::all();
        $tipo = Tipo::all();
        $responsables = Responsables::all();
        $siglasDocumentos = SiglasDocumentos::all();
        $subcategorias = Subcategorias::all();
        $Files = Files::all();
        $documentos = Documentos::where('id', $id)->first();

        return view('Documento/editar', [
            'estado'            => $estado,
            'tipo'              => $tipo,
            'responsables'      => $responsables,
            'siglasDocumentos'  => $siglasDocumentos,
            'subcategorias'     => $subcategorias,
            'documentos'        => $documentos,
            'Files'             => $Files,
        ]);
    }
    public function updateDocumentos(Request $request, $documento_id)
    {
        $documentos = Documentos::where('id', $documento_id)->first();
        $validate = Validator::make($request->all(), [
            // 'proceso'      => 'required',
        ]);

        if ($validate->fails()) {
            $request->session()->flash('alert-danger', 'Error al actualizar documento');

            return redirect()->back();
        }

        $cT = $request->input('cT');
        $cD = $request->input('cD');
        $cN = $request->input('cN');


        // $Documentos = new Documentos();

        $documentos->tipoProceso        = $request->input('proceso');
        $documentos->proceso            = $request->input('subproceso');
        $documentos->tipoDocumento      = $request->input('tipoDoc');
        $documentos->codigo             = $cT . '-' . $cD . '-' . $cN;
        $documentos->nombre             = $request->input('nombre');
        $documentos->versionActual      = $request->input('version');
        $documentos->fechaAprobacion    = $request->input('fecha');
        $documentos->estado             = $request->input('estado');
        $Documentos->archivador         = $request->input('archivador');
        $documentos->observacion        = $request->input('observacion');

        if($request->file != null){

            // $archivo = new Files();
            $documentos->name       = $request->file->getClientOriginalName();
            $documentos->extension  = $request->file->getClientOriginalExtension();
            $documentos->ruta       = str_replace(" ","_",date('Y-m-d').'_'.$documentos->name);
            $tipo                   = explode('/', $request->file->getClientMimeType() );
            $documentos->mime       = $tipo[0];
            $documentos->size       = number_format($request->file->getSize()/1024,2,',','.');
            /*primero muevo el archivo antes de generar un registro en la bd por si se presenta fallos de permisos en la subida, no me genere
            registros basura en la bd*/
            $request->file->move( public_path('files/biblioteca'), $documentos->ruta);
        }

        $documentos->save();

        $request->session()->flash('alert-success', 'Documento actualizado con exito!');

        return redirect()->route('documentos.lista');
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

    public function exportar(Request $request){
        // dd($request->all());
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        ob_end_clean();
        ob_start();

        return Excel::download( new DocumentosExport($fecha_ini, $fecha_fin), 'listado.xls');
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

    public function download($id){
        $documentos = Documentos::find($id);
        $pathtoFile = public_path().'/'.'files/biblioteca'.'/'.$documentos->ruta;
        return response()->download($pathtoFile);
    }


}
