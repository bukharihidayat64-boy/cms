<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Tampilkan form login user
     */
    public function showLoginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.profile');
        }

        return response()
            ->view('frontend.auth.login')
            ->header('Cache-Control', 'private, no-cache, no-store, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0')
            ->header('Vary', 'Cookie');
    }

    /**
     * Proses login user
     */
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

        Log::info('User login attempt', ['email' => $credentials['email']]);

        // Cek apakah email sudah terdaftar di database
        $existingUser = User::where('email', $credentials['email'])->first();

        // Jika email belum terdaftar, arahkan otomatis ke halaman register
        if (!$existingUser) {
            Log::info('Email not registered, redirecting to register', ['email' => $credentials['email']]);
            
            return redirect()->route('user.register')
                ->with('info', 'Email belum terdaftar. Silakan daftar terlebih dahulu.')
                ->withInput($request->only('email', 'name'));
        }

        // Coba login dengan guard 'web'
        if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {
            
            $request->session()->regenerate();
            $user = Auth::guard('web')->user();
            
            if (!$user) {
                Auth::guard('web')->logout();
                Log::warning('Login succeeded but user is null', ['email' => $credentials['email']]);
                return back()->withErrors([
                    'email' => 'Terjadi kesalahan saat login. Silakan coba lagi.'
                ])->onlyInput('email');
            }
            
            // Tolak jika yang login adalah admin (harus login di /admin/login)
            if ($user->role === 'admin') {
                Auth::guard('web')->logout();
                Log::warning('Admin tried to login via user form', ['email' => $user->email]);
                return back()->withErrors([
                    'email' => 'Akun administrator tidak dapat login di halaman user. Silakan login di /admin/login'
                ])->onlyInput('email');
            }
            
            Log::info('User login successful', ['user_id' => $user->id, 'email' => $user->email]);
            
            return redirect()->route('home');
        }

        // Login gagal (email terdaftar tapi password salah)
        Log::warning('User login failed - wrong password', ['email' => $credentials['email']]);
        
        return back()->withErrors([
            'email' => 'Password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Tampilkan form register
     */
    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }

    /**
     * Proses register user baru
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.min' => 'Nama minimal 3 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'terms.accepted' => 'Anda harus menyetujui Syarat & Ketentuan.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        Auth::guard('web')->login($user);
        $request->session()->regenerate();

        Log::info('User registered successfully', ['user_id' => $user->id, 'email' => $user->email]);

        return redirect()->route('home')
            ->with('success', 'Selamat datang di RinjaniTrail.id! Akun Anda berhasil dibuat.');
    }

    /**
     * Tampilkan form lupa password
     */
    public function showForgotPasswordForm()
    {
        return view('frontend.auth.forgot-password');
    }

    /**
     * Redirect ke Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName() ?? $googleUser->getNickname() ?? 'Google User',
                    'password' => Hash::make(Str::random(24)),
                    'google_id' => $googleUser->getId(),
                    'role' => 'user',
                ]
            );

            Auth::guard('web')->login($user);
            $request = request();
            $request->session()->regenerate();
            
            Log::info('Google login successful', ['user_id' => $user->id, 'email' => $user->email]);
            
            return redirect()->route('user.profile');
            
        } catch (\Exception $e) {
            Log::error('Google login failed: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return redirect()->route('user.login')->withErrors(['email' => 'Google login gagal. Silakan coba metode lain.']);
        }
    }

    /**
     * Redirect ke Facebook OAuth
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Handle callback dari Facebook
     */
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            
            $user = User::firstOrCreate(
                ['email' => $facebookUser->getEmail()],
                [
                    'name' => $facebookUser->getName() ?? $facebookUser->getNickname() ?? 'Facebook User',
                    'password' => Hash::make(Str::random(24)),
                    'facebook_id' => $facebookUser->getId(),
                    'role' => 'user',
                ]
            );

            Auth::guard('web')->login($user);
            $request = request();
            $request->session()->regenerate();
            
            Log::info('Facebook login successful', ['user_id' => $user->id, 'email' => $user->email]);
            
            return redirect()->route('user.profile');
            
        } catch (\Exception $e) {
            Log::error('Facebook login failed: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return redirect()->route('user.login')->withErrors(['email' => 'Facebook login gagal. Silakan coba metode lain.']);
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        $user = Auth::guard('web')->user();
        if ($user) {
            Log::info('User logged out', ['user_id' => $user->id, 'email' => $user->email]);
        }
        
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Anda telah keluar.');
    }
}