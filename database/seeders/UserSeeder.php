<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->employee()->count(5)->create();
        User::factory()->dealer()->count(5)->create();

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Employee',
            'email' => 'employee@test.com',
            'password' => Hash::make('password'),
            'user_type' => UserType::EMPLOYEE,
            'first_login_completed' => true,
            'email_verified_at' => now(),
        ]);

        User::create([
            'first_name' => 'Test',
            'last_name' => 'Dealer',
            'email' => 'dealer@test.com',
            'password' => Hash::make('password'),
            'user_type' => UserType::DEALER,
            'first_login_completed' => false,
            'email_verified_at' => now(),
        ]);
    }
}
