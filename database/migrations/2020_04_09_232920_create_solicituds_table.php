<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->Integer('serviceskit_id')->nullable();
            $table->integer('cedula')->nullable();
            $table->string('nombre', 200);
            $table->string('estado', 50)->default('Abierto');
            $table->string('prioridad', 50)->default('Normal');
            $table->string('departamento');
            $table->string('localidad_id');
            $table->string('supervisor_username');
            $table->string('user_username');


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
        Schema::dropIfExists('solicituds');
    }
}
