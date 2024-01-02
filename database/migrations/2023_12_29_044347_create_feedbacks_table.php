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
            $table->string('products_id', 11);
            $table->string('buyer_id', 11);
            $table->string('feedback', 255);
            $table->dateTime('created_at', $precision = 0);
            
            $table->foreign('products_id')
                    ->references('id')
                    ->on('products')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('buyer_id')
                    ->references('id')
                    ->on('buyer')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

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
