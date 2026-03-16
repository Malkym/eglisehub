<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministere_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('cle');
            $table->text('valeur')->nullable();
            $table->timestamps();
            
            $table->unique(['ministere_id', 'cle']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};