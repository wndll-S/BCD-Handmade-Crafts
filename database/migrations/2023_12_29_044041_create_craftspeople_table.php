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
        Schema::create('craftspeople', function (Blueprint $table) {
            $table->string('id', 11)->primary();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('name_ext', 3);
            $table->string('password', 255);
            $table->string('mobile_number', 11);
            $table->string('address', 255);
            $table->string('email', 255);
            $table->string('image_url', 255);
            $table->integer('account_status');
            $table->dateTime('created_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('craftspeople');
    }
};
