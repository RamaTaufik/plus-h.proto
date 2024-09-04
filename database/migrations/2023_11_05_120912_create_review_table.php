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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orders_id')
                  ->constrained(
                    table: 'orders', indexName: 'review_orders_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->text('text');
            $table->integer('rating');
            $table->datetime('time_posted');
            $table->enum('status', ['unedited', 'edited']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
