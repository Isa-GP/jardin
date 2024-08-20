<?php

namespace Database\Factories;

use App\Models\TipoDocu;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoDocuFactory extends Factory
{
    protected $model = TipoDocu::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
        ];
    }
}
