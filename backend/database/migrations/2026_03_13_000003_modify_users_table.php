<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // On modifie la table users existante
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom')->nullable()->after('name');
            $table->renameColumn('name', 'nom');
            $table->foreignId('ministere_id')->nullable()->constrained('ministeres')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles');
            $table->timestamp('dernier_login')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['ministere_id']);
            $table->dropForeign(['role_id']);
            $table->dropColumn(['prenom', 'ministere_id', 'role_id', 'dernier_login']);
            $table->renameColumn('nom', 'name');
        });
    }
};