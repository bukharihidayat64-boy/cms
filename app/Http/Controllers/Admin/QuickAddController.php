<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuickAddController extends Controller
{
    public function create($type)
    {
        switch ($type) {
            case 'article':
                return redirect()->route('admin.articles.create');
            
            case 'route':
                return redirect()->route('admin.routes.create');
            
            case 'partner':
                return redirect()->route('admin.partners.create');
            
            case 'user':
                return redirect()->route('admin.users.create');
            
            default:
                return back()->withErrors(['message' => 'Tipe menu tidak ditemukan.']);
        }
    }
}