<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::paginate(10);

        return view('admin.option.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option = new Option();

        return view('admin.option.form', compact('option'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        $createOption = Option::create($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a bien été créé !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {

        $option = Option::findOrFail($option->id);

        return view('admin.option.form', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a bien été mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        return to_route('admin.option.index')->with('success', 'L\'option a bien été supprimé !');
    }
}
