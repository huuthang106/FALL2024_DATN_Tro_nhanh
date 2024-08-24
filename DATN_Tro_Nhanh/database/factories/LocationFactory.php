<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Location;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Location::class;
    public function definition(): array
    {
        $uniqueNumber = $this->faker->unique()->numberBetween(1, 1000);
        $name = 'VIP Zone ' . $uniqueNumber;
        $slug = Str::slug('VIP-Zone-' . $uniqueNumber);

        return [
            'name' => $name,
            'status' => 1,
            'slug' => $slug,
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
