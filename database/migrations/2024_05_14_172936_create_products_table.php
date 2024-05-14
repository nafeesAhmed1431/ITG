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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_no')->nullable();
            $table->text('description')->nullable();
            $table->string('unit');
            $table->double('sale_rate');
            $table->double('sale_rate_2');
            $table->double('sale_rate_3');
            $table->string('stock_alert');
            $table->string('group');
            $table->boolean('lock')->default(0);
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
