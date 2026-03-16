<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessions_visiteurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministere_id')->constrained()->onDelete('cascade');
            $table->string('session_id');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->json('pages_visitees')->nullable();
            $table->timestamp('derniere_activite');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions_visiteurs');
    }
};