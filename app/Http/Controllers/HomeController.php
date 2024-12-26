<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('created_at', 'DESC')->limit(4)->get();

        // $user = User::first();
        // dd($user, $user->password);
        // dd($properties->first()->created_at);
        return view('home', compact('properties'));
    }
}
