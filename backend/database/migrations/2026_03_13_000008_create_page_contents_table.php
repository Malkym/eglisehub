<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('page_sections')->onDelete('cascade');
            $table->enum('type_contenu', ['texte', 'image', 'video', 'html', 'galerie'])->default('texte');
            $table->longText('contenu');
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};