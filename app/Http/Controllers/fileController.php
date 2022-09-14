<?php

namespace App\Http\Controllers;

use App\Models\Files;

use Illuminate\Http\Request;

class fileController extends Controller
{

    public function getFiles(Request $request)
    {
        $files = Files::all();
// dd($files);

        return view('archivos/lista', [
            'files' => $files
        ]);


    }

    public function create()
    {
        return view('archivos/create');
    }

    public function update($id)
    {
        $files = Files::where('id', $id)->first();

        return view('archivos/edit', [
            'files' => $files
        ]);
    }

    public function updateFiles(Request $request, $user_id)
    {

        // $files = Files::where('id', $user_id)->first();

         //validamos los datos
         $validate = request()->validate( [
            'name'      => 'required',
        ]);


        $user->name = $request->input('name');
        $user->cargo = $request->input('cargo');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->rol = $request->input('rol');
        $user->save();

        $request->session()->flash('alert-success', 'Usuario actualizado con exito!');


        return redirect()->route('user.lista');
    }

    public function cargue(){
        return view('Archivos.cargue');
    }

    public function dropzone(Request $request){
// dd($request->file);
        if($request->file != null){

            $archivo = new Files();
            $archivo->nombre = $request->file->getClientOriginalName();
            $archivo->ruta = str_replace(" ","_",date('Y-m-d').'_'.$archivo->nombre);
            $tipo = explode('/', $request->file->getClientMimeType() );
            $archivo->mime = $tipo[0];
            $archivo->size = number_format($request->file->getSize()/1024,2,',','.');
            /*primero muevo el archivo antes de generar un registro en la bd por si se presenta fallos de permisos en la subida, no me genere
            registros basura en la bd*/
            $request->file->move( public_path('files/biblioteca'), $archivo->ruta);
            $archivo->save();
        }else{
            dd('no hay archivos');
        }

        return redirect()->route('files.lista');
    }

    public function delete($id){
        $archivo = Files::find($id);
        unlink(public_path().'/'.'files/biblioteca'.'/'.$archivo->ruta);
        $archivo->delete();
        return back()->with('status','¡Archivo eliminado exitosamente!');
    }
}
