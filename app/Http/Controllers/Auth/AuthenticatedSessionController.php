<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('dashboard');

    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // $user = User::user();

        // // Check user role and redirect accordingly
        // if ($user->hasRole('super_admin')) {
        //     return redirect()->route('superadmin.dashboard'); // Ganti dengan route yang sesuai
        // }

        // if ($user->hasRole('admin')) {
        //     return redirect()->route('admin.dashboard'); // Ganti dengan route yang sesuai
        // }

        // if ($user->hasRole('user')) {
        //     return redirect()->route('civil.dashboard'); // Ganti dengan route yang sesuai
        // }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
