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
        Schema::create('mensualites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('annee_id')->constrained('annees')->onDelete('cascade');
            $table->foreignId('etudiant_id')->constrained('etudiants')->onDelete('cascade');
            $table->foreignId('rentre_mois_id')->constrained('rentre_mois')->onDelete('cascade');
            $table->integer('status')->default(1); // 0: non payé, 1: payé
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensualites');
    }
};
