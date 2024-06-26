<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cake_id');
            $table->unsignedInteger('bill_id');
            $table->integer('quantity');
            $table->bigInteger('price');
            $table->bigInteger('total_price');

            $table->foreign('cake_id')->references('id')->on('cakes');
            $table->foreign('bill_id')->references('id')->on('bills');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_details');
    }
};
