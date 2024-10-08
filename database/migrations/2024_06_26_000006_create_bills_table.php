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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->dateTime('order_date');
            $table->string('full_name');
            $table->text('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('voucher_code')->nullable();
            $table->integer('delivery_method');
            $table->integer('payment_method');
            $table->integer('total_amount')->default(0);
            $table->foreignId('accessory_id')->nullable()->references('id')->on('accessories');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
