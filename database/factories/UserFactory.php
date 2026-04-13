<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'user_type' => fake()->randomElement([UserType::EMPLOYEE, UserType::DEALER]),
            'first_login_completed' => false,
            'remember_token' => Str::random(10),
        ];
    }
}
