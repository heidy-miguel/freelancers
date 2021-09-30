<?php

namespace Database\Factories;

use App\Models\Employment;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmploymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->framework(),
            'start_date' => $this->faker->dateTimeBetween($startDate = '-7 years', $endDate = '-2 years'),
            'end_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            'trainer_id' => $this->faker->numberBetween($min = 1, $max = 25),
            'description' => $this->faker->text($maxNbChars = 200),
        ];
        ];
    }
}
