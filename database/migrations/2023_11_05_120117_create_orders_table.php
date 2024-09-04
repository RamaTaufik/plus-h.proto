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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained(
                    table: 'users', indexName: 'orders_user_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('product_id')
                  ->constrained(
                    table: 'product', indexName: 'orders_product_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->integer('qty');
            $table->foreignId('city_id')
                  ->constrained(
                    table: 'city', indexName: 'orders_city_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->text('address');
            $table->foreignId('shipping_type_id')
                  ->constrained(
                    table: 'shipping_type', indexName: 'orders_shipping_type_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('payment_method_id')
                  ->constrained(
                    table: 'payment_method', indexName: 'orders_payment_method_id'
                  )
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->datetime('time_ordered');
            $table->enum('status', ['preparing', 'shipping', 'arrived']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
