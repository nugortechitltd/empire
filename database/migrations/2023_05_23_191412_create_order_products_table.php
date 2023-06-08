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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('customer_id')->nullable();
            $table->string('tran_number')->nullable();
            $table->string('tran_id')->nullable();
            $table->integer('charge')->nullable();
            $table->string('coupon_price')->nullable();
            $table->integer('status')->default(0);
            $table->integer('payment_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
