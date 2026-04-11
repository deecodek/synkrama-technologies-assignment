<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\DealerLocation;
use App\Models\User;
use App\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DealerLocation>
 */
class DealerLocationFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(['user_type' => UserType::DEALER, 'first_login_completed' => true]),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'zip_code' => fake()->postcode(),
        ];
    }
}
