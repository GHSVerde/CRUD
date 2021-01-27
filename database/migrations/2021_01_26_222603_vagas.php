<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vagas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) 
        {
            $table->id();
            $table->string('empresa');
            $table->string('vaga');
            $table->string('situacao');
            $table->string('email');
            $table->string('url_referencia')->nullable();
            $table->string('feedback')->nullable();
            $table->string('indicacao')->nullable();
            $table->string('telefone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vagas');
    }
}
