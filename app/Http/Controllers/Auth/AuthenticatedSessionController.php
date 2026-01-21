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
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->level === 'admin') {
            return redirect()->route('buku.index')
                ->with('success', 'Akses Admin Diterima. Selamat datang, Dark Knight.');
        }

        // Jika bukan admin, arahkan ke rute user yang baru kita beri nama tadi
        return redirect()->route('user.index')
                ->with('success', 'Selamat datang di Gotham Library.');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')
                ->with('success', 'Anda telah berhasil keluar.');
    }
}
