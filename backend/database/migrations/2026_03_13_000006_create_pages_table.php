<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministere_id')->constrained()->onDelete('cascade');
            $table->string('titre');
            $table->string('slug');
            $table->enum('statut', ['publie', 'brouillon', 'archive'])->default('brouillon');
            $table->foreignId('template_id')->nullable()->constrained('templates');
            $table->timestamps();
            
            $table->unique(['ministere_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};