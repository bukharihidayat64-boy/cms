<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = [
            [
                'id' => 1,
                'title' => 'Artikel Baru',
                'message' => 'Artikel "Jalur Semeru" telah dipublikasikan.',
                'time' => Carbon::now()->subMinutes(30),
                'read' => false,
                'icon' => 'article',
                'color' => 'blue',
            ],
            [
                'id' => 2,
                'title' => 'Pendaftaran Mitra',
                'message' => 'Pemandu baru mendaftar dan menunggu verifikasi.',
                'time' => Carbon::now()->subHours(2),
                'read' => false,
                'icon' => 'person_add',
                'color' => 'green',
            ],
        ];

        $unreadCount = 0;
        foreach ($notifications as $notif) {
            if (!$notif['read']) $unreadCount++;
        }

        return view('admin.notifications', [
            'notifications' => $notifications,
            'unreadCount' => $unreadCount,
        ]);
    }

    public function markAsRead(Request $request)
    {
        return back()->with('success', 'Notifikasi ditandai dibaca.');
    }

    public function markAllAsRead(Request $request)
    {
        return back()->with('success', 'Semua notifikasi ditandai dibaca.');
    }
}