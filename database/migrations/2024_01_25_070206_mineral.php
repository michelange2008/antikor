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
        Schema::create('minerals', function (Blueprint $table) {
           $table->id();
           $table->float('zinc'); 
           $table->float('cuivre'); 
           $table->float('iode'); 
           $table->float('selenium'); 
           $table->float('cobalt'); 
           $table->float('manganese'); 
           $table->float('vitA'); 
           $table->float('vitD3'); 
           $table->float('vitE');
           $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
