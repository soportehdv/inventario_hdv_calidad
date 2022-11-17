<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Documentos;
use App\Models\Blog;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    $blog = Blog::find(1);
    $documentos = Documentos::join('tipos', 'tipos.id', '=', 'documentos.tipoProceso')
    ->join('subcategorias', 'subcategorias.id', '=', 'documentos.proceso')
    ->join('siglas_documentos', 'siglas_documentos.id', '=', 'documentos.tipoDocumento')
    ->join('estados', 'estados.id', '=', 'documentos.estado')
    ->select('documentos.*', 'tipos.nombre_id as nombre_id', 'subcategorias.documento as documento', 'siglas_documentos.documento as siglas', 'estados.estado as status')
    ->get();

    return view('welcome', [
        'documentos'        => $documentos,
        'blog'        => $blog,
    ]);
})->name('inicio');


Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Rutas info empresa
Route::get('blog/editar',[App\Http\Controllers\BlogController::class, 'edit'])->name('blog.editar');
Route::post('blog/update',[App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');
Route::get('blog/eliminar1/{id}', [App\Http\Controllers\BlogController::class, 'delete1'])->name('blog.eliminar1');
Route::get('blog/eliminar2/{id}', [App\Http\Controllers\BlogController::class, 'delete2'])->name('blog.eliminar2');
Route::get('blog/eliminar3/{id}', [App\Http\Controllers\BlogController::class, 'delete3'])->name('blog.eliminar3');
Route::get('blog/eliminarlogo/{id}', [App\Http\Controllers\BlogController::class, 'deletelogo'])->name('blog.eliminarlogo');



//USERS
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create.vista');
Route::post('user/create', [App\Http\Controllers\UserController::class, 'createUser'])->name('user.create');
Route::get('user/update/{user_id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update.vista');
Route::post('user/update/{user_id}', [App\Http\Controllers\UserController::class, 'updateUser'])->name('user.update');
Route::get('user/list', [App\Http\Controllers\UserController::class, 'getUser'])->name('user.lista');

//Documentos
Route::get('documentos/create', [App\Http\Controllers\DocumentosController::class, 'create'])->name('documentos.create.vista');
Route::post('documentos/create', [App\Http\Controllers\DocumentosController::class, 'createDocumentos'])->name('documentos.create');
Route::get('documentos/update/{compra_id}', [App\Http\Controllers\DocumentosController::class, 'update'])->name('documentos.update.vista');
Route::post('documentos/update/{compra_id}', [App\Http\Controllers\DocumentosController::class, 'updateDocumentos'])->name('documentos.update');
Route::get('documentos/lista', [App\Http\Controllers\DocumentosController::class, 'getDocumentos'])->name('documentos.lista');
Route::post('documentos/importar', [App\Http\Controllers\DocumentosController::class, 'importar'])->name('documentos.importar');
Route::post('documentos/exportar', [App\Http\Controllers\DocumentosController::class, 'exportar'])->name('documentos.exportar');
Route::get('documentos/eliminar/{id}', [App\Http\Controllers\DocumentosController::class, 'delete'])->name('documentos.eliminar');
Route::get('documentos/eliminar2/{id}', [App\Http\Controllers\DocumentosController::class, 'delete2'])->name('documentos.eliminar2');
Route::get('documentos/download/{id}', [App\Http\Controllers\DocumentosController::class, 'download'])->name('documentos.download');

// subcategorias
Route::post('documentos/subcategorias', [App\Http\Controllers\DocumentosController::class, 'subcategorias']);
Route::post('documentos/busqueda', [App\Http\Controllers\DocumentosController::class, 'busqueda']);
Route::post('documentos/documentos', [App\Http\Controllers\DocumentosController::class, 'documentos']);

//Tipo de documentos
Route::get('TipoDoc/create', [App\Http\Controllers\TipoDocumentosController::class, 'create'])->name('tipoDocumentos.create.vista');
Route::post('TipoDoc/create', [App\Http\Controllers\TipoDocumentosController::class, 'createTipoDocumentos'])->name('TipoDocumentos.create');
Route::get('TipoDoc/update/{compra_id}', [App\Http\Controllers\TipoDocumentosController::class, 'update'])->name('TipoDocumentos.update.vista');
Route::post('TipoDoc/update/{compra_id}', [App\Http\Controllers\TipoDocumentosController::class, 'updateTipoDocumentos'])->name('TipoDocumentos.update');
Route::get('TipoDoc/lista', [App\Http\Controllers\TipoDocumentosController::class, 'getTipoDocumentos'])->name('TipoDocumentos.lista');

//SubProceso
Route::get('ProcesoE/create', [App\Http\Controllers\ProcesoEController::class, 'create'])->name('tipoProcesoE.create.vista');
Route::post('ProcesoE/create', [App\Http\Controllers\ProcesoEController::class, 'createProcesoE'])->name('ProcesoE.create');
Route::get('ProcesoE/update/{compra_id}', [App\Http\Controllers\ProcesoEController::class, 'update'])->name('ProcesoE.update.vista');
Route::post('ProcesoE/update/{compra_id}', [App\Http\Controllers\ProcesoEController::class, 'updateProcesoE'])->name('ProcesoE.update');
Route::get('ProcesoE/lista', [App\Http\Controllers\ProcesoEController::class, 'getProcesoE'])->name('ProcesoE.lista');

//Procesos
Route::get('Proceso/create', [App\Http\Controllers\ProcesoController::class, 'create'])->name('tipoProceso.create.vista');
Route::post('Proceso/create', [App\Http\Controllers\ProcesoController::class, 'createProceso'])->name('Proceso.create');
Route::get('Proceso/update/{compra_id}', [App\Http\Controllers\ProcesoController::class, 'update'])->name('Proceso.update.vista');
Route::post('Proceso/update/{compra_id}', [App\Http\Controllers\ProcesoController::class, 'updateProceso'])->name('Proceso.update');
Route::get('Proceso/lista', [App\Http\Controllers\ProcesoController::class, 'getProceso'])->name('Proceso.lista');

// ubicaciones
Route::get('ubicacion/create', [App\Http\Controllers\ubicacionController::class, 'create'])->name('listaubicacion.create.vista');
Route::post('ubicacion/create', [App\Http\Controllers\ubicacionController::class, 'createlistaubicacion'])->name('listaubicacion.create');
Route::get('ubicacion/lista', [App\Http\Controllers\ubicacionController::class, 'getlistaubicacion'])->name('listaubicacion.lista');
Route::get('ubicacion/update/{ubicacion_id}', [App\Http\Controllers\ubicacionController::class, 'update'])->name('listaubicacion.update.vista');
Route::post('ubicacion/update/{ubicacion_id}', [App\Http\Controllers\ubicacionController::class, 'updatelistaubicacion'])->name('listaubicacion.update');

//Rutas cargue multiple (Dropzone)
Route::get('archivos/cargue', [App\Http\Controllers\fileController::class, 'cargue']); //->name('proveedor.create.vista')

Route::get('archivos/create', [App\Http\Controllers\fileController::class, 'create'])->name('files.create.vista');
Route::post('archivos/dropzone', [App\Http\Controllers\fileController::class, 'dropzone'])->name('Files.create');

Route::get('archivador/create', [App\Http\Controllers\fileController::class, 'create'])->name('Archivador.create.vista');
Route::post('archivador/create', [App\Http\Controllers\fileController::class, 'createArchivador'])->name('Archivador.create');
Route::get('archivador/lista', [App\Http\Controllers\fileController::class, 'getFiles'])->name('Archivador.lista');
Route::get('archivador/update/{user_id}', [App\Http\Controllers\fileController::class, 'update'])->name('Archivador.update.vista');
Route::post('archivador/update/{user_id}', [App\Http\Controllers\fileController::class, 'updateArchivador'])->name('Archivador.update');

Route::get('targets/target', [App\Http\Controllers\TargetController::class, 'gettarget'])->name('listatarget.target');


Route::get('ventas/admin/invoice/{categoria}',[App\Http\Controllers\InvoiceController::class, 'sacaSub']);

Route::get('blog/list', [App\Http\Controllers\PaginaController::class, 'gettarget'])->name('listaBlog.target');



