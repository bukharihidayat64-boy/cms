<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                
                // Prioritas 1: Jika guard 'admin' -> redirect ke dashboard admin
                if ($guard === 'admin') {
                    return redirect()->route('admin.dashboard');
                }

                // Jika guard 'partner' → redirect ke dashboard partner
                if ($guard === 'partner') {
                    return redirect()->route('partner.dashboard');
                }
                
                // Prioritas 2: Jika guard 'web' (user biasa)
                if ($guard === 'web' || $guard === null) {
                    // Jangan redirect jika sedang akses halaman admin
                    if ($request->is('admin/*')) {
                        return $next($request);
                    }
                    return redirect('/');
                }
                
                // Fallback default
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}