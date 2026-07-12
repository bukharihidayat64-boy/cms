<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    // Field yang boleh diisi mass-assignment
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image', 'image_alt',
        'category', 'tags', 'is_featured', 'is_published', 'author_id', 'views', 'published_at',
    ];

    // Casting tipe data
    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer',
    ];

    /**
     * Auto-generate slug dari title jika kosong
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

    /**
     * Relasi: Artikel dimiliki oleh User (Author)
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Scope: Hanya artikel published
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    /**
     * Scope: Artikel featured
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->published();
    }

    /**
     * Tags sebagai array
     */
    public function getTagsArrayAttribute()
    {
        return $this->tags ? array_map('trim', explode(',', $this->tags)) : [];
    }

    /**
     * URL gambar dengan fallback
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : 'https://via.placeholder.com/800x400/002229/beeaf8?text=RinjaniTrail';
    }
}