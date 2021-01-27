<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCryptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_cryptos', function (Blueprint $table) {
            $table->id();
            $table->double('amount', 8, 2);
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('m_crypto_types');
            $table->integer('ref_user_id_crypto')->unsigned();
            $table->foreign('ref_user_id_crypto')->references('id')->on('m_user_systems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_cryptos');
    }
}
