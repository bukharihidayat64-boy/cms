<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Pastikan nama tabel mengarah ke tabel PARTNERS di Oracle Anda
    protected $table = 'partners';

    // WAJIB mendaftarkan slug dan field lainnya di sini
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'user_id',
        'price',
        'description',
        'status',
        'image'
    ];

    // Hubungan relasi ke PostCategory
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    // Hubungan relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}