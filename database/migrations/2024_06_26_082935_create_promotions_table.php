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
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->decimal('discount_percentage', 8, 2)->nullable();
            $table->integer('discount_amount')->nullable();
            $table->enum('discount_type', ['fixed', 'percentage'])->default('fixed');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cake_id')->references('id')->on('cakes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
