<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\DealerLocation;
use App\Models\User;
use App\UserType;
use Illuminate\Database\Seeder;

class DealerLocationSeeder extends Seeder
{
    public function run(): void
    {
        User::where('user_type', UserType::DEALER)->each(function (User $user): void {
            if (! $user->dealerLocation) {
                DealerLocation::factory()->create([
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}
