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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no', 10);
            $table->integer('account_no');
            $table->string('account_des', 100);
            $table->integer('sale_account_no');
            $table->float('total_amount');
            $table->float('discount_amount');
            $table->float('vat_amount');
            $table->string('till_id', 15);
            $table->string('till_name', 20);
            $table->string('entry_by', 50);
            $table->dateTime('entry_date');
            $table->string('edit_by', 50)->nullable();
            $table->dateTime('edit_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
