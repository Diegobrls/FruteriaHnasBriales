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
        Schema::create('elementos_cesta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cesta_id');
            $table->unsignedBigInteger('elemento_id');
            $table->timestamps();
            
            $table->foreign('cesta_id')->references('id')->on('cestas')->onDelete('cascade');
            $table->foreign('elemento_id')->references('id')->on('elementos')->onDelete('cascade');
    
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_cesta');
    }
};
