<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LogoutRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    public function __invoke(LogoutRequest $request, AuthService $authService): RedirectResponse
    {
        $authService->logout();

        return redirect()->route('login');
    }
}
