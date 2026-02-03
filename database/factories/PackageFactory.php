<?php

namespace JeffersonGoncalves\FilamentSatis\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JeffersonGoncalves\FilamentSatis\Enums\PackageType;
use JeffersonGoncalves\FilamentSatis\Models\Package;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word().'/'.$this->faker->word(),
            'type' => PackageType::Composer,
            'url' => $this->faker->url(),
            'username' => $this->faker->userName(),
            'password' => $this->faker->password(),
            'is_credentials_validated' => false,
        ];
    }

    public function validated(): static
    {
        return $this->state(fn () => [
            'is_credentials_validated' => true,
            'credentials_validated_at' => now(),
        ]);
    }

    public function github(): static
    {
        return $this->state(fn () => [
            'type' => PackageType::Github,
            'url' => 'https://github.com/'.$this->faker->word().'/'.$this->faker->word().'.git',
        ]);
    }
}
