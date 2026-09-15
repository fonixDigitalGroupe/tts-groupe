<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'image',
        'name',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * URL du logo : gère les images publiques (images/…) et les uploads (partners/…).
     */
    public function imageUrl(): ?string
    {
        if (! $this->image) {
            return null;
        }
        return str_starts_with($this->image, 'partners/')
            ? asset('storage/' . $this->image)
            : asset($this->image);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
