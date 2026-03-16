<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministere_id')->constrained()->onDelete('cascade');
            $table->foreignId('uploader_id')->constrained('users');
            $table->string('nom_fichier');
            $table->enum('type', ['image', 'video', 'document', 'audio'])->default('image');
            $table->string('mime_type');
            $table->integer('taille'); // en octets
            $table->integer('largeur')->nullable(); // pour images
            $table->integer('hauteur')->nullable(); // pour images
            $table->string('chemin');
            $table->string('url');
            $table->enum('statut', ['publie', 'archive'])->default('publie');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};