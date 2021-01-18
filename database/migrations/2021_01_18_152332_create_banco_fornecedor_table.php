<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancoFornecedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banco_fornecedor', function (Blueprint $table) {
            $table->integer('banco_id')->unsigned()->index();
            $table->foreign('banco_id')->references('id')->on('banco');

            $table->integer('fornecedor_id')->unsigned()->index();
            $table->foreign('fornecedor_id')->references('id')->on('fornecedor');

            $table->unique(['banco_id', 'fornecedor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banco_fornecedor');
    }
}
