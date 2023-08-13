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
            $table->string('productName');
            $table->string('slug');
            $table->string('costPrice', 10);
            $table->string('discountPrice', 10);
            $table->string('discount', 5)->nullable();
            $table->text('description')->nullable();
            $table->string('quantity')->default(0);
            $table->string('image')->nullable();
            $table->string('featured')->default(0);
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessories');
    }
};
