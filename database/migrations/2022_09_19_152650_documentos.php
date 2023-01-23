<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Documentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipoProceso');
            $table->integer('proceso');
            $table->integer('tipoDocumento');
            $table->string('codigo');
            $table->string('nombre');
            $table->integer('versionActual');
            $table->date('fechaAprobacion');
            $table->integer('estado');
            $table->integer('archivador')->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();

            // files pdf
            $table->string('extension');
            $table->string('name');
            $table->string('ruta');
            $table->string('mime');
            $table->string('size');

            // files editor
            $table->string('extension_edit');
            $table->string('name_edit');
            $table->string('ruta_edit');
            $table->string('size_edit');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
