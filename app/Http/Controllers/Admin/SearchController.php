<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        
        $results = [
            'articles' => collect(),
            'users'    => collect(),
        ];

        if ($query) {
            $results['articles'] = Article::where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->latest()
                ->take(5)
                ->get();

            $results['users'] = User::where('name', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%")
                ->latest()
                ->take(5)
                ->get();
        }

        return view('admin.search', [
            'query' => $query,
            'results' => $results,
        ]);
    }
}