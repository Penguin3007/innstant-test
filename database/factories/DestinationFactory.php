<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

class DestinationFactory extends Factory
{
    protected $model = Destination::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->city(),
            'lat' => $this->faker->latitude(),
            'lon' => $this->faker->longitude()
        ];
    }
}
