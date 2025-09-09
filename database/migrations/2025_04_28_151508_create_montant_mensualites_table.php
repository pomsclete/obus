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
        Schema::create('montant_mensualites', function (Blueprint $table) {
            $table->id();
            $table->integer('montant')->default(0);
            $table->foreignId('mensualite_id')->constrained('mensualites')->onDelete('cascade');
            $table->foreignId('mode_paiement_id')->constrained('mode_paiements')->onDelete('cascade');
            $table->string('justificatif')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('montant_mensualites');
    }
};
