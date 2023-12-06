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
        Schema::create('companies', function (Blueprint $table) {
            //company has many users
            //company has many invoices
            //company has many products
            //company has many clients
            //invoice has many products
            //invoice has one client
            //invoice has one company
            //invoice has one user
            //product has one company
            $table->id();
            $table->string('cui');
            $table->string('denumire');
            $table->string('adresa');
            $table->string('numar_reg_com');
            $table->boolean('platitor_tva')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
