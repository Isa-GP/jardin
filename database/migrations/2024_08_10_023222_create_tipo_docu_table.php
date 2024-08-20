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
        
        Schema::create('tipo_docu', function (Blueprint $table) {
            $table->id(); // Campo de clave primaria
            $table->string('nombre'); // Nombre del tipo de documento
            $table->text('descripcion')->nullable(); // Descripción del tipo de documento, puede ser nulo
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_docu');
    }
};
