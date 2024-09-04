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
        Schema::create('supplier_country', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')
                  ->constrained(
                    table: 'supplier', indexName: 'supplier_country_supplier_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('country_id')
                  ->constrained(
                    table: 'country', indexName: 'supplier_country_country_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_country');
    }
};
