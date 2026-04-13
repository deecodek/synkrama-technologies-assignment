<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DealerLocation\IndexDealerLocationRequest;
use App\Http\Requests\DealerLocation\StoreDealerLocationRequest;
use App\Http\Requests\DealerLocation\UpdateDealerLocationRequest;
use App\Models\DealerLocation;
use App\Models\User;
use App\Services\DealerLocationService;
use App\UserType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DealerLocationController extends Controller
{
    public function __construct(
        private DealerLocationService $dealerLocationService
    ) {
    }

    public function index(IndexDealerLocationRequest $request): View
    {
        $dealers = $this->dealerLocationService->getAllDealers($request->validated()['zip_code'] ?? null);

        return view('dealers.index', compact('dealers'));
    }

    public function create(): View
    {
        $dealers = User::where('user_type', UserType::DEALER)
            ->whereDoesntHave('dealerLocation')
            ->get();

        return view('dealers.create', compact('dealers'));
    }

    public function store(StoreDealerLocationRequest $request): RedirectResponse
    {
        $dealer = User::findOrFail($request->user_id);
        $this->dealerLocationService->createDealerLocation($dealer, $request->validated());

        return redirect()->route('dealers.index')->with('success', 'Dealer location created successfully.');
    }

    public function edit(DealerLocation $dealer): View
    {
        return view('dealers.edit', compact('dealer'));
    }

    public function update(UpdateDealerLocationRequest $request, DealerLocation $dealer): RedirectResponse
    {
        $this->dealerLocationService->updateDealerLocation($dealer, $request->validated());

        return redirect()->route('dealers.index')->with('success', 'Dealer location updated successfully.');
    }

    public function destroy(DealerLocation $dealer): RedirectResponse
    {
        $this->dealerLocationService->deleteDealerLocation($dealer);

        return redirect()->route('dealers.index')->with('success', 'Dealer location deleted successfully.');
    }
}
