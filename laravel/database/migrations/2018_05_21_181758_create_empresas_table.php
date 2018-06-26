<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->string('id', 14);
            $table->string('descricao', 90);
            $table->integer('ddd');
            $table->integer('fone');
            $table->string('cep', 15);
            $table->string('uf_estado', 2);
            $table->string('endereco', 200);
            $table->string('bairro', 200);
            $table->integer('numero');
            $table->string('complemento', 250);
            $table->integer('id_usuario');
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
        Schema::dropIfExists('empresas');
    }
}
