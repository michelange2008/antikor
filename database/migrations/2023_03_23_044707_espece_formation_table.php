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
        Schema::create('espece_formation', function (Blueprint $table) {
            $table->foreignId('espece_id')->constrained();
            $table->foreignId('formation_id')->constrained();
        });
         //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
