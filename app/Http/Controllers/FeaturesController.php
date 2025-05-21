<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Features;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function index()
    {
        //route --> /features
        //Fetch all features from the database and pass them to the view
        $features = Features::orderBy('created_at', 'desc')->paginate(10);

        return view('features.index', ["features" => $features]);
    }

    public function show($id)
    {
        //route --> /features/{id}
        //Fetch a single feature from the database and pass it to the view
        $features = Features::findOrFail($id);
        return view('features.show', ['feature' => $features]);
    }

    public function create()
    {
        //route --> /features/create
        //Show the form to create a new feature
        return view('features.create');
    }

    public function edit($id)
    {
        return view('features.edit', ['id' => $id]);
    }
}
