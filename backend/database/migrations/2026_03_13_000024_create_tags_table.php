<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministere_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('slug');
            $table->timestamps();
            
            $table->unique(['ministere_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};