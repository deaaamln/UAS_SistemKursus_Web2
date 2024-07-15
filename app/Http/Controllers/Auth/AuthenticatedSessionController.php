<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {

        try {
            $request->authenticate();
            $request->session()->regenerate();
            if (Auth::user() && Auth::user()->role != 'user') {
                return redirect()->route('dashboard-admin');
            } else if (Auth::user() && Auth::user()->role = 'user') {
                return redirect()->route('welcome.index');
            } else {
                Auth::guard('web')->logout();
                return redirect()->route('login')->with('status', 'You are not authorized to access this page.');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'ini error' . $e->getMessage());
        }

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
