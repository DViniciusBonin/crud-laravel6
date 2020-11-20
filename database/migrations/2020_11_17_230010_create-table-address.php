<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
          
            $table->string('logradouro', 80);
            $table->string('bairro', 50);
            $table->integer('numero');
            $table->integer('cep');
            
            
            $table->timestamps();
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('idClient');
        
            $table->foreign('idClient')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
