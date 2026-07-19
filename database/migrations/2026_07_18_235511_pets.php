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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable();
            $table->enum('report_type', ['PERDIDO', 'ENCONTRADO']);
            $table->enum('specie', ['GATO', 'PERRO', 'OTRO']);
            $table->string('description', 500);
            $table->foreignId('neighborhood_id')->constrained();
            $table->string('street')->nullable();
            $table->string('tel');
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['ACTIVO', 'REENCONTRADO', 'ARCHIVADO'])->default('ACTIVO');
            $table->boolean('reward')->default(false);
            $table->string('access_token')->unique();
            $table->date('event_date');
            $table->timestamps();

            $table->index(['status', 'neighborhood_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
