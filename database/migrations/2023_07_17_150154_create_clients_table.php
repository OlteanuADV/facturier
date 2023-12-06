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
        Schema::create('clients', function (Blueprint $table) {
            // 4.Creare table denumita client, ce va contine coloanele: company_id, cui, phone, email
            $table->id();
            $table->foreignId('company_id')->constrained()->on('companies')->onDelete('cascade');
            $table->string('cui');
            $table->longText('denumire');
            $table->longText('adresa');
            $table->string('phone')->default('');
            $table->string('email')->default('');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
