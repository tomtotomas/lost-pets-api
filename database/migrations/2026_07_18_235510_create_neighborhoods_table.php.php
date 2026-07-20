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
        Schema::create('neighborhoods', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('locality', [
                'OLAVARRIA', 'SIERRAS BAYAS', 'HINOJO', 'COLONIA HINOJO',
                'LOMA NEGRA', 'SIERRA CHICA', 'COLONIA SAN MIGUEL', 'COLONIA NIEVAS',
                'ESPIGAS', 'RECALDE', 'SANTA LUISA']);
            $table->timestamps();

            $table->unique(['name', 'locality']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neighborhoods');
    }
};
