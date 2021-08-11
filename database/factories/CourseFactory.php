<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->words($nb=5, $asText=true),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'description' => $this->faker->text($maxNbChars = 100)
        ];
    }
}
