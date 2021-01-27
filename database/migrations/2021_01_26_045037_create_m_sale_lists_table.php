<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSaleListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_sale_lists', function (Blueprint $table) {
            $table->id();
            $table->double('price', 8, 2);
            $table->double('amount', 8, 2);
            $table->integer('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('m_user_systems');
            $table->integer('crypto_type_id')->unsigned();
            $table->foreign('crypto_type_id')->references('id')->on('m_crypto_types');
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
        Schema::dropIfExists('m_sale_lists');
    }
}
