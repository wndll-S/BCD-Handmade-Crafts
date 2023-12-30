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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->string('id', 11)->primary();
            
            $table->foreignId('products_id')
                    ->constrained(table: 'products')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignId('buyer_id')
                    ->constrained(table: 'buyer')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->string('feedback', 255);
            $table->dateTime('created_at', $precision = 0);

            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
