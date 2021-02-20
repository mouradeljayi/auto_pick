<?php

namespace Database\Factories;

use App\Models\Command;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Command::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'user_id' => \App\Models\User::pluck('id')->random(),
          'car_id' => \App\Models\Car::pluck('id')->random(),
          'rental_date' => $this->faker->dateTime($max = 'now', $timezone = null),
          'recovery_date' => $this->faker->dateTime($max = 'now', $timezone = null),
          'total_price' => $this->faker->numberBetween($min = 100, $max = 900),
        ];
    }
}
