<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Partner;

use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Auth\RegisterController as AdminRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\RouteController as FrontendRouteController;
use App\Http\Controllers\Frontend\ArticleController as FrontendArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\FAQController as AdminFAQController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\QuickAddController;
use App\Http\Controllers\Partner\PartnerAuthController;
use App\Http\Controllers\Partner\PartnerDashboardController;
use App\Http\Controllers\Partner\PartnerProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.process');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    
    Route::get('/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AdminRegisterController::class, 'register'])->name('register.process');
    
    Route::get('auth/google', [AdminLoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('auth/google/callback', [AdminLoginController::class, 'handleGoogleCallback'])->name('login.google.callback');
    Route::get('auth/facebook', [AdminLoginController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('auth/facebook/callback', [AdminLoginController::class, 'handleFacebookCallback'])->name('login.facebook.callback');
    
    Route::middleware(['auth:admin', 'admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/photo', [AdminProfileController::class, 'updatePhoto'])->name('profile.photo');
        Route::delete('/profile/photo', [AdminProfileController::class, 'deletePhoto'])->name('profile.photo.delete');
        
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
        
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
        Route::post('/notifications/mark-read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
        Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
        
        Route::get('/search', [SearchController::class, 'index'])->name('search');
        Route::get('/quick-add/{type}', [QuickAddController::class, 'create'])->name('quick-add');
        
        Route::resource('articles', AdminArticleController::class)->names('articles');
        Route::resource('routes', RouteController::class)->names('routes');
        Route::resource('partners', PartnerController::class)->names('partners');
        Route::resource('gallery', AdminGalleryController::class)->names('gallery');
        Route::resource('faq', AdminFAQController::class)->names('faq');
        
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('index');
            Route::get('/{user}', [AdminUserController::class, 'show'])->name('show');
            Route::get('/{user}/edit', [AdminUserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [AdminUserController::class, 'update'])->name('update');
            Route::delete('/{user}', [AdminUserController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/routes', [FrontendRouteController::class, 'index'])->name('routes');
Route::get('/routes/{slug}', [FrontendRouteController::class, 'show'])->name('routes.show');

Route::get('/articles', [FrontendArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [FrontendArticleController::class, 'show'])->name('articles.show');

Route::get('/local-services', function (Request $request) {
    $query = Partner::query()
        ->where(function($q) {
            $q->where('is_active', '1')
              ->orWhere('is_active', 1)
              ->orWhere('is_active', true);
        })
        ->orderByDesc('id');

    if ($request->filled('category') && $request->category !== 'all') {
        $query->where('category', $request->category);
    }

    if ($request->filled('search')) {
        $search = trim($request->search);
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%")
                ->orWhere('location_area', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    return view('frontend.local_services', [
        'services' => $query->get(),
        'categories' => Partner::query()
            ->where(function($q) {
                $q->where('is_active', '1')
                  ->orWhere('is_active', 1)
                  ->orWhere('is_active', true);
            })
            ->whereNotNull('category')
            ->selectRaw('category as category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category'),
        'selectedCategory' => $request->input('category', 'all'),
        'search' => $request->input('search', ''),
    ]);
})->name('local_services');

Route::get('/trip-gallery', function (Request $request) {
    $query = \App\Models\Gallery::where('is_active', true)->orderBy('created_at', 'desc');
    
    if ($request->filled('category') && $request->category !== 'all') {
        $query->where('category', $request->category);
    }
    
    return view('frontend.trip_gallery', [
        'galleries' => $query->get(),
        'categories' => \App\Models\Gallery::categories()
    ]);
})->name('trip_gallery');

Route::get('/faq', function (Request $request) {
    $query = \App\Models\Faq::where('is_active', true)
        ->orderBy('category')
        ->orderBy('sort_order');
    
    if ($request->filled('category') && $request->category !== 'all') {
        $query->where('category', $request->category);
    }
    
    return view('frontend.faq', [
        'faqs' => $query->get()->groupBy('category'),
        'categories' => \App\Models\Faq::categories()
    ]);
})->name('faq');

Route::get('/about', fn() => view('frontend.about'))->name('about');
Route::get('/detail-rute-sembalun', fn() => view('frontend.detail_rute_sembalun'))->name('detail_rute_sembalun');
Route::get('/detail-rute-senaru', fn() => view('frontend.detail_rute_senaru'))->name('detail_rute_senaru');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [LoginController::class, 'login'])->name('user.login.process');

Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [LoginController::class, 'register'])->name('user.register.process');

Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('user.login.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('user.login.google.callback');
Route::get('auth/facebook', [LoginController::class, 'redirectToFacebook'])->name('user.login.facebook');
Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->name('user.login.facebook.callback');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('user.profile.password');
    Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');
});

Route::get('/logout-page', fn() => view('frontend.logout'))->name('logout.page');

// PORTAL MITRA LOKAL
Route::prefix('partner')->name('partner.')->group(function () {
    Route::get('/login', [PartnerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [PartnerAuthController::class, 'login'])->name('login.process');
    Route::post('/logout', [PartnerAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth:partner'])->group(function () {
        Route::get('/dashboard', [PartnerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [PartnerProfileController::class, 'index'])->name('profile');
        Route::put('/profile', [PartnerProfileController::class, 'update'])->name('profile.update');
    });
});