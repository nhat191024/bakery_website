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
            $table->id();
            $table->unsignedBigInteger('cake_id');
            $table->unsignedBigInteger('bill_id');
            $table->integer('quantity')->default(1);
            $table->bigInteger('price')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->timestamps();
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
