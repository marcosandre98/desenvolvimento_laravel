<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_item', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('rol_id')->unsigned();
            $table->integer('item_id')->unsigned();            
            $table->timestamps();
            $table->foreign('item_id')->
                    references('id')->on('item');
            $table->foreign('rol_id')->
                    references('id')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_item');
    }
}
