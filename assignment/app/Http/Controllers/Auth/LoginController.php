<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, AuthService $authService): RedirectResponse
    {
        $result = $authService->login($request->validated());

        if (! $result['success']) {
            return back()->withErrors(['email' => $result['message']]);
        }

        return redirect()->to($result['redirect']);
    }
}
