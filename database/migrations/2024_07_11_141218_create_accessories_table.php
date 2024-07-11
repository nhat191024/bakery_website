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
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accessory_category_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('price')->default(0);
            $table->text('image')->nullable();
            $table->foreign('accessory_category_id')->references('id')->on('accessory_categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_accessories');
        Schema::dropIfExists('accessories');
    }
};
