<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\Product;
use App\Models\Features;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // event(new UserSubscribed('Scorpio'));

        $products = Product::with('feature')
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('products.index', ["products" => $products, "headerTitle" => "All Products"]);
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
            'name' => 'required|string|max:255|min:10',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|max:50|unique:products',
            'image' => 'required|file|max:1000|mimes:jpg,bmp,png,webp',
            'category' => 'required|string|max:50',
            'stock' => 'required|numeric|min:0',
            'feature_id' => 'required|exists:features,id'
        ]);

        $path = Storage::disk('public')->put('product_images', $request->image);
        // Store the image properly


        // Create a new product
        // Product::create(['user_id' => Auth::id(), ...$validatedData]);
        Auth::user()->products()->create([...$validatedData, 'image' => $path]);
        $productName = $validatedData['name'];
        // Redirect to the products index page with a success message
        return redirect()->route('products.index')->with('success', $productName . ' is created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //route --> /products/{id}
        //Fetch a single product from the database and pass it to the view
        $product->load('feature');
        $image = ($product->image) ? $product->image : 'product_images/default_product.jpg';
        $imageToDisplay =  asset('storage/' . $image);
        return view('products.show', ['product' => $product, 'image' => $imageToDisplay]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $features = Features::orderBy('name', 'asc')->get();
        $image = ($product->image) ? $product->image : 'product_images/default_product.jpg';
        $imageToDisplay =  asset('storage/' . $image);
        return view('products.edit', [
            'product' => $product,
            'features' => $features,
            'image' => $imageToDisplay
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'stock' => 'required|numeric|min:0',
            'feature_id' => 'required|exists:features,id',
            'image' => 'file|max:1000|mimes:jpg,bmp,png,webp',
        ]);

        //Store image if exists
        $path = $product->image ?? null;
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = Storage::disk('public')->put('product_images', $request->image);
        }
        // Update a product
        $product->update([...$validatedData, 'image' => $path]);
        $productName = $validatedData['name'];


        //Send email
        Mail::to(Auth::user()->email)->send(new WelcomeMail(Auth::user(), $product));
        // Redirect to the products index page with a success message
        return redirect()->route('products.show', $product->id)->with('success', $productName . ' is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Get the product name for the success message
        $productName = $product->name;

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        // Delete the product
        $product->delete();

        // Redirect to the products index page with a success message
        return redirect()->route('products.index')->with('success', $productName . ' is deleted successfully.');
    }
    public function myProducts(Product $product)
    {
        $products = Auth::user()->products()->latest()->paginate(8);

        return view('products.index', ["products" => $products, "headerTitle" => "My Products"]);
    }
}
