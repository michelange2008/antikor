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
        Schema::create('aliments', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 191);
            $table->foreignId('altype_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('alstade_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->float('MS', 4, 1);
            $table->float('Ptot', 4, 1)->nullable(); // phosphore total
            $table->float('P', 4, 1); // phosphore absorbable
            $table->float('Catot', 4, 1)->nullable(); // calcium total
            $table->float('Ca', 4, 1); // calcium absorbable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aliments');
    }
};
