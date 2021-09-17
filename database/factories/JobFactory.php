<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->framework(),
            'trainee_id' => $this->faker->numberBetween($min = 1, $max = 44), 
            'start_date' => $this->faker->dateTimeBetween($startDate = '1 week', $endDate = '1 month'),
            'end_date' => $this->faker->dateTimeBetween($startDate = '1 month', $endDate = '6 month'),
            'rate' => $this->faker->numberBetween($min = 3000, $max = 15000),
            'address' => $this->faker->address(),
            'description' => $this->faker->text($maxNbChars = 300),
        ];
    }
}
