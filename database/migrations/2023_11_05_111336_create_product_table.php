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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->foreignId('supplier_id')
                  ->constrained(
                    table: 'supplier', indexName: 'product_supplier_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->integer('price');
            $table->integer('stock');
            $table->text('desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
