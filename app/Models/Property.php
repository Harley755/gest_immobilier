<?php

namespace App\Models;

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

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }
}
