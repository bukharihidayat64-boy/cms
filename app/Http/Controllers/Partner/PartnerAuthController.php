<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerAuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('partner')->check()) {
            return redirect()->route('partner.dashboard');
        }

        return view('partner.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'contact_email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'contact_email.required' => 'Email kontak wajib diisi.',
            'contact_email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $attemptCredentials = [
            'contact_email' => $credentials['contact_email'],
            'password' => $credentials['password']
        ];

        if (Auth::guard('partner')->attempt($attemptCredentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $partner = Auth::guard('partner')->user();
            
            if ($partner && ($partner->is_active == '1' || $partner->is_active == 1 || $partner->is_active == true)) {
                return redirect()->route('partner.dashboard');
            }

            Auth::guard('partner')->logout();
            return back()->withErrors(['contact_email' => 'Akun mitra Anda dinonaktifkan oleh administrator.'])->onlyInput('contact_email');
        }

        return back()->withErrors(['contact_email' => 'Email atau password salah.'])->onlyInput('contact_email');
    }

    public function logout(Request $request)
    {
        Auth::guard('partner')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('partner.login')->with('success', 'Anda telah keluar dari portal mitra.');
    }
}
