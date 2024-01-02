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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id', 11)->primary();
            $table->string('craftspeople_id', 11);
            $table->foreignId('category_id')
                    ->constrained(table: 'categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                    
            $table->string('name', 255);
            $table->string('description', 255);
            $table->string('image_url', 255);
            $table->dateTime('created_at', $precision = 0);
            
            $table->foreign('craftspeople_id')
                ->references('id')
                ->on('craftspeople')
                ->onUpdate('cascade')                    
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
