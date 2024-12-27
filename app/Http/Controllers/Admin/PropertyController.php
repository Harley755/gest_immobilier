<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PropertyFormRequest;
use App\Http\Requests\PropertyContactRequest;

class PropertyController extends Controller
{
    public function __construc()
    {
        Gate::authorizeResource(Property::class, 'property');
    }

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

        $options = Option::pluck('name', 'id');

        return view('admin.property.form', compact('property', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        // dd($request->all());
        $createProperty = Property::create($request->validated());
        $createProperty->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été créé !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        Gate::authorize('delete', $property);
        $property = Property::findOrFail($property->id);
        $options = Option::pluck('name', 'id');

        return view('admin.property.form', compact('property', 'options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
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
