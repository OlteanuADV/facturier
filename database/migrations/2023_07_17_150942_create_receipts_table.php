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
        // 6.1 Creare table denumita receipts, ce va contine coloanele: company_id, client_id, user_id, serie, number, date, total, currency
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->on('companies')->onDelete('cascade');
            $table->foreignId('client_id')->constrained()->on('clients')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->on('users')->onDelete('cascade');
            $table->foreignId('invoice_id')->constrained()->on('invoices')->onDelete('cascade');
            $table->string('serie');
            $table->integer('number');
            $table->date('date');
            $table->float('total');
            $table->string('currency')->default('RON');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
