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
        Schema::create('invoice_products', function (Blueprint $table) {
            // 7.Creare table denumita invoice_product, ce va contine coloanele: invoice_id, product_id, quantity, price, total, tva
            $table->id();
            $table->foreignId('invoice_id')->constrained()->on('invoices')->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->on('products')->onDelete('cascade');
            $table->string('currency')->default('RON');
            $table->string('unit')->nullable();
            $table->float('quantity')->nullable();
            $table->float('price')->nullable();
            $table->float('discount')->nullable();
            $table->boolean('tva')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_products');
    }
};
