<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
