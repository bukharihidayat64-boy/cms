<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'category',
        'sort_order',
        'is_active',
    ];

    // Casting otomatis agar is_active jadi boolean & order jadi integer
    protected $casts = [
        'is_active' => 'boolean',
        'sort_order'     => 'integer',
    ];

    /**
     * Daftar kategori FAQ yang tersedia.
     */
    public static function categories(): array
    {
        return [
            'Umum'        => 'Umum',
            'Pendaftaran' => 'Pendaftaran',
            'Peraturan'   => 'Peraturan',
            'Fasilitas'   => 'Fasilitas',
            'Harga'       => 'Harga',
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
