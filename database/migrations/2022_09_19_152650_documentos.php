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
            $table->text('observacion');
            $table->timestamps();

            // files
            $table->string('extension');
            $table->string('name');
            $table->string('ruta');
            $table->string('mime');
            $table->string('size');

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
