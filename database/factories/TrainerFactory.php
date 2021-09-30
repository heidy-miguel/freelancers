<?php

namespace Database\Factories;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trainer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'active' => $this->faker->boolean($chanceOfGettingTrue = 70),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'profession' => $this->faker->jobTitle(), 
            'address' => $this->faker->address(),
            'birth_date' => $this->faker->dateTimeBetween($startDate = '-50 years', $endDate = '-18 years'),
            'bio' => $this->faker->text($maxNbChars = 200),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            //
        ];
    }
}
