<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\DealerLocation;
use App\Models\User;
use App\UserType;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class DealerLocationService
{
    public function getAllDealers(?string $zipCode = null): LengthAwarePaginator
    {
        $query = User::where('user_type', UserType::DEALER)
            ->with('dealerLocation');

        if ($zipCode) {
            $query->whereHas('dealerLocation', function ($q) use ($zipCode): void {
                $q->where('zip_code', 'like', '%'.$zipCode.'%');
            });
        }

        return $query->paginate(15);
    }

    public function getDealerLocation(User $dealer): ?DealerLocation
    {
        return $dealer->dealerLocation;
    }

    public function updateDealerLocation(DealerLocation $location, array $data): DealerLocation
    {
        return DB::transaction(function () use ($location, $data): DealerLocation {
            $location->update([
                'city' => $data['city'],
                'state' => $data['state'],
                'zip_code' => $data['zip_code'],
            ]);

            return $location->fresh();
        });
    }

    public function createDealerLocation(User $dealer, array $data): DealerLocation
    {
        return DB::transaction(function () use ($dealer, $data): DealerLocation {
            return $dealer->dealerLocation()->create([
                'city' => $data['city'],
                'state' => $data['state'],
                'zip_code' => $data['zip_code'],
            ]);
        });
    }

    public function deleteDealerLocation(DealerLocation $location): bool
    {
        return DB::transaction(function () use ($location): bool {
            return $location->delete();
        });
    }
}
