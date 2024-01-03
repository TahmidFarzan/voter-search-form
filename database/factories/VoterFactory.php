<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoterFactory extends Factory
{
    public function definition(): array
    {
        return [
            'voter_no' => Str::uuid(),
            'voter_slip' => Str::uuid(),
            'name' => fake()->name(),
            'upazilla' => null,
            'union' => null,
            'father_name' => null,
            'mother_name' => null,
            'date_of_birth' => null,
            'profession' => null,
            'address' => null,

            'created_at' => now(),
            'updated_at' => null,
        ];
    }
}
