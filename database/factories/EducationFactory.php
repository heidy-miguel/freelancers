<?php

namespace Database\Factories;

use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Education::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'school' => $this->faker->company(),
            'study_area' => $this->faker->words($nb = 3, $asText = true),
            'degree' => $this->faker->randomElement($array = array('curso', 'licentiatura', 'doutoramento', 'mestrado')),
            'start_date' => $this->faker->dateTimeBetween($startDate = '-7 years', $endDate = '-2 years'),
            'end_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            'instructor_id' => $this->faker->numberBetween($min = 1, $max = 23), 
            'description' => $this->faker->text($maxNbChars = 300),
        ];
    }
}
