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
        $blog = Blog::find($request->id);
        $blog->titulo        = $request->input('titulo');
        $blog->subtitulo1    = $request->input('subtitulo1');
        $blog->subtitulo2    = $request->input('subtitulo2');
        $blog->tBoton        = $request->input('tBoton');



        $blog->save();

        $request->session()->flash('alert-success', '¡Datos de pagina actualizados correctamente!');
        return redirect()->route('blog.editar');
    }
}
