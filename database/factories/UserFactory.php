<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'surname' => $this->faker->firstName(),
            'phone' => $this->faker->phoneNumber(),
            'role' => $this->faker->randomElement($array = array('trainer', 'institution')),
            'profession' => $this->faker->jobTitle(),
            'birth_date' => $this->faker->date($format = 'Y-m-d', $max = '-20 years'),
            'description' => $this->faker->text($maxNbChars = 400),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'nif' => $this->faker->numberBetween($min = 5000000000, $max = 9999999999),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
