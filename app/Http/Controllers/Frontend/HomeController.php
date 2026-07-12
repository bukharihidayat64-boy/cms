<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Partner;
use App\Models\Route;

class HomeController extends Controller
{
    public function index()
    {
        // Featured Routes
        $featuredRoutes = Route::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get();

        // Featured Partners
        $featuredPartners = Partner::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('name')
            ->take(2)
            ->get();

        // Latest Articles - tanpa filter is_active (sesuaikan dengan kolom yang ada)
        $latestArticles = Article::orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('frontend.home', compact('featuredRoutes', 'featuredPartners', 'latestArticles'));
    }
}