<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Kalau admin sudah login, tetap boleh masuk ke dashboard.
        // Tapi untuk menghindari redirect "nyasar" saat session kacau,
        // hanya redirect bila route yang diakses memang /admin/login.
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }


        return response()
            ->view('admin.login_admin')
            ->header('Cache-Control', 'private, no-cache, no-store, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0')
            ->header('Vary', 'Cookie');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $user = Auth::guard('admin')->user();
            
            if ($user && $user->role === 'admin') {
                // Pastikan setelah login selalu kembali ke dashboard admin.
                return redirect()->route('admin.dashboard');
            }

            
            Auth::guard('admin')->logout();
            return back()->withErrors(['email' => 'Akses ditolak.'])->onlyInput('email');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Anda telah keluar dari panel admin.');
    }
}