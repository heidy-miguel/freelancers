<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'active' => $this->faker->boolean($chanceOfGettingTrue = 70),
            'title' => $this->faker->text($maxNbChars = 60),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 5), 
            'trainer_id' => $this->faker->numberBetween($min = 6, $max = 16), 
            'manager_id' => $this->faker->numberBetween($min = 16, $max = 35), 
            'category_id' => $this->faker->numberBetween($min = 1, $max = 8), 
            'start_date' => $this->faker->dateTimeBetween($startDate = '1 week', $endDate = '1 month'),
            'end_date' => $this->faker->dateTimeBetween($startDate = '1 month', $endDate = '6 month'),
            'description' => $this->faker->text($maxNbChars = 600),
        ];
    }
}
