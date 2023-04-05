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
        Schema::create('phytopreps', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('officiel', 50)->nullable();
            $table->string('detail', 191)->nullable();
            $table->string('icone', 50);
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
