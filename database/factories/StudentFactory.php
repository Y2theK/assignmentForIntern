<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'nrc' => $this->faker->randomElement(['9/mdy(N)123432','1/ygn(N)123456','5/sgg(N)553221','9/sha(N)543563','8/tgg(M)234532']),
            'dob' => $this->faker->date(),
        ];
    }
}
