<?php

namespace Database\Factories;

use App\Models\Estudiante;
use App\Models\TipoDocu;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    protected $model = Estudiante::class;
    

    public function definition()
    {
        return [
            'documento' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'tipo_docuid' => TipoDocu::factory(), // Relación con TipoDocu
            'nombre' => $this->faker->name,
            'fecha_nacimiento' => $this->faker->date(),
            'edad' => $this->faker->numberBetween(1, 100),
            'alergias' => $this->faker->word,
            'eps' => $this->faker->company,
            'plan_id' => $this->faker->randomDigitNotNull,
            'nume_docu_acud' => $this->faker->numberBetween(10000000, 99999999),
            'tipo_sangre_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
