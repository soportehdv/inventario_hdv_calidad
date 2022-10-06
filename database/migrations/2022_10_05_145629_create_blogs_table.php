<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('titulo');
            $table->text('subtitulo1');
            $table->text('subtitulo2');
            $table->string('tBoton');
            $table->string('imagen1');
            $table->string('imagen2');
            $table->string('imagen3');
            $table->text('parrafo');
            $table->string('fTitulo');

            $table->string('logo');

            $table->text('cFondo1');
            $table->text('cFondo2');
            $table->text('cTitulo');
            $table->text('cSubtitulo1');
            $table->text('cSubtitulo2');
            $table->text('cBoton');
            $table->text('cParrafo');
            $table->string('fTitulo2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
