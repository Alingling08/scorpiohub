<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Features;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with('feature')
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('products.index', ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = Features::orderBy('name', 'asc')->get();

        return view('products.create', ["features" => $features]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'stock' => 'required|numeric|min:0',
            'is_active' => 'required|numeric',
            'feature_id' => 'required|exists:features,id',
        ]);
        // Create a new product
        Product::create($validatedData);

        // Redirect to the products index page with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //route --> /products/{id}
        //Fetch a single product from the database and pass it to the view
        $product = Product::with('feature')->findOrFail($id);
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('products.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
