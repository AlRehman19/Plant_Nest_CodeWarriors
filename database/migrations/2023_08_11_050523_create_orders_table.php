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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('order_status')->default('1');
            $table->string('full_name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('customer_notes')->nullable();
            $table->string('payment_type');
            $table->decimal('subtotal', 8, 2)->default(0);
            $table->decimal('shipping_charges', 8, 2)->default(0);
            $table->decimal('total', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
