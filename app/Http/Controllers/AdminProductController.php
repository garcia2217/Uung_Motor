<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->get();
        $brands = Brand::all();
        return view('admin-page.manage-product', compact('products', 'brands'));
    }

    public function create()
    {
        $brands = Brand::all(); // Fetch all brands for the dropdown
        return view('admin.products.create', compact('brands')); // Pass brands to the create view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'brand_id' => 'required|exists:brands,id', // Ensure the brand exists
            'image_path' => 'required|string' // Optional image validation
        ]);

        Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'image_path' => $request->image_path
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id, // Unique except for current product
            'brand_id' => 'required|exists:brands,id',
            'image_path' => 'required|string'
        ]);

        $product->update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'image_path' => $request->image_path
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Optionally delete associated motorcycles if needed
        // $product->motorcycles()->delete();

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
