<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->string('module'); // pages, articles, evenements, etc.
            $table->string('action'); // create, read, update, delete, manage
            $table->timestamps();
            
            $table->unique(['role_id', 'module', 'action']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};