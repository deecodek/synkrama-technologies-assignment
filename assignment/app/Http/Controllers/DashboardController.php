<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();

        if ($user->user_type === UserType::EMPLOYEE) {
            return view('dashboard.employee');
        }

        return view('dashboard.dealer');
    }
}
