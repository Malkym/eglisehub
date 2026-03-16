<?php
// database/migrations/2024_01_01_000015_create_evenement_exceptions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evenement_exceptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evenement_id')->constrained()->onDelete('cascade');
            $table->date('date_exception');
            $table->enum('type', ['annule', 'modifie']);
            $table->text('raison')->nullable();
            $table->time('nouvelle_heure_debut')->nullable();
            $table->time('nouvelle_heure_fin')->nullable();
            $table->string('nouveau_lieu')->nullable();
            $table->timestamps();
            
            $table->unique(['evenement_id', 'date_exception']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evenement_exceptions');
    }
};