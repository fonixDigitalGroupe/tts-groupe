<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamItem extends Model
{
    protected $fillable = [
        'image',
        'caption',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * URL de l'image : gère les images publiques (images/…) et les uploads (teams/…).
     */
    public function imageUrl(): ?string
    {
        if (! $this->image) {
            return null;
        }
        return str_starts_with($this->image, 'teams/')
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
