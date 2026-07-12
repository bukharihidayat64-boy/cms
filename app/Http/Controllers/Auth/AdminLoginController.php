<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use App\Models\Admin; // Pastikan model Admin sudah ada dan benar
use Illuminate\Support\Str;

class AdminLoginController extends Controller
{
    /**
     * Tampilkan form login admin
     */
    public function showLoginForm()
    {
        // Cek apakah admin sudah login menggunakan guard 'admin'
        if (Auth::guard('admin')->check()) {
            // Jika sudah login, jangan tampilkan halaman login, langsung ke dashboard admin.
            return redirect()->route('admin.dashboard');
        }

        return response()
            ->view('admin.login_admin')
            ->header('Cache-Control', 'private, no-cache, no-store, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0')
            ->header('Vary', 'Cookie');
    }

    /**
     * Proses login admin
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Gunakan guard 'admin' untuk login admin
        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $admin = Auth::guard('admin')->user();

            // Pastikan yang login memang memiliki role 'admin'
            if ($admin && $admin->role !== 'admin') {
                Auth::guard('admin')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->withErrors([
                    'email' => 'Akses ditolak. Akun ini bukan akun administrator.'
                ])->onlyInput('email');
            }
            
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Redirect ke Google OAuth untuk admin
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google untuk admin
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Cari admin berdasarkan email dari Google
            $admin = Admin::where('email', $googleUser->getEmail())->first();

            if ($admin) {
                // Jika akun admin ditemukan, pastikan role-nya adalah 'admin'
                if ($admin->role === 'admin') {
                    // Update google_id jika belum ada
                    if (empty($admin->google_id)) {
                        $admin->google_id = $googleUser->getId();
                        $admin->save();
                    }
                    Auth::guard('admin')->login($admin);
                    return redirect()->route('admin.dashboard');
                } else {
                    // Akun ditemukan tapi bukan admin
                    return redirect()->route('admin.login')->withErrors([
                        'email' => 'Akses ditolak. Akun ini bukan akun administrator.'
                    ]);
                }
            } else {
                // Tidak ada akun admin yang terdaftar dengan email ini
                return redirect()->route('admin.login')->withErrors(['email' => 'Akses ditolak. Tidak ada akun administrator yang terdaftar dengan email ini.']);
            }
            
        } catch (\Exception $e) {
            Log::error('Google login failed for admin: ' . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['email' => 'Google login gagal untuk admin.']);
        }
    }

    /**
     * Redirect ke Facebook OAuth untuk admin
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Handle callback dari Facebook untuk admin
     */
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            
            // Cari admin berdasarkan email dari Facebook
            $admin = Admin::where('email', $facebookUser->getEmail())->first();

            if ($admin) {
                // Jika akun admin ditemukan, pastikan role-nya adalah 'admin'
                if ($admin->role === 'admin') {
                    // Update facebook_id jika belum ada
                    if (empty($admin->facebook_id)) {
                        $admin->facebook_id = $facebookUser->getId();
                        $admin->save();
                    }
                    Auth::guard('admin')->login($admin);
                    return redirect()->route('admin.dashboard');
                } else {
                    // Akun ditemukan tapi bukan admin
                    return redirect()->route('admin.login')->withErrors([
                        'email' => 'Akses ditolak. Akun ini bukan akun administrator.'
                    ]);
                }
            } else {
                // Tidak ada akun admin yang terdaftar dengan email ini
                return redirect()->route('admin.login')->withErrors(['email' => 'Akses ditolak. Tidak ada akun administrator yang terdaftar dengan email ini.']);
            }
            
        } catch (\Exception $e) {
            Log::error('Facebook login failed for admin: ' . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['email' => 'Facebook login gagal untuk admin.']);
        }
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}