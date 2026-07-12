<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::where('is_active', true)
            ->orderBy('difficulty')
            ->orderBy('name')
            ->get();
        
        return view('frontend.routes', compact('routes'));
    }

    public function show($slug)
    {
        $route = Route::where('slug', $slug)->firstOrFail();
        return view('frontend.route-detail', compact('route'));
    }
}