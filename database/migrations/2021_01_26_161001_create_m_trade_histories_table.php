<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMTradeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_trade_histories', function (Blueprint $table) {
            $table->id();
            $table->string('trade_type',25);
            $table->integer('seller_id');
            $table->integer('buy_id');
            $table->double('amount', 20, 2);
            $table->double('price', 20, 2);
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
        Schema::dropIfExists('m_trade_histories');
    }
}
