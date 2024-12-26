<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    protected $fillable = [
        'title',
        'surface',
        'price',
        'address',
        'description',
        'bedrooms',
        'rooms',
        'floor',
        'city',
        'postal_code',
        'is_sell',
        'is_sell',
    ];

    protected $casts = [
        'created_at' => 'string',
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(): string
    {
        return Str::slug($this->title);
    }


    public function scopeAvailable(Builder $builder)
    {
        return $builder->where('is_sell', false);
    }
}
