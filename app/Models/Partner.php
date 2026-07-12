<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'partners';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'name', 'slug', 'category', 'contact_wa', 'contact_email',
        'description', 'pricing_info', 'location_area', 'image',
        'is_active', 'is_featured', 'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'password' => 'hashed',
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('id', $value)->first();
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orWhere('is_active', 1);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->orWhere('is_featured', 1);
    }

    public function getImageUrlAttribute()
    {
        if (empty($this->attributes['image'])) {
            return null;
        }
        
        return asset($this->attributes['image']);
    }

    public function getOwnerAttribute(): ?string
    {
        [$owner] = static::splitDescription($this->attributes['description'] ?? null);
        return $owner;
    }

    public function getDescriptionTextAttribute(): ?string
    {
        [, $description] = static::splitDescription($this->attributes['description'] ?? null);
        return $description;
    }

    public static function composeDescription(?string $owner, ?string $description): ?string
    {
        $owner = trim((string) $owner);
        $description = trim((string) $description);

        if ($owner && $description) return "PIC: {$owner}\n\n{$description}";
        if ($owner) return "PIC: {$owner}";
        
        return $description ?: null;
    }

    public static function splitDescription(?string $rawDescription): array
    {
        $rawDescription = trim((string) $rawDescription);
        if (!$rawDescription) return [null, null];

        if (preg_match('/^PIC:\s*(.+?)(?:\R\R(.*))?$/s', $rawDescription, $matches)) {
            return [
                $matches[1] ?: null,
                $matches[2] ?: null,
            ];
        }

        return [null, $rawDescription];
    }
}