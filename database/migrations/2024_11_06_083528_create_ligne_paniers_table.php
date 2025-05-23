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
        Schema::create('ligne_paniers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panier_id')->foreign()->references('id')->on('Panier')->onDelete('cascade');
            $table->unsignedBigInteger('produit_id')->foreign()->references('id')->on('Produit')->onDelete('cascade');
            $table->integer('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_paniers');
    }
};
