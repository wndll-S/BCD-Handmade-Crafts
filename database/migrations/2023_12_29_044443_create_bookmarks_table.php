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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->string('id', 11)->primary();

            $table->foreignId('buyer_id')
                    ->constrained(table: 'buyer')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignId('product_id')
                    ->constrained(table: 'products')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->string('product_id', 11);
            $table->string('name', 50);
            $table->string('description', 255);
            $table->dateTime('created_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
