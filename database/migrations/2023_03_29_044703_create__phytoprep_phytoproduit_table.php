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
        Schema::create('_phytoprep_phytoproduit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phytoprep_id')->constrained();
            $table->foreignId('phytoproduit_id')->constrained();
            $table->float('quantite');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_phytoprep_phytoproduit');
    }
};
