<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mercadoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercadoria', function (Blueprint $table){
            $table->increments('cd_mercadoria');
            $table->string('tp_mercadoria');
            $table->string('nm_mercadoria');
            $table->integer('quantidade');
            $table->decimal('preco');
            $table->integer('cd_negocio');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merccadoria');
    }
}
