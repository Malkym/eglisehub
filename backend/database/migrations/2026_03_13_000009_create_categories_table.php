<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministere_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('description')->nullable();
            $table->timestamps();
            
            $table->unique(['ministere_id', 'nom']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};