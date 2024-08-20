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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id(); // Campo de clave primaria
            $table->string('documento')->unique(); // Documento único del estudiante
            $table->foreignId('tipo_docuid')->constrained('tipo_docu'); // Llave foránea hacia tipo_docu
            $table->string('nombre'); // Nombre del estudiante
            $table->date('fecha_nacimiento'); // Fecha de nacimiento del estudiante
            $table->integer('edad'); // Edad del estudiante
            $table->string('alergias')->nullable(); // Alergias, puede ser nulo
            $table->string('eps'); // EPS del estudiante
            $table->integer('plan_id'); // ID del plan del estudiante
            $table->string('nume_docu_acud'); // Número de documento del acudiente
            $table->foreignId('tipo_sangre_id')->constrained('grupo_sanguineo'); // Llave foránea hacia grupo_sanguineo
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
