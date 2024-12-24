<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFormRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::orderBy('created_at', 'DESC')->paginate(1);

        return view('admin.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();

        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'floor' => 0,
            'city' => 'Cotonou',
            'postal_code' => 34000,
            'is_sell' => false,
        ]);
        return view('admin.property.form', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        // dd($request->all());
        $createProperty = Property::create($request->validated());
        return to_route('admin.property.index')->with('success', 'Le bien a bien été créé !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {

        $property = Property::findOrFail($property->id);

        return view('admin.property.form', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success', 'Le bien a bien été mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        return to_route('admin.property.index')->with('success', 'Le bien a bien été supprimé !');
    }
}