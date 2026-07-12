<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Faq;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total data dari setiap modul
        $totalArticles = Article::count();
        $totalRoutes = Route::count();
        $totalPartners = Partner::count();
        $totalGalleries = Gallery::count();
        $totalFaqs = Faq::count();

        // Data terbaru untuk aktivitas
        $latestArticles = Article::with('author')->latest()->take(5)->get();
        $latestRoutes = Route::latest()->take(5)->get();
        $latestPartners = Partner::latest()->take(5)->get();
        $latestGalleries = Gallery::latest()->take(5)->get();
        $latestFaqs = Faq::latest()->take(5)->get();

        // Gabungkan semua aktivitas
        $activities = collect();

        foreach ($latestArticles as $article) {
            $activities->push([
                'type' => 'article',
                'title' => $article->title,
                'description' => 'Artikel baru ditambahkan',
                'created_at' => $article->created_at,
                'icon' => 'article',
                'color' => 'blue',
            ]);
        }

        foreach ($latestRoutes as $route) {
            $activities->push([
                'type' => 'route',
                'title' => $route->name ?? $route->title,
                'description' => 'Rute diperbarui',
                'created_at' => $route->created_at,
                'icon' => 'terrain',
                'color' => 'green',
            ]);
        }

        foreach ($latestPartners as $partner) {
            $activities->push([
                'type' => 'partner',
                'title' => $partner->NAME,
                'description' => 'Mitra baru bergabung',
                'created_at' => $partner->CREATED_AT ?? $partner->created_at,
                'icon' => 'store',
                'color' => 'purple',
            ]);
        }

        foreach ($latestGalleries as $gallery) {
            $activities->push([
                'type' => 'gallery',
                'title' => $gallery->title,
                'description' => 'Foto baru diupload',
                'created_at' => $gallery->created_at,
                'icon' => 'photo_library',
                'color' => 'pink',
            ]);
        }

        foreach ($latestFaqs as $faq) {
            $activities->push([
                'type' => 'faq',
                'title' => $faq->question ?? 'FAQ diperbarui',
                'description' => 'FAQ diperbarui',
                'created_at' => $faq->created_at,
                'icon' => 'help',
                'color' => 'orange',
            ]);
        }

        // Urutkan berdasarkan tanggal terbaru
        $activities = $activities->sortByDesc('created_at')->take(10);

        // Rute populer (berdasarkan views jika ada, atau terbaru)
        $popularRoutes = Route::latest()->take(3)->get();

        // Artikel terbaru
        $recentArticles = Article::latest()->take(3)->get();

        return view('admin.dashboard', compact(
            'totalArticles',
            'totalRoutes',
            'totalPartners',
            'totalGalleries',
            'totalFaqs',
            'activities',
            'popularRoutes',
            'recentArticles'
        ));
    }
}