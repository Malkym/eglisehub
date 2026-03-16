<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ministeres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('sous_domaine')->unique();
            $table->enum('type', [
                'eglise',
                'ministere',
                'organisation',
                'mission',
                'ecole_biblique',
                'autre'
            ])->default('eglise');
            $table->string('logo')->nullable();
            $table->string('couleur_primaire')->default('#3366cc');
            $table->string('couleur_secondaire')->nullable();
            $table->text('description')->nullable();
            $table->enum('statut', ['actif', 'inactif', 'suspendu'])->default('actif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ministeres');
    }
};