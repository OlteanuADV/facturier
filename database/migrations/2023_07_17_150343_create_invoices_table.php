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
            $table->foreignId('company_id')->constrained()->on('companies')->onDelete('cascade');
            $table->foreignId('client_id')->constrained()->on('clients')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->on('users')->onDelete('cascade');
            $table->string('serie');
            $table->integer('number');
            $table->date('date');
            $table->date('due_date');
            $table->float('total');
            $table->string('currency')->default('RON');
            $table->tinyInteger('status')->comment('0 - unpaid, 1- paid');
            $table->string('description')->nullable();
            $table->string('pdf')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
