<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertyRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function contact(Property $property, PropertyContactRequest $request)
    {
        Mail::send(new PropertyContactMail($property, $request->validated()));

        return back()->with('success', 'Votre demande de contact à bien été envoyé !');
    }
}
