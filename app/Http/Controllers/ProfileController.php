<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profile
     */
    public function index()
    {
        $user = Auth::user();
        
        // Data dummy untuk statistik (nanti bisa diganti dengan data real dari database)
        $stats = [
            'total_elevation' => '12,450m',
            'summits_reached' => 14,
            'trail_time' => '86h',
            'trips_completed' => 8,
        ];
        
        // Data dummy untuk rute favorit
        $favoriteRoutes = [
            [
                'name' => 'Sembalun Peak Trail',
                'duration' => '3 Days',
                'distance' => '22km',
                'difficulty' => 'Advanced',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCqiCFgMV5HesY3ky0Q5Rt29ZHhYgCuSsXquvZj0lbHLh6jxMiAbPi-P7nB8jOB2QtHL0gvpwL6SKSogwBtD6zYS3b6TTQ8HjrAMqW57lx_kHIKRgy_jGfIlklE_S4qC6f6LoptN4K38dVuZpKGgzJwGXjS9Ja3rG5FtKHoSqTTwlVIme5NaG6SBknO98YP6T6g4RKdIHFmGk0fMtSF-lB8vT7QVAd8sQx8ZKZdiul7V2sHq3bNaB3I3yK5XyU6zehyysXwSaC0r8_s',
            ],
            [
                'name' => 'Senaru Forest Path',
                'duration' => '2 Days',
                'distance' => '14km',
                'difficulty' => 'Moderate',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBcOhaKmbcb3d8Dj8P9AceDoz4IIEtTFjo3mUN2vMuvCbuAOlLzEBrskUUPsPmb4qkaLR5cUziavB_0J8pY1J8OFTOlhmxU_vh2Zl2JpvD2dTDv9Wa5ftkjHIj2gQmLJ_2H_cVCE56DBUlaFfWN7CeVJR19LKb69OOzoKQ85gbCbWQW8Qbw_-o5MAzpeoqC4ESazLwAMTzP4VhesB6J2TAsHi833SbnjAVpt01cRGTsD9CTWhUI_bTZpN7BvHt8bq169gqI6rpaVQ-x',
            ],
        ];
        
        // Data dummy untuk riwayat perjalanan
        $tripHistory = [
            [
                'title' => 'Annual Summit Challenge',
                'date' => 'Oct 12, 2024',
                'description' => 'Successfully led a team of 4 to the Rinjani summit via the Sembalun route. Weather conditions were optimal with 10km visibility.',
                'tags' => ['#Summit', '#GroupExpedition'],
            ],
            [
                'title' => 'Crater Lake Exploration',
                'date' => 'Aug 24, 2024',
                'description' => 'Two-day solo reconnaissance trip to Segara Anak lake. Documented water levels and trail erosion for the conservation report.',
                'tags' => ['#Conservation', '#Solo'],
            ],
        ];
        
        return view('frontend.profile', compact('user', 'stats', 'favoriteRoutes', 'tripHistory'));
    }
    
    /**
     * Update profile user
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
        ]);
        
        $user->update($validated);
        
        return back()->with('success', 'Profile berhasil diperbarui!');
    }
    
    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        
        $user = Auth::user();
        
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }
        
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        
        return back()->with('success', 'Password berhasil diperbarui!');
    }
}