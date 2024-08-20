<?php

namespace Database\Factories;

use App\Models\GrupoSanguineo;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoSanguineoFactory extends Factory
{
    protected $model = GrupoSanguineo::class;

    public function definition()
    {
        return [
            'tipo' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'factor_rh' => $this->faker->randomElement(['positivo', 'negativo']),
        ];
    }
}
