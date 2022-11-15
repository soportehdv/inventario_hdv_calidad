<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\BlogController;

class BlogController extends Controller
{
    public function edit(){

        $blog = Blog::find(1);
        return view('blog.editar',compact('blog'));
    }

    public function update(Request $request){
        // dd($request->cFondo2);
        $blog = Blog::find($request->id);
        $blog->titulo        = $request->input('titulo');
        $blog->subtitulo1    = $request->input('subtitulo1');
        $blog->subtitulo2    = $request->input('subtitulo2');
        $blog->tBoton        = $request->input('tBoton');
        $blog->parrafo       = $request->input('parrafo');
        $blog->fTitulo       = $request->input('fTitulo');

        if($request->imagen1 != null){
            $nombre = $request->imagen1->getClientOriginalName();
            $ruta = str_replace(" ","_",date('Y-m-d').'_'.$nombre);
            $request->imagen1->move( public_path('files/biblioteca'), $ruta);
            $blog->imagen1   = $ruta;
        }
        if($request->imagen2 != null){
            $nombre = $request->imagen2->getClientOriginalName();
            $ruta = str_replace(" ","_",date('Y-m-d').'_'.$nombre);
            $request->imagen2->move( public_path('files/biblioteca'), $ruta);
            $blog->imagen2   = $ruta;
        }
        if($request->imagen3 != null){
            $nombre = $request->imagen3->getClientOriginalName();
            $ruta = str_replace(" ","_",date('Y-m-d').'_'.$nombre);
            $request->imagen3->move( public_path('files/biblioteca'), $ruta);
            $blog->imagen3   = $ruta;
        }
        if($request->logo != null){
            $nombre = $request->logo->getClientOriginalName();
            $ruta = str_replace(" ","_",date('Y-m-d').'_'.$nombre);
            $request->logo->move( public_path('files/biblioteca'), $ruta);
            $blog->logo   = $ruta;
        }

        $blog->cFondo1       = $request->input('cFondo1');
        $blog->cFondo2       = $request->input('cFondo2');
        $blog->cTitulo       = $request->input('cTitulo');
        $blog->cSubtitulo1   = $request->input('cSubtitulo1');
        $blog->cSubtitulo2   = $request->input('cSubtitulo2');
        $blog->cBoton        = $request->input('cBoton');
        $blog->cParrafo      = $request->input('cParrafo');
        $blog->cTitulo2      = $request->input('cTitulo2');



        $blog->save();

        $request->session()->flash('alert-success', '¡Datos de pagina actualizados correctamente!');
        return redirect()->route('blog.editar');
    }

    public function delete1(Request $request){
        $blog = Blog::find($request->id);
        unlink(public_path().'/'.'files/biblioteca'.'/'.$blog->imagen1);
        $blog->imagen1 = "";

        $blog->save();

        return back()->with('status','¡Archivo eliminado exitosamente!');
    }
    public function delete2(Request $request){
        $blog = Blog::find($request->id);
        unlink(public_path().'/'.'files/biblioteca'.'/'.$blog->imagen2);
        $blog->imagen2 = "";

        $blog->save();

        return back()->with('status','¡Archivo eliminado exitosamente!');
    }
    public function delete3(Request $request){
        $blog = Blog::find($request->id);
        unlink(public_path().'/'.'files/biblioteca'.'/'.$blog->imagen3);
        $blog->imagen3 = "";

        $blog->save();

        return back()->with('status','¡Archivo eliminado exitosamente!');
    }
    public function deletelogo(Request $request){
        $blog = Blog::find($request->id);
        unlink(public_path().'/'.'files/biblioteca'.'/'.$blog->logo);
        $blog->logo = "";

        $blog->save();

        return back()->with('status','¡Archivo eliminado exitosamente!');
    }
}
