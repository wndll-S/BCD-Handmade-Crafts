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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('transaction_id')->primary();
            $table->string('buyer_id', 11);
            $table->foreign('buyer_id')
                    ->references('id')
                    ->on('buyer')
                    ->onUpdate('cascade')                    
                    ->onDelete('cascade');

            $table->string('product_id', 11);
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onUpdate('cascade')                    
                    ->onDelete('cascade');

            $table->integer('total_quantity');
            $table->double('total_amount', 8, 2);
            $table->enum('payment_method', ['cod', 'gcash', 'bank_transfer'])->default('cod');
            $table->string('shipping_address');
            $table->enum('status', ['pending', 'processing', 'out-for-delivery', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
