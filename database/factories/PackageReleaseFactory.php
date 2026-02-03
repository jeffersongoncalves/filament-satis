<?php

namespace JeffersonGoncalves\FilamentSatis\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JeffersonGoncalves\FilamentSatis\Models\PackageRelease;

class PackageReleaseFactory extends Factory
{
    protected $model = PackageRelease::class;

    public function definition(): array
    {
        return [
            'version' => $this->faker->semver(),
            'time' => $this->faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
            'type' => 'library',
            'description' => $this->faker->sentence(),
            'homepage' => $this->faker->url(),
        ];
    }
}
