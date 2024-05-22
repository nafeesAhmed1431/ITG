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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['debit', 'credit']);
            $table->integer('tr_no');
            $table->string('invoice_no', 10);
            $table->enum('invoice_type', ['sale', 'purchase', 'sale_return', 'purchase_return']);
            $table->unsignedBigInteger('item_id');
            $table->string('item_no', 20);
            $table->string('item_desc', 200);
            $table->string('item_desc2', 250);
            $table->string('item_unit', 5);
            $table->float('sale_rate')->default(0);
            $table->float('purchase_rate')->default(0);
            $table->float('pur_rate_on_sale')->default(0);
            $table->float('discount_amount')->default(0);
            $table->float('tax_amount')->default(0);
            $table->float('debit_qty')->default(0);
            $table->float('credit_qty')->default(0);
            $table->unsignedBigInteger('account_no');
            $table->string('account_des', 100);
            $table->string('item_location', 15);
            $table->float('tax_per');

            $table->foreign('item_id')->on('products')->references('id')->onDelete('cascade');
            $table->foreign('account_no')->on('accounts')->references('id')->onDelete('cascade');

            $table->unsignedBigInteger('invoiceable_id');
            $table->string('invoiceable_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
