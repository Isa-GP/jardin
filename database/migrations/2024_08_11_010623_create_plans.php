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
    {    Schema::create('plans', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
        $table->decimal('valor', 10, 2);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
