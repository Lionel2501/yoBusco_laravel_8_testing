<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->reference('id')->on('users');
            $table->foreignId('provincia_id')->reference('id')->on('provincias')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('imagen')->nullable();
            $table->string('telefono')->nullable();
            $table->timestamps();
        });

        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('imagen');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('provincia_id')->constrained()->onDelete('cascade');
            $table->string('ciudad');
            $table->string('precio');
            $table->text('descripcion');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('anuncios');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('perfils');
        Schema::dropIfExists('provincias');
    }
}
