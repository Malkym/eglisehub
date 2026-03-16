<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministere_id')->constrained()->onDelete('cascade');
            $table->string('titre');
            $table->string('slug');
            $table->enum('type_article', [
                'complet',           // Article avec contenu complet
                'lien_externe',      // Simple lien vers site externe
                'video',              // Lien YouTube/Vimeo
                'audio',              // Lien podcast/audio
                'document'            // Lien vers PDF/doc
            ])->default('complet');
            $table->text('resume')->nullable();
            $table->longText('contenu')->nullable(); // Optionnel si type=complet
            $table->string('url_externe')->nullable(); // Pour les liens externes
            $table->string('image_une')->nullable();
            $table->enum('statut', ['publie', 'brouillon', 'archive'])->default('brouillon');
            $table->integer('vues')->default(0);
            $table->timestamp('date_publication')->nullable();
            $table->timestamps();
            
            $table->unique(['ministere_id', 'slug']);
            
            // Index pour recherche rapide
            $table->index('type_article');
            $table->index('statut');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};