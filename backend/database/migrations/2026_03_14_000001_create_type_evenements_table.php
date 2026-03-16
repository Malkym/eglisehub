<?php
// database/migrations/2024_01_01_000013_create_type_evenements_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('type_evenements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministere_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('code')->unique(); // culte, conference, groupe, etc.
            $table->string('description')->nullable();
            $table->string('couleur')->default('#3490dc'); // Pour affichage calendrier
            $table->enum('categorie', [
                'ponctuel',      // Une seule fois
                'recurrent',      // Se répète (chaque semaine/mois)
                'permanent'       // Groupe continu (ex: groupe de prière)
            ])->default('ponctuel');
            $table->boolean('actif')->default(true);
            $table->timestamps();
            
            $table->unique(['ministere_id', 'code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('type_evenements');
    }
};