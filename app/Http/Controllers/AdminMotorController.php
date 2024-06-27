<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorcycle;
use App\Models\Product;

class AdminMotorController extends Controller
{
    public function index()
    {
        $motorcycles = Motorcycle::all();
        return view('admin-page.manage-motor', compact('motorcycles'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin-page.create-motor', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'condition' => 'required|string',
            'image_path' => 'required|string',
            'link' => 'nullable|string',
        ]);

        Motorcycle::create($request->all());

        return redirect()->route('admin.motorcycles.index')
            ->with('success', 'Motorcycle created successfully.');
    }

    public function edit(Motorcycle $motorcycle)
    {
        $products = Product::all();
        return view('admin-page.edit-motor', compact('motorcycle', 'products'));
    }

    public function update(Request $request, Motorcycle $motorcycle)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'condition' => 'required|string',
            'image_path' => 'required|string',
            'link' => 'nullable|string|max:255',
        ]);

        $motorcycle->update($request->all());

        return redirect()->route('admin.motorcycles.index')
            ->with('success', 'Motorcycle updated successfully.');
    }

    public function destroy(Motorcycle $motorcycle)
    {
        $motorcycle->delete();

        return redirect()->route('admin.motorcycles.index')
            ->with('success', 'Motorcycle deleted successfully.');
    }
}
