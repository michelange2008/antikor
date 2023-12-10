<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('subname', 191)->nullable();
            $table->text('contexte', 65000)->nullable();
            $table->foreignId('duree_id')->constrained();
            $table->foreignId('stagiaire_id')->constrained();
            $table->foreignId('intervenant_id')->constrained();
            $table->string('icone', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::dropIfExists('formations');
    }
};
