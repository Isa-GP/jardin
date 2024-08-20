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
        Schema::create('grupo_sanguineo', function (Blueprint $table) {
        $table->id(); // Campo de clave primaria
        $table->string('tipo'); // Tipo de sangre (e.g., A, B, AB, O)
        $table->string('factor_rh'); // Factor RH (positivo o negativo)
        $table->timestamps(); // Campos created_at y updated_at
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_sanguineo');
    }
};
