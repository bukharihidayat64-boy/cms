<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Jika request expects JSON (API), return null
        if ($request->expectsJson()) {
            return null;
        }

        // Cek berdasarkan URL request, bukan $this->guards
        if ($request->is('admin/*') || $request->routeIs('admin.*')) {
            return route('admin.login');
        }

        if ($request->is('partner/*') || $request->routeIs('partner.*')) {
            return route('partner.login');
        }

        // Default redirect ke login user
        return route('login');
    }
}