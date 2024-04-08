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
        // Exemple pour la migration de data_clients
        Schema::create('data_clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_category_id'); // Relier les clients aux catégories
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->foreign('data_category_id')->references('id')->on('data_categories')->onDelete('cascade'); // Assurer l'intégrité référentielle
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_clients');
    }
};
