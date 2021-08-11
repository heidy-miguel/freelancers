<?php

namespace Database\Factories;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Training::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->regexify('[A-Z0-9._%/+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
            'start_date' => $this->faker->dateTimeBetween($startDate = '-2 week', $endDate = '1 week'),
            'end_date' => $this->faker->dateTimeBetween($startDate = '2 week', $endDate = '1 month'),
            'address' => $this->faker->address(),
            'price' => $this->faker->numberBetween($min = 35000, $max = 100000),
            'trainee_id' => $this->faker->numberBetween($min = 1, $max = 84), 
            'course_id' => $this->faker->numberBetween($min = 1, $max = 22), 
            'instructor_id' => $this->faker->numberBetween($min = 1, $max = 23), 
            'description' => $this->faker->text($maxNbChars = 150), 
            // 
        ];
    }
}
