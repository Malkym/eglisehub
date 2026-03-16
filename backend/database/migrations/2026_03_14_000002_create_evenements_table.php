<?php
// database/migrations/2024_01_01_000014_create_evenements_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministere_id')->constrained()->onDelete('cascade');
            $table->foreignId('type_evenement_id')->nullable()->constrained('type_evenements');
            $table->string('titre');
            $table->text('description')->nullable();
            
            // Gestion des dates selon le type
            $table->enum('type_date', [
                'ponctuel',        // Date unique
                'recurrent',        // Se répète (chaque semaine)
                'continu'           // Permanent (groupe de prière)
            ])->default('ponctuel');
            
            // Pour événement ponctuel
            $table->dateTime('date_debut')->nullable();
            $table->dateTime('date_fin')->nullable();
            
            // Pour événement récurrent
            $table->enum('frequence', [
                'quotidien',
                'hebdomadaire',
                'bimensuel',
                'mensuel',
                'annuel'
            ])->nullable();
            
            $table->json('jours_semaine')->nullable(); // [1,3,5] pour lundi, mercredi, vendredi
            $table->time('heure_debut')->nullable();
            $table->time('heure_fin')->nullable();
            $table->date('date_debut_recurrence')->nullable();
            $table->date('date_fin_recurrence')->nullable(); // null = indéfini
            
            // Pour événement continu (ex: groupe de prière)
            $table->boolean('est_continu')->default(false);
            
            $table->string('lieu')->nullable();
            $table->enum('statut', ['publie', 'brouillon', 'annule'])->default('publie');
            $table->integer('max_participants')->nullable();
            $table->timestamps();
            
            // Index pour recherche
            $table->index('type_date');
            $table->index('date_debut');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};