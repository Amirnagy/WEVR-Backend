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
        Schema::create('apartmentdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->references('id')->on('Apartments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('monthprice')->nullable();
            $table->integer('yearprice')->nullable();
            $table->smallInteger('livingroom');
            $table->smallInteger('bedroom')->nullable();
            $table->smallInteger('parking')->nullable();
            $table->smallInteger('baths')->nullable();
            $table->smallInteger('floors')->nullable();
            $table->integer('erea')->nullable();
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
        Schema::dropIfExists('apartmentdetails');
    }
};
