<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('ruta',50)->nullable();
            $table->string('icono',50)->nullable();            
            $table->smallInteger('estado_id');            
            $table->integer('item_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('item_id')->
                    references('id')->on('item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
