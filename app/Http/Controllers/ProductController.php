<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = strtolower($request->search);
            $query->whereRaw('LOWER(name) LIKE ?', ["%{$searchTerm}%"]);
        }

        // Handle brand filter
        if ($request->has('brand') && !empty($request->brand)) {
            $query->where('brand_id', $request->brand);
        }

        // Handle sorting by price
        if ($request->has('sort') && $request->sort == 'price_asc') {
            $query->orderBy('price_min', 'asc');
        } elseif ($request->has('sort') && $request->sort == 'price_desc') {
            $query->orderBy('price_min', 'desc');
        }

        $products = $query->get();
        $brands = Brand::all();

        return view('product', compact('products', 'brands'));
    }
}
