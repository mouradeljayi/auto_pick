<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'command_id' => $this->faker->numberBetween($min = 1, $max = 10),
          'brand' => $this->faker->company(),
          'model' => $this->faker->year(),
          'type' => $this->faker->word(),
          'price' => $this->faker->numberBetween($min = 100, $max = 900),
          'image' => $this->faker->imageURL($width = 500, $height = 500),
        ];
    }
}
