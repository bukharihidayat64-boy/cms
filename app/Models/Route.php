<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'difficulty', 'duration', 'elevation_gain', 
        'start_point', 'image', 'description', 'is_active', 'is_featured'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'elevation_gain' => 'integer',
    ];

    // Auto slug dari nama
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

    // Helper: Warna badge difficulty
     public function getDifficultyColorAttribute()
    {
        return match(strtolower($this->difficulty)) {
            'easy' => 'bg-green-100 text-green-800 border-green-200',
            'moderate' => 'bg-blue-100 text-blue-800 border-blue-200',
            'hard' => 'bg-orange-100 text-orange-800 border-orange-200',
            'extreme' => 'bg-red-100 text-red-800 border-red-200',
            default => 'bg-gray-100 text-gray-800 border-gray-200',
        };
    }

    // Scope: Hanya rute aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}