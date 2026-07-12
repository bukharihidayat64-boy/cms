<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'image',
        'description',
        'photographer',
        'location',
        'tags',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
    ];

    /**
     * Daftar kategori yang tersedia untuk galeri.
     */
    public static function categories(): array
    {
        return [
            'summit'   => 'Summit',
            'lake'     => 'Crater Lake',
            'sunrise'  => 'Sunrise',
            'forest'   => 'Rainforest',
            'camping'  => 'Camping',
            'wildlife' => 'Wildlife',
        ];
    }

    /**
     * Label kategori yang ramah untuk ditampilkan.
     */
    public function getCategoryLabelAttribute(): string
    {
        return self::categories()[$this->category] ?? ucfirst($this->category);
    }
}
