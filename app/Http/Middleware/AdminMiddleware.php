<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah admin sudah login menggunakan guard 'admin'
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Silakan login terlebih dahulu.']);
        }

        // 2. Cek apakah user memiliki role admin
        $user = Auth::guard('admin')->user();
        if ($user->role !== 'admin') {
            // Logout paksa user non-admin dari guard admin
            Auth::guard('admin')->logout();

            // Invalidate session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect ke login user dengan pesan error
            return redirect()->route('login')
                ->withErrors(['email' => 'Akses ditolak. Anda tidak memiliki izin untuk mengakses panel admin.']);
        }

        // 3. Jika semua valid, lanjutkan request
        return $next($request);
    }
}