<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_auctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('apartment_id')->references('id')->on('apartments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('added_value');
            $table->bigInteger('current_price');
            $table->bigInteger('last_price');
            $table->timestamp('start_at')->nullable();;
            $table->timestamp('end_at')->nullable();;
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
        Schema::dropIfExists('transaction_auction');
    }
};
