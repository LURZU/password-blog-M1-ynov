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
        Schema::create('client_passwords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('data_category_id');
            $table->string('title');
            $table->string('username');
            $table->string('password'); // Consider encrypting this field
            $table->text('note')->nullable();
            $table->foreign('client_id')->references('id')->on('data_clients')->onDelete('cascade');
            $table->foreign('data_category_id')->references('id')->on('data_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_passwords');
    }
};
