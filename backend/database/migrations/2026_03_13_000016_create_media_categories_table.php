<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')->constrained('medias')->onDelete('cascade');
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['media_id', 'categorie_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_categories');
    }
};