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
        Schema::create('shipping_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_id')
                  ->constrained(
                    table: 'shipping', indexName: 'shipping_type_shipping_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('type_id')
                  ->constrained(
                    table: 'type', indexName: 'shipping_type_type_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->integer('shipping_price');
            $table->integer('time_minute');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_type');
    }
};
