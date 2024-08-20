<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Estudiante;
use App\Models\TipoDocu;
use App\Models\GrupoSanguineo;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_creacion_de_estudiante()
    {
        // Crear instancias de TipoDocu y GrupoSanguineo para las relaciones
        $tipoDocu = TipoDocu::factory()->create();
        $grupoSanguineo = GrupoSanguineo::factory()->create();

        // Crear un estudiante con las relaciones correctas
        $estudiante = Estudiante::factory()->create([
            'documento' => '12345678',
            'tipo_docuid' => $tipoDocu->id,
            'nombre' => 'Juan Perez',
            'fecha_nacimiento' => '2000-01-01',
            'edad' => 24,
            'alergias' => 'Polen',
            'eps' => 'SaludCoop',
            'plan_id' => 1,
            'nume_docu_acud' => '87654321',
            'tipo_sangre_id' => $grupoSanguineo->id,
        ]);

        // Verificar que el modelo fue creado correctamente
        $this->assertInstanceOf(Estudiante::class, $estudiante);
        $this->assertEquals('Juan Perez', $estudiante->nombre);
        $this->assertEquals(24, $estudiante->edad);

        // Verificar las relaciones
        $this->assertInstanceOf(TipoDocu::class, $estudiante->tipoDocumento);
        $this->assertInstanceOf(GrupoSanguineo::class, $estudiante->grupoSanguineo);
    }

    public function test_actualizacion_de_estudiante()
    {
        // Crear las relaciones necesarias
        $tipoDocu = TipoDocu::factory()->create();
        $grupoSanguineo = GrupoSanguineo::factory()->create();

        // Crear un estudiante
        $estudiante = Estudiante::factory()->create([
            'tipo_docuid' => $tipoDocu->id,
            'tipo_sangre_id' => $grupoSanguineo->id,
        ]);

        // Actualizar el nombre del estudiante
        $estudiante->update([
            'nombre' => 'Pedro Gomez',
        ]);

        $this->assertEquals('Pedro Gomez', $estudiante->nombre);
    }

    public function test_eliminacion_de_estudiante()
    {
        // Crear las relaciones necesarias
        $tipoDocu = TipoDocu::factory()->create();
        $grupoSanguineo = GrupoSanguineo::factory()->create();

        // Crear un estudiante
        $estudiante = Estudiante::factory()->create([
            'tipo_docuid' => $tipoDocu->id,
            'tipo_sangre_id' => $grupoSanguineo->id,
        ]);

        // Eliminar el estudiante
        $estudiante->delete();

        // Verificar que el estudiante fue eliminado
        $this->assertDatabaseMissing('estudiantes', [
            'id' => $estudiante->id,
        ]);
    }
}
