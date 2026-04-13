<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DealerLocation\StoreDealerLocationRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DealerSetupController extends Controller
{
    public function show(): View
    {
        return view('dealer-setup');
    }

    public function store(StoreDealerLocationRequest $request, AuthService $authService): RedirectResponse
    {
        $authService->completeDealerLocationSetup($request->user(), $request->validated());

        return redirect()->route('dashboard');
    }
}
