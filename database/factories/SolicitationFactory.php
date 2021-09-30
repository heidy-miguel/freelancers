<?php

namespace Database\Factories;

use App\Models\Solicitation;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solicitation::class;

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
            'institution_id' => $this->faker->numberBetween($min = 1, $max = 35), 
            'start_date' => $this->faker->dateTimeBetween($startDate = '1 week', $endDate = '1 month'),
            'end_date' => $this->faker->dateTimeBetween($startDate = '1 month', $endDate = '6 month'),
            'description' => $this->faker->text($maxNbChars = 600),
        ];
    }
}
