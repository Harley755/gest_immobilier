<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(SearchPropertyRequest $request)
    {
        $query = Property::query()->orderBy('created_at', 'DESC');
        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }
        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }

        $properties = $query->paginate(10);
        $input = $request->validated();

        return view('property.index', compact('properties', 'input'));
    }

    public function show(string $slug, Property $property)
    {
        $getSlug = $property->getSlug();

        if ($slug !== $getSlug) {
            return to_route('property.show', ['slug' => $getSlug, 'property' => $property]);
        }

        return view('property.show', compact('property'));
    }
}
