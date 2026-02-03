<?php

namespace JeffersonGoncalves\FilamentSatis\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JeffersonGoncalves\FilamentSatis\Models\Token;

class TokenFactory extends Factory
{
    protected $model = Token::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'token' => Token::generateToken(),
        ];
    }
}
