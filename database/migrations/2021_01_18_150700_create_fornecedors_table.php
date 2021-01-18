<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('pis');
            $table->string('objetoSocial');
            $table->date('dataRegistro');
            $table->integer('numeroRegistro');

            $table->integer('banco_id');
            $table->foreign('banco_id')->on('banco')->references('id');

            $table->integer('pessoa_id');
            $table->foreign('pessoa_id')->on('pessoa')->references('id');
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
        Schema::dropIfExists('fornecedor');
    }
}
