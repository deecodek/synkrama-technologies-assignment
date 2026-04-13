<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Services\AuthService;
use App\UserType;
use Illuminate\Http\RedirectResponse;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request, AuthService $authService): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['user_type'] = UserType::from($validatedData['user_type']);

        $user = $authService->register($validatedData);
        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
