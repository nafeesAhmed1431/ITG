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
        // Schema::create('sales', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('sale_no');
        //     $table->unsignedBigInteger('account_no');
        //     $table->text('account_desc')->nullable();
        //     $table->unsignedBigInteger('sale_account_no');
        //     $table->decimal('total', 10, 2)->default(0);
        //     $table->decimal('discount', 10, 2)->default(0);
        //     $table->decimal('vat_amount', 10, 2)->default(0);
        //     $table->unsignedBigInteger('customer_id');
        //     $table->string('customer_name');
        //     $table->integer('created_by');

        //     $table->foreign('customer_id')->on('users')->references('id')->onDelete('cascade');
        //     $table->foreign('sale_account_no')->on('accounts')->references('id')->onDelete('cascade');
        //     $table->timestamps();
        // });

        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_no');
            $table->decimal('total', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('vat_amount', 10, 2)->default(0);
            $table->unsignedBigInteger('customer_id');
            $table->string('customer_name');
            $table->unsignedBigInteger('account_no');
            $table->text('account_desc')->nullable();
            $table->unsignedBigInteger('created_by');

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('account_no')->references('id')->on('accounts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
