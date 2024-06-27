<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('admin-page.manage-brand', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Brand::create($request->all());

        return redirect()->back()->with('success', 'Brand added successfully.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->back()->with('success', 'Brand deleted successfully.');
    }
}
