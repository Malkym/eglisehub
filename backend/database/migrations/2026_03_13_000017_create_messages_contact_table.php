<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages_contact', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministere_id')->constrained()->onDelete('cascade');
            $table->string('nom_expediteur');
            $table->string('email');
            $table->string('sujet')->nullable();
            $table->text('message');
            $table->enum('statut', ['non_lu', 'lu', 'archive'])->default('non_lu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages_contact');
    }
};