<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_empresa', 14);
            $table->string('cep', 15);
            $table->date('dt_agendamento');
            $table->integer('id_servico');
            $table->decimal('preco' , 5, 2);
            $table->time('hr_inicial');
            $table->time('hr_final');
            $table->string('id_cliente', 11);
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
        Schema::dropIfExists('agendamentos');
    }
}
