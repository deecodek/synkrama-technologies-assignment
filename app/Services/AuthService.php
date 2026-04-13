<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data): User
    {
        return DB::transaction(function () use ($data): User {
            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'user_type' => $data['user_type'],
                'first_login_completed' => false,
            ]);
        });
    }

    public function login(array $data): array
    {
        if (! Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return ['success' => false, 'message' => 'Invalid credentials'];
        }

        /** @var User $user */
        $user = Auth::user();

        $requiresLocationSetup = $user->user_type === UserType::DEALER && ! $user->first_login_completed;

        return [
            'success' => true,
            'user' => $user,
            'requires_location_setup' => $requiresLocationSetup,
            'redirect' => $requiresLocationSetup ? route('dealer.setup-location') : route('dashboard'),
        ];
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function completeDealerLocationSetup(User $user, array $data): void
    {
        DB::transaction(function () use ($user, $data): void {
            $user->dealerLocation()->create([
                'city' => $data['city'],
                'state' => $data['state'],
                'zip_code' => $data['zip_code'],
            ]);

            $user->update(['first_login_completed' => true]);
        });
    }
}
